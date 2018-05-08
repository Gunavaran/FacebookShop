<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/6/2018
 * Time: 12:34 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Checkout extends Model
{
    protected $fillable=[

        'shop_id',
        'product_id',
        'customer_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    protected $table = "checkout";
    protected $primaryKey = ['customer_id','product_id','shop_id'];
    public $incrementing = false;

    public function getCheckoutDetails($productId, $customerEmail, $shopId){
        $customerId = Customer::where('email',$customerEmail)->value('customerId');
        $checkouts = Checkout::where('shop_id',$shopId)->where('customer_id',$customerId)->where('product_id',$productId)->get();
        return $checkouts;
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }



}