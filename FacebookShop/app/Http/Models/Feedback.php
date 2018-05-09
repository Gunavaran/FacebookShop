<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/5/2018
 * Time: 2:44 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Feedback extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'feedback',
        'rating',
        'created_at',
        'updated_at'
    ];

    protected $table ="feedback";
    protected $primaryKey = ['customer_id','product_id'];
    public $incrementing = false;

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

    public function getFeedback($productId){
        $feedbacks = Feedback::where('product_id', $productId)->get();
        return $feedbacks;
    }

    public function getFeedbackCount($productId){
        $count = Feedback::where('product_id',$productId)->count();
        return $count;
    }

}