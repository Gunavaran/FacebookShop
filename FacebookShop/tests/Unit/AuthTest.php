<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/10/2018
 * Time: 8:39 PM
 */

namespace Tests\Unit;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function test_saveVendorData_authenticate_updateUserDetails()
    {
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

        $this->assertDatabaseHas('vendor', [
            'first_name' => 'test firstname'
        ]);

        $request2 = Request::create('/auth', 'GET', [
            'email' => 'test@gmail.com',
            'password' => 'testpassword'
        ]);

        $authController->authenticate($request2);
        $this->assertFalse(Session::has('message'));

        $request2 = Request::create('/store', 'POST', [
            'first_name' => 'test newfirstname',
            'last_name' => 'test newlastName',
            'contact_no' => '0772479350',
            'country' => 'test country',
        ]);

        $formController = new FormController();
        Session::put('username', 'testusername');

        $formController->updateUserDetails($request2);

        $this->assertDatabaseHas('vendor', [
            'first_name' => 'test newfirstname'
        ]);

    }

}