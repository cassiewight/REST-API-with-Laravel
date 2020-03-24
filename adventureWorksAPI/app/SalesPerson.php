<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SalesOrderHeader;
use SalesPersonQuotaHistory;
use SalesTerritory;
use Illuminate\Http\Response;

class SalesPerson extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'SalesPerson';

    /**
     *  Primary Key attribute.
     *
     * @var int
     */
    protected $primaryKey = 'SalesPersonID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['SalesPersonID', 'TerritoryID', 'SalesQuota', 'Bonus', 'CommissionPct', 'SalesYTD', 'SalesLastYear', 'rowguid', 'ModifiedDate'];

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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->rowguid = Helper::generateGUID();
        }); 
    }

    //***** Relationships */

    public function salesTerritory(){
        return $this->hasOne('App\SalesTerritory', 'TerritoryID', 'TerritoryID');
    }

    //Note: Cannot define realtionship to SalesPersonQuotaHistory table because it has two composite primary keys (Eloquent does not support);
    
    

}
