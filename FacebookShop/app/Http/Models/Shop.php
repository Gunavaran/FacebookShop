<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 6:17 AM
 */
class Shop extends Model{
    protected $fillable = [
        'shop_name',
        'description',
        'contact_no',
        'email',
        'resident_no',
        'street',
        'city',
        'country',
        'zip_code'
    ];
    protected $table ="shop";
    protected $primaryKey = 'shop_id';
}
