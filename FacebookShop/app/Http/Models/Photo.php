<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/11/2018
 * Time: 7:44 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [

        'photo_id',
        'file_name',
        'category',
        'shop_id',
        'created_at',
        'updated_at'

    ];

    protected $table = "photo";
    protected $primaryKey = "photo_id";

    /*
     * these functions are valid only if the photography template is chosen
     */

    //returns the photos of a particular shop
    public function getPhotos($shopId){
        $photos = Photo::where('shop_id',$shopId)->get();
        return $photos;

    }

    //given the shop and category, returns photos of that particular category.
    //used in View Photos tab
    public function getCategorizedPhotos($shopId, $category){
        $photos = Photo::where('shop_id',$shopId)->where('category',$category)->get();
        return $photos;
    }

    public function getPhotoById($photoId){
        $photo = Photo::where('photo_id',$photoId)->first();
        return $photo;
    }

    /*
     * returns number of photos as specified
     * order cannot be defined
     * the topmost photos will be returned
     */
    public function getLimitedPhotos($shopId,$category,$num){
        $photos = Photo::where('shop_id',$shopId)->where('category', $category)->take($num)->get();
        return $photos;
    }

}