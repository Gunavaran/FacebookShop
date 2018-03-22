<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 2/27/2018
 * Time: 9:45 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'name',
        'email',
        'message'
    ];
    protected $table ="message";
}