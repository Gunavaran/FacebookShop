<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 3/20/2018
 * Time: 12:02 PM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ViewController
{
    public function showDashboard(){
        if(Session::has('username')){
            if (DB::table('vendor')-> where('username',Session::get('username'))->value('admin')){
                //admin dashboard
                return view('layout.adminDashboard');
            } else {
                //dashboard
                return view('layout.dashboard');
            }

        } else {
            return view('loginform');
        }
    }

    public function showHome(){
        return view('home');
    }

}