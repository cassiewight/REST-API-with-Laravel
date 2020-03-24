<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use SalesOrderHeader;
use App\Http\Resources\SalesOrderDetailResource;

class SalesOrderDetail extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'SalesOrderDetail';

    /**
     *  Primary Key attribute.
     *
     * @var int
     */
    protected $primaryKey = ['SalesOrderDetailID', 'SalesOrderID'];
    public $incrementing = false;

    //protected $unique = ['SalesOrderDetailID', 'SalesOrderID'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['SalesOrderID', 'SalesOrderDetailID', 'CarrierTrackingNumber', 'OrderQty', 'ProductID', 'SpecialOfferID', 'UnitPrice', 'UnitPriceDiscount', 'LineTotal', 'rowguid', 'ModifiedDate'];

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
    protected $dates = ['ModifiedDate'];

    public $timestamps = false;

    //***** Function to generate rowguid on create *******/
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->rowguid = Helper::generateGUID();
        }); 
    }

    //***** Function needed to allow clustered primary key table update ******/

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

    public function SalesOrderHeader(){
        return $this->belongsTo('SalesOrderHeader', 'SalesOrderID');
    }


}
