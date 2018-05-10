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
    protected $table = "customer";
    protected $primaryKey = 'customer_id';

    //a particular value of a column in customer table is returned
    //customer Id and column name are input parameters
    public function getCustomerDetails($customerId, $detail)
    {
        $infor = Customer::where('customer_id', $customerId)->value($detail);
        return $infor;
    }

    //returns the customers of a particular shop
    //input parameters: customer email and shop Id
    public function getCustomerId($email, $shopId)
    {
        $customerId = Customer::where('email', $email)->where('shop_id', $shopId)->value('customer_id');
        return $customerId;
    }


}