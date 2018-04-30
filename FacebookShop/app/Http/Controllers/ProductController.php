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
use Illuminate\Support\Facades\Session;

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

    public function removeCategory(Request $request){
        $shop = Shop::where('username', Session::get('username'))->first();
        $category = Category::where('category_name',$request['category_name'])->where('shop_id',$shop->shop_id)->first();
        $category->delete();
        Session::flash('removeSuccess', 'Category ' . $request['category_name'] . ' is removed successfully');
        return redirect()->route('showCategories');
    }

    public function addProduct(Request $request){
        $product = new Product();
        $product -> product_name = $request->product_name;
        $product -> product_category = $request->product_category;
        $product -> description = $request->description;
        $product -> price = $request -> price;
        $product -> currency_type = $request -> currency_type;
        $product -> items_available = $request -> items_available;

        $keywords = '';
        $tags = $request -> keywords;
        foreach ($tags as $tag){
            $keywords = $keywords.$tag.',';
        }
        $finalString = rtrim($keywords,',');
        $product -> keywords = $finalString;



    }

}