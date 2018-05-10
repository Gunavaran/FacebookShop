<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/10/2018
 * Time: 5:07 PM
 */

namespace Tests\Unit;


use App\Http\Controllers\ShopController;
use App\Http\Models\Shop;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ShopTest extends TestCase
{
    use DatabaseTransactions;

    public function test_saveShopData_getShopDetails_updateShopData()
    {
        Event::fake();
        Session::put('username', 'gunavaran');
        $request = Request::create('/store', 'POST', [
            'shop_name' => 'gunasShop',
            'description' => 'blah',
            'contact_no' => '0775469856',
            'email' => 'guna@gmail.com',
            'resid-no' => '56',
            'street' => 'kaladdy',
            'city' => 'jaffna',
            'country' => 'japan',
            'zip-code' => '40000',
        ]);

        $controller = new ShopController();
        $controller->saveShopData($request);

        $this->assertDatabaseHas('shop', [
            'shop_name' => 'gunasShop',
            'description' => 'blah',
            'contact_no' => '0775469856',
            'email' => 'guna@gmail.com',
            'resident_no' => '56',
            'street' => 'kaladdy',
            'city' => 'jaffna',
            'country' => 'japan',
            'zip_code' => '40000',
        ]);


        $shop = new Shop();
        $shopName = $shop->getShopDetails(Session::get('username'), 'shop_name');
        $this->assertSame('gunasShop', $shopName);

        $request2 = Request::create('/store', 'POST', [
            'shop_name' => 'gunasShop',
            'description' => 'blah',
            'contact_no' => '0775469856',
            'email' => 'guna123@gmail.com',
            'resid-no' => '56',
            'street' => 'kaladdy',
            'city' => 'jaffna',
            'country' => 'japan',
            'zip-code' => '40000',
        ]);
        $controller->updateShopData($request2);
        $this->assertDatabaseHas('shop', [
            'email' => 'guna123@gmail.com',
        ]);

    }


}