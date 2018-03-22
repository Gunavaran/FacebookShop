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
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'country',
        'username',
        'password'
    ];
    protected $table ="vendor";
    protected $primaryKey = 'vendor_id';
}