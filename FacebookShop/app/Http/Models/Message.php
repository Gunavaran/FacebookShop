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

    public function getReadMessages(){
        $messages = Message::where('status', '1')->get();
        return $messages;
    }

    public function getUnreadMessages(){
        $messages = Message::where('status', '0')->get();
        return $messages;
    }
}