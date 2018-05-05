<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/2/2018
 * Time: 11:29 AM
 */

namespace App\Http\Controllers;

use App\Http\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class templateController
{
    public function setTemplate()
    {
        $shop = new Shop();
        $shopId = $shop->getShopId();

        $vendorShop = Shop::where('shop_id', $shopId)->first();
        $vendorShop->template = Input::get('templateName');
        $vendorShop->save();
        if (!is_dir('storage/' . $shopId . '/template')) {
            Storage::makeDirectory('public/' . $shopId . '/template');
        }
        if (!is_dir('storage/' . $shopId . '/template/images')) {
            Storage::makeDirectory('public/' . $shopId . '/template/images');
        }
        if (!is_dir('storage/' . $shopId . '/template/thumbnails')) {
            Storage::makeDirectory('public/' . $shopId . '/template/thumbnails');
        }

        Session::flash('success', 'Template is set Successfully');
        return redirect()->route('designTemplate');

    }

    public function designTemplate()
    {
        return view('designTemplate');
    }

    public function designTemplateText()
    {
        return view('designTemplateText');
    }


    public function setSliderImage(Request $request)
    {
        if ($request->hasFile('images')) {
            $shopId = Session::get('shopId');
            foreach ($request->images as $image) {
                $fileName = $image->getClientOriginalName();

                if (!file_exists('storage/' . $shopId . '/template/images/' . $fileName)) {
                    $image->storeAs('public/' . $shopId . '/template/images/', $fileName);
                    Image::make('storage/' . $shopId . '/template/images/' . $fileName)->resize(1200, 600)->save('storage/' . $shopId . '/template/thumbnails/' . $fileName, 40);

                } else {
                    $image->store('public/' . $shopId . '/template/images');
                    $fileName = $image->hashName();
                    Image::make('storage/' . $shopId . '/template/images/' . $fileName)->resize(1200, 600)->save('storage/' . $shopId . '/template/thumbnails/' . $fileName, 40);
                }
                $template = new Template();
                $template->shop_id = $shopId;
                $template->category = 'slider_image';
                $template->content = $fileName;
                $template->save();

            }

            Session::flash('success', 'Slider Images are saved Successfully');
            return redirect()->route('designTemplate');
        }
    }

    public function setSliderText(Request $request)
    {
        $text = $request->sliderText;
        $template = new Template();
        $template->shop_id = Session::get('shopId');
        $template->category = 'text';
        $template->content = $text;
        $template->save();
        Session::flash('success', 'Text is added Successfully');
        return redirect()->route('designTemplateText');

    }

    public function removeSliderImage()
    {
        $imageName = Input::get('imageName');
        $shopId = Session::get('shopId');
        $template = Template::where('shop_id', $shopId)->where('content', $imageName)->first();
        $template->delete();
        File::delete('storage/' . $shopId . '/template/images/' . $imageName);
        File::delete('storage/' . $shopId . '/template/thumbnails/' . $imageName);
        Session::flash('removeSuccess', 'Images is removed Successfully');
        return redirect()->route('designTemplate');

    }

    public function removeSliderText(Request $request)
    {
        $content = $request->sliderText;
        $shopId = Session::get('shopId');
        $record = Template::where('shop_id', $shopId)->where('content', $content)->first();
        $record->delete();
        Session::flash('removeSuccess', 'Text is removed Successfully');
        return redirect()->route('designTemplateText');
    }

    public function searchProductCategory(Request $request)
    {
        $productCategory = $request->productCategory;
        $productSort = $request->sorting;
        Session::put('productCategory', $productCategory);
        Session::put('sorting', $productSort);
        return redirect()->route('showTemplateHome');


    }

    public function singleProduct(){
        return view('templates.titan.singleProduct');
    }


}