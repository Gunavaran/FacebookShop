<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 6:17 AM
 */
class Shop extends Model
{
    protected $fillable = [
        'shop_id',
        'shop_name',
        'description',
        'contact_no',
        'email',
        'resident_no',
        'street',
        'city',
        'country',
        'zip_code',
        'username',
        'created_at'
    ];
    protected $table = "shop";
    protected $primaryKey = 'shop_id';

    public function getShopId()
    {
        $shop = Shop::where('username', Session::get('username'))->first();
        $shopId = $shop->shop_id;
        return $shopId;
    }

    //returns the number of customers a shop has.
    //used for shop admin
    public function getCustomerCount($shopId)
    {
        $count = Customer::where('shop_id', $shopId)->count();
        return $count;
    }

    //used to display some particular tabs in the dashboard if the shop has been created
    public function checkShopExist($username)
    {
        $shop = Shop::where('username', $username)->first();
        if ($shop == null) {
            return false;
        } else {
            return true;
        }
    }


    public function getShopDetails($username, $detail)
    {
        $infor = Shop::where('username', $username)->value($detail);
        return $infor;
    }

    public function getShopDetailsViaId($shopId, $detail)
    {
        $infor = Shop::where('shop_id', $shopId)->value($detail);
        return $infor;
    }
}
