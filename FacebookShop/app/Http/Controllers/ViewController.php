<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 3/20/2018
 * Time: 12:02 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ViewController
{
    public function showDashboard()
    {
        return view('dashboard');
//        if(Session::has('username')){
//            if (DB::table('vendor')-> where('username',Session::get('username'))->value('admin')){
//                //admin dashboard
//                return view('layout.adminDashboard');
//            } else {
//                //dashboard
//                return view('layout.dashboard');
//            }
//
//        } else {
//            return view('loginform');
//        }
    }

    public function showHome()
    {
        return view('home');
    }

    public function showMyDetails()
    {
        return view('myDetails', ['username' => Session::get('username')]);
    }

//    =====================================Admin=========================================
    public function showMessages()
    {
        return view('messages');
    }

    public function showUserList()
    {
        return view('admin.userList');
    }

    public function showShopList()
    {
        return view('admin.shopList');
    }

    public function showSpecificShop()
    {
        return view('shopDetails', ['username' => Input::get('username')]);
    }

    public function showSpecificVendor()
    {
        return view('myDetails', ['username' => Input::get('username')]);
    }

//    =======================end of admin=======================================

    public function showProductsList()
    {
        return view('productDetails');
    }

    public function showSpecificProduct()
    {
        return view('newProduct', ['productId' => Input::get('productId')]);

    }

    public function showTemplateDemo()
    {
        Session::put('template', Input::get('templateName'));
        if (Input::get('templateName') == 'titan') {
            Session::put('siteShopId', 13);
            return view('templates.titan.home');
        } else if (Input::get('templateName') == 'photography') {
            Session::put('siteShopId', 14);
            return view('templates.photography.home');
        }
    }

    public function chooseTemplate()
    {
        return view('chooseTemplate');
    }


    //redirects to the home page of the templates
    public function showTemplateHome()
    {
        if (Session::get('template') == 'titan') {
            return view('templates.titan.home');
        } else if (Session::get('template') == 'photography') {
            return view('templates.photography.home');
        }
    }

    //redirects to select a category before uploading photos. only for photography template
    public function selectCategoryPage()
    {
        return view('selectCategory');
    }

    //only for photography template
    public function showUploadPhotosForm(Request $request)
    {
        if (Session::has('username')) {
            Session::put('category', $request['category_name']);
            return view('uploadPhotos');
        } else {
            return view('loginform');
        }
    }

    public function viewPhotos()
    {
        return view('viewPhotos');
    }

    public function selectFacebookPage()
    {
        return view('Facebook.selectFacebookPage');
    }

    //the help tab in the dashboard
    public function help()
    {
        return view('help');
    }


}