<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 4/18/2018
 * Time: 3:25 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_id',
        'category_name',
        'shop_id'
    ];
    protected $table = "category";
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    //returns all the categories available in a particular shop in alphabetically ascending order
    public function getCategories($shopId)
    {
        $categories = Category::where('shop_id', $shopId)->orderBy('category_name', 'asc')->get();
        return $categories;
    }

}