<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/5/2018
 * Time: 7:26 AM
 */

namespace App\Http\Controllers;

use App\Http\Models\Customer;
use App\Http\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
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

        $password = Customer::where('email', $request->email)->first();

        if ($password == null) {
            Session::flash('error', 'Email does not exist. Please check your email.');
            return view('templates.titan.customerLogIn');

        } elseif (!Hash::check($request['password'], $password->password)) {
            Session::flash('error', 'Incorrect Password');
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
        $customer->shop_id = $request->shop_id;
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

    public function rateProduct(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'feedback' => 'nullable|max:255'
        ]);

        $productId = Input::get('productId');
        $customerId = Customer::where('email', Input::get('customerEmail'))->value('customer_id');

        if(Feedback::where('product_id',$productId)->where('customer_id',$customerId)->first()){
            Session::flash('ratingFailure','You can rate a product only once');
            return redirect()->route('singleProduct',['productId'=>$productId]);
        }

        $feedback = new Feedback();
        $feedback->product_id = $productId;
        $feedback->customer_id = $customerId;
        $feedback->rating = $request->rating;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        Session::flash('ratingSuccess','Successfully saved');
        return redirect()->route('singleProduct',['productId'=>$productId]);

    }

}