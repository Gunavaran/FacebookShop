<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/6/2018
 * Time: 12:40 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Models\Checkout;
use App\Http\Models\Customer;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function showCheckOut()
    {
        return view('templates.titan.checkout');
    }

    public function addToCart(Request $request)
    {

        $productId = Input::get('productId');
        $customerId = Input::get('customerId');

        $check = Checkout::where('product_id', $productId)->where('customer_id', $customerId)->first();
        if ($check == null) {
            $checkout = new Checkout();
            $checkout->product_id = $productId;
            $checkout->customer_id = $customerId;
            $checkout->quantity = $request->quantity;
            $checkout->save();
            Session::put('checkoutSuccess', 'checkout success');
            return redirect()->route('singleProduct', ['productId' => $productId]);

        } else {
            Session::put('checkoutFailure', 'checkout failed');
            return redirect()->route('singleProduct', ['productId' => $productId]);
        }

    }


}