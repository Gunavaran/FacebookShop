<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/5/2018
 * Time: 7:26 AM
 */

namespace App\Http\Controllers;

use App\Http\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function customerLogInPage()
    {
        return view('templates.titan.customerLogIn');
    }

    public function customerRegisterPage()
    {
        return view('templates.titan.customerRegister');
    }

    public function authCustomer(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255|email',
            'password' => 'required|max:255'
        ]);

        $password = Customer::where('email',$request->email)->first();

        if($password == null){
            Session::flash('error','Email does not exist. Please check your email.');
            return view('templates.titan.customerLogIn');

        } elseif (!Hash::check($request['password'],$password->password)){
            Session::flash('error','Incorrect Password');
            return view('templates.titan.customerLogIn');
        } else {
            Session::put('customer', $request->email);
            return redirect()->route('showTemplateHome');
        }

    }

    public function registerCustomer(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:customer,email|max:255',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'password' => 'required|confirmed|max:255'
        ]);

        $customer = new Customer();

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();
        Session::put('customer', $request->email);
        return redirect()->route('showTemplateHome');


    }

    public function logout()
    {
        Session::forget('customer');
        return redirect()->route('showTemplateHome');
    }

}