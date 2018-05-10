<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/10/2018
 * Time: 10:38 PM
 */

namespace Tests\Unit;

use App\Http\Controllers\CustomerController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class CustomerTest extends  TestCase
{
    use DatabaseTransactions;

    public function test_registerCustomer_authCustomer(){
        Event::fake();
        $request = Request::create('/store', 'POST', [
            'email' => 'test@gmail.com',
            'first_name' => 'test firstName',
            'last_name' => 'test lastName',
            'password' => 'testpassword',
            'password_confirmation'=> 'testpassword',
            'shop_id' => '1'
        ]);

        $customerController = new CustomerController();
        $customerController->registerCustomer($request);

        $this->assertDatabaseHas('customer', [
            'first_name' => 'test firstname'
        ]);


        $request2 = Request::create('/store', 'POST', [
            'email' => 'test@gmail.com',
            'password' => 'testpassword',
        ]);

        Session::put('siteShopId',1);
        $customerController->authCustomer($request2);

        $this ->assertFalse(Session::has('error'));


    }

}