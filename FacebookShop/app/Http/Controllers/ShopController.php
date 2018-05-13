<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 3/21/2018
 * Time: 7:08 PM
 */

namespace App\Http\Controllers;


use App\Http\Models\Shop;
use App\Http\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{

    public function showCreateShopForm()
    {
        if (Session::has('username')) {
            return view('createShop');
        }
    }

    public function saveShopData(Request $request)
    {

        //validation
        $this->validate($request, [
            'shop_name' => 'required|max:30',
            'description' => 'required|max:200',
            'contact_no' => 'required|alpha_num|unique:vendor,contact_no',
            'email' => 'required|email|unique:shop,email|max:255',
            'street' => 'max:30',
            'city' => 'max:20',
            'country' => 'max:20',
            'zip-code' => 'max:10'
        ]);

        //storing in database
        $shop = new Shop();
        $shop->shop_name = $request['shop_name'];
        $shop->description = $request['description'];
        $shop->contact_no = $request['contact_no'];
        $shop->email = $request['email'];
        $shop->resident_no = $request['resid-no'];
        $shop->street = $request['street'];
        $shop->city = $request['city'];
        $shop->country = $request['country'];
        $shop->zip_code = $request['zip-code'];
        $shop->username = Session::get('username');
        $shop->save();

        $shopId = Shop::where('username', Session::get('username'))->value('shop_id');
        Session::put('shopId', $shopId);

        Session::flash('success', 'Shop is Created Successfully'); //to send success message
        return redirect()->route('dashboard');
    }

    public function showShopDetails()
    {
        return view('shopDetails', ['username' => Session::get('username')]);
    }

    public function updateShopData(Request $request)
    {
        $this->validate($request, [
            'shop_name' => 'required|max:30',
            'description' => 'required|max:200',
            'contact_no' => 'required|alpha_num',
            'email' => 'required|email|max:255',
            'street' => 'max:30',
            'city' => 'max:20',
            'country' => 'max:20',
            'zip-code' => 'max:10'
        ]);

        $shop = Shop::where('username', Session::get('username'))->first();
        $shop->shop_name = $request['shop_name'];
        $shop->description = $request['description'];
        $shop->contact_no = $request['contact_no'];
        $shop->email = $request['email'];
        $shop->resident_no = $request['resid-no'];
        $shop->street = $request['street'];
        $shop->city = $request['city'];
        $shop->country = $request['country'];
        $shop->zip_code = $request['zip-code'];
        $shop->username = Session::get('username');
        $shop->save();

        Session::flash('success', 'Details are Changed Successfully');
        return redirect()->route('showShopDetails');
    }

    public function viewMyShop()
    {
        $shop = new Shop();
        $shopTemplate = $shop->getShopDetails(Session::get('username'), 'template');
        Session::put('template', $shopTemplate);
        if ($shopTemplate == 'titan') {
            Session::put('siteShopId', Session::get('shopId'));
            return view('templates.titan.home');
        } else if ($shopTemplate == 'photography') {
            Session::put('siteShopId', Session::get('shopId'));
            return view('templates.photography.home');
        }
    }

}