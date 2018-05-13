<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/11/2018
 * Time: 11:13 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = [
        'view_id',
        'photo_id',
        'created_at',
        'updated_at',

    ];
    protected $table = 'view';
    protected $primaryKey = 'view_id';

    //get the number of photos available in a particular shop.
    public function getCount($photoId)
    {
        $count = Counter::where('photo_id', $photoId)->count();
        return $count;

    }

}