<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 3/22/2018
 * Time: 2:09 PM
 */

namespace App\Http\Controllers;


use App\Http\Models\Category;
use App\Http\Models\Product;
use App\Http\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{

    public function showNewProductForm()
    {
        return view('newProduct');
    }

    public function showCategories()
    {
        return view('categories');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'max:100'
        ]);
        $shop = Shop::where('username', Session::get('username'))->first();

        $check = Category::where('category_name', $request['category_name'])->where('shop_id', $shop->shop_id)->first();

        if ($check == null) {
            $category = new Category();

            $category->category_name = $request['category_name'];
            $category->shop_id = $shop->shop_id;
            $category->save();
            Session::flash('success', 'New category is added successfully');
            return redirect()->route('showCategories');
        } else {
            Session::flash('exist', 'Category Already Exists');
            return redirect()->route('showCategories');
        }

    }

    public function removeCategory(Request $request)
    {
        $shop = Shop::where('username', Session::get('username'))->first();
        $category = Category::where('category_name', $request['category_name'])->where('shop_id', $shop->shop_id)->first();
        $category->delete();
        Session::flash('removeSuccess', 'Category ' . $request['category_name'] . ' is removed successfully');
        return redirect()->route('showCategories');
    }

    public function addProduct(Request $request)
    {
        if ($request->has('product_id')) {
            $this->validate($request, [
                'price' => 'numeric'
            ]);

            $product = Product::where('product_id', $request->product_id)->first();

        } else {
            $this->validate($request, [
                'image.*' => 'mimes:jpeg,jpg,png',
                'price' => 'numeric'
            ]);
            $product = new Product();
            $shop = new Shop();
            $shopId = $shop->getShopId();

            if (!is_dir('storage/' . $shopId)) {
                Storage::makeDirectory('public/' . $shopId);
            }
            if (!is_dir('storage/' . $shopId . '/images')) {
                Storage::makeDirectory('public/' . $shopId . '/images');
            }
            if (!is_dir('storage/' . $shopId . '/thumbnails')) {
                Storage::makeDirectory('public/' . $shopId . '/thumbnails');
            }

            $image = $request->image;

            $fileName = $image->getClientOriginalName();

            if (!file_exists('storage/' . $shopId . '/images/' . $fileName)) {
                $image->storeAs('public/' . $shopId . '/images/', $fileName);
                Image::make('storage/' . $shopId . '/images/' . $fileName)->resize(600, 600)->save('storage/' . $shopId . '/thumbnails/' . $fileName, 40);

            } else {
                $image->store('public/' . $shopId . '/images');
                $fileName = $image->hashName();
                Image::make('storage/' . $shopId . '/images/' . $fileName)->resize(600, 600)->save('storage/' . $shopId . '/thumbnails/' . $fileName, 40);
            }

            $product->file_name = $fileName;
            $product->shop_id = $shopId;
        }

        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->currency_type = $request->currency_type;
        $product->items_available = $request->items_available;
        $product->availability = $request->availability;

        $keywords = '';
        $tags = $request->keywords;
        foreach ($tags as $tag) {
            $keywords = $keywords . $tag . ',';
        }
        $finalString = rtrim($keywords, ',');
        $product->keywords = $finalString;

        $product->save();
        if ($request->has('product_id')) {
            Session::flash('success', 'Product Details are Updated Successfully');
            return redirect() -> route('showSpecificProduct',['productId'=> $request->product_id]);
        } else{
            Session::flash('success', 'Product is added Successfully');
            return redirect()->route('showNewProductForm');
        }

    }

    public function removeProduct(){
        $shop = new Shop();
        $shopId = $shop->getShopId();

        $productId = Input::get('productId');
        $product = Product::where('product_id',$productId)->first();
        $imageName = $product->file_name;

        File::delete('storage/'.$shopId.'/images/'.$imageName);
        File::delete('storage/'.$shopId.'/thumbnails/'.$imageName);
        $product->delete();

        Session::flash('removeSuccess', 'Removed Successfully');
        return redirect()->route('showProductsDetails');

    }

}