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

        $password = Customer::where('email', $request->email)->where('shop_id', Session::get('siteShopId'))->first();


        if ($password == null) {
            Session::flash('error', 'Email does not exist. Please check your email.');
            return view('templates.titan.customerLogIn');

        } elseif (!Hash::check($request['password'], $password->password)) {
            Session::flash('error', 'Incorrect Password');
            return view('templates.titan.customerLogIn');
        } else {
            $customer = new Customer();
            $customerId = $customer->getCustomerId($request->email, Session::get('siteShopId'));
            Session::put('customerId', $customerId);
            return redirect()->route('showTemplateHome');
        }

    }

    public function registerCustomer(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
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

        $newCustomerId = Customer::where('email', $request->email)->where('shop_id', $request->shop_id)->value('customer_id');
        Session::put('customerId', $newCustomerId);
        return redirect()->route('showTemplateHome');


    }

    public function logout()
    {
        Session::forget('customerId');
        return redirect()->route('showTemplateHome');
    }

    public function rateProduct(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'feedback' => 'nullable|max:255'
        ]);

        $productId = Input::get('productId');
        $customerId = Input::get('customerId');

        if (Feedback::where('product_id', $productId)->where('customer_id', $customerId)->first()) {
            Session::flash('ratingFailure', 'You can rate a product only once');
            return redirect()->route('singleProduct', ['productId' => $productId]);
        }

        $feedback = new Feedback();
        $feedback->product_id = $productId;
        $feedback->customer_id = $customerId;
        $feedback->rating = $request->rating;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        Session::flash('ratingSuccess', 'Successfully saved');
        return redirect()->route('singleProduct', ['productId' => $productId]);

    }

    public function updateAccountDetails(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
        ]);

        $customer = Customer::where('customer_id', $request->customer_id)->first();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('accountSettings');
    }

}