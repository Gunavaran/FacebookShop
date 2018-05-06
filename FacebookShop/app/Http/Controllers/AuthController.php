<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 3/15/2018
 * Time: 8:25 PM
 */

namespace App\Http\Controllers;


use App\Http\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Shop;

class AuthController extends Controller
{
    public function saveVendorData (Request $request){
        $this->validate($request, [
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'email' => 'required|email|unique:vendor,email|max:255',
            'contactNo' => 'required|alpha_num|unique:vendor,contact_no',
            'username' => 'required|unique:vendor,username',
            'password' => 'required|confirmed|max:255'

        ]);

        $vendor = new Vendor();
        $vendor -> first_name = $request['firstName'];
        $vendor -> last_name = $request['lastName'];
        $vendor -> email = $request['email'];
        $vendor -> contact_no = $request['contactNo'];
        $vendor -> country = $request['country'];
        $vendor -> username = $request['username'];
        $vendor -> password = bcrypt($request['password']);
        $vendor -> save();
        Session::put('username',$request->username);
        return view('dashboard');

    }

    public function showLogInForm(){
        return  view('loginform');
    }

    public function showVendorRegistrationForm(){
        return view('registration');
    }

    public function authenticate(Request $request){
        $this -> validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);
        $password=DB::table('vendor')->select('password') -> where('email',$request['email']) -> first();
        if(!count($password)){
            return view('loginform',['message'=>'email does not exist']);
        } elseif (!Hash::check($request['password'],$password->password)){
            return view('loginform', ['message'=>'Incorrect Password']);
        } elseif(DB::table('vendor')-> where('email',$request['email'])->value('admin')) {
            //admin log in
            Session::put('username',DB::table('vendor')-> where('email',$request['email']) -> value('username'));
            Session::put('admin','true');
            $shop = Shop::where('username',DB::table('vendor')-> where('email',$request['email']) -> value('username') )->first();
            if($shop != null){
                Session::put('shopId',$shop->shop_id);
            }
            return view('dashboard');
        } else{
            //vendor log in
            Session::put('username',DB::table('vendor')-> where('email',$request['email']) -> value('username'));
            $shop = Shop::where('username',DB::table('vendor')-> where('email',$request['email']) -> value('username') )->first();
            if($shop != null){
                Session::put('shopId',$shop->shop_id);
            }
            return view('dashboard');
        }

    }

    public function logout(){
        Session::flush();
        return  view('loginform');
    }

}