<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 8:36 AM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DataController
{

    /*
     * data retrieve conditions have to included
     * this method is implemented for admin
     * should be improved for vendor
     */
    function getShopData(){
        $data['data'] = DB::table('shop')->get();
        return view ('shopDetails' , $data);

    }
}