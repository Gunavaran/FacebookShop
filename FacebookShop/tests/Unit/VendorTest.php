<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/10/2018
 * Time: 8:07 PM
 */

namespace Tests\Unit;


use App\Http\Controllers\AuthController;
use App\Http\Models\Vendor;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class VendorTest extends TestCase
{
    use DatabaseTransactions;

    public function test_getVendorDetails(){
        Event::fake();
        $request = Request::create('/store', 'POST', [
            'firstName' => 'test firstname',
            'lastName' => 'test lastName',
            'email' => 'test@gmail.com',
            'contactNo' => '0772479350',
            'country' => 'test country',
            'username' => 'testusername',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword'
        ]);

        $authController = new AuthController();
        $authController->saveVendorData($request);

        $vendor = new Vendor();
        $firstName = $vendor->getVendorDetails('testusername','first_name');
        $this->assertEquals('test firstname',$firstName);
    }


}