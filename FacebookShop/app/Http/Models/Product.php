<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 1:50 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_category',
        'description',
        'size',
        'price',
        'currency_type',
        'items available',
        'availability',
        'keywords',
        'file_name',
        'shop_id'
    ];
    protected $table = "product";
    protected $primaryKey = 'product_id';

    public function getProductDetails($productId, $column)
    {
        $product = Product::where('product_id', $productId)->first();
        echo $product->$column;
    }

    public function getProducts($shopId){
        $products = Product::where('shop_id',$shopId)->get();
        return $products;
    }
}