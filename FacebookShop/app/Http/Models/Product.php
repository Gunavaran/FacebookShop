<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 1:50 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
       'product_name',
        'product_category',
        'description',
        'price',
        'currency_type',
        'items available',
        'keywords',
        'image'
    ];
    protected $table ="product";
}