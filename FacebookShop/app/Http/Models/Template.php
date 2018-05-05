<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/2/2018
 * Time: 1:00 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Template extends Model
{
    protected $fillable = [
        'shop_id',
        'category',
        'content'
    ];
    protected  $table  = 'template';
    protected $primaryKey = ['shop_id','category','content'];
    public $incrementing = false;
    public $timestamps = false;

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
}