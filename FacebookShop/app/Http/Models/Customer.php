<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/5/2018
 * Time: 9:10 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_id',
        'shop_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];
    protected $table ="customer";
    protected $primaryKey = 'customer_id';

    public function getCustomerDetails($customerId,$detail){
        $infor = Customer::where('customer_id',$customerId)->value($detail);
        return $infor;
    }

    public function getCustomerId($email,$shopId){
        $customerId = Customer::where('email',$email)->where('shop_id',$shopId)->value('customer_id');
        return $customerId;
    }



}