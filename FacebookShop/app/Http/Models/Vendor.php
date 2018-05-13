<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 8:37 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/*
 * this handles the details related to the vendor who is a user
 */

class Vendor extends Model
{

    protected $fillable = [
        'vendor_id',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'country',
        'username',
        'password',
        'created_at',

    ];
    protected $table = "vendor";
    protected $primaryKey = 'vendor_id';

    //given the username and column name, returns specific value, not an object
    public function getVendorDetails($username, $detail)
    {
        $infor = Vendor::where('username', $username)->value($detail);
        return $infor;
    }

    public function getVendorCount(){
        $count = Vendor::where('admin',0)->count();
        return $count;
    }

    public function getLatestSignUps(){
        $date = date('Y-m-d h:i:s');
        $date = date_create($date);
        date_sub($date, date_interval_create_from_date_string('7 days'));

        $vendorCount = Vendor::where('created_at','>',$date)->count();
        return $vendorCount;
    }
}