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
    protected $table ="vendor";
    protected $primaryKey = 'vendor_id';

    public function getVendorDetails($username,$detail){
        $infor = Vendor::where('username',$username)->value($detail);
        return $infor;
    }
}