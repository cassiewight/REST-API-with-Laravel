<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SalesPerson;
use App\Http\Resources\SalesPersonQuotaHistoryResource;
use Illuminate\Database\Eloquent\Builder;

class SalesPersonQuotaHistory extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'SalesPersonQuotaHistory';

    /**
     *  Primary Key attribute.
     *
     * @var int
     */
    protected $primaryKey = ['SalesPersonID', 'QuotaDate'];
    public $incrementing = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['SalesPersonID', 'QuotaDate', 'SalesQuota', 'rowguid', 'ModifiedDate'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['rowguid'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['QuotaDate', 'ModifiedDate'];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->rowguid = Helper::generateGUID();
        }); 
    }


    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
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

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
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


    //***** Relationships */

    //Note: Cannot define realtionship to SalesPersonQuotaHistory table because it has two primary keys (Eloquent does not support);

}
