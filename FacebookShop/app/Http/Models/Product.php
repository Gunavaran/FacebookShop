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

    //given the product id and column name, product object will be returned
    public function getProductDetails($productId, $column)
    {
        $product = Product::where('product_id', $productId)->first();
        return $product->$column;
    }

    //returns all the products of a particular shop
    public function getProducts($shopId)
    {
        $products = Product::where('shop_id', $shopId)->get();
        return $products;
    }

    //rest of the methods are used in home page to do sorting purpose
    public function getHighPricedProducts($shopId)
    {
        $products = Product::where('shop_id', $shopId)->orderBy('price', 'DESC')->get();
        return $products;
    }

    public function getLowPricedProducts($shopId)
    {
        $products = Product::where('shop_id', $shopId)->orderBy('price', 'ASC')->get();
        return $products;
    }

    public function getLatestProducts($shopId)
    {
        $products = Product::where('shop_id', $shopId)->orderBy('created_at', 'DESC')->get();
        return $products;
    }

    public function getCategorizedProducts($shopId, $productCategory)
    {
        $products = Product::where('shop_id', $shopId)->where('product_category', $productCategory)->get();
        return $products;
    }

    public function getCategorizedHighPricedProducts($shopId, $productCategory)
    {
        $products = Product::where('shop_id', $shopId)->where('product_category', $productCategory)->orderBy('price', 'DESC')->get();
        return $products;
    }

    public function getCategorizedLowPricedProducts($shopId, $productCategory)
    {
        $products = Product::where('shop_id', $shopId)->where('product_category', $productCategory)->orderBy('price', 'ASC')->get();
        return $products;
    }

    public function getCategorizedLatestProducts($shopId, $productCategory)
    {
        $products = Product::where('shop_id', $shopId)->where('product_category', $productCategory)->orderBy('created_at', 'DESC')->get();
        return $products;
    }

}