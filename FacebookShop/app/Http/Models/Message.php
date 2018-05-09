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
        'message_id',
        'name',
        'email',
        'message',
        'status',
        'created_at'
    ];
    protected $table ="message";
    protected $primaryKey = 'message_id';

    public function getReadMessages($shopId){
        $messages = Message::where('status', '1')->where('shop_id',$shopId)->get();
        return $messages;
    }

    public function getUnreadMessages($shopId){
        $messages = Message::where('status', '0')->where('shop_id',$shopId)->get();
        return $messages;
    }
}