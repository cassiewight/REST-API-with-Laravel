<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SalesPerson;
use SalesOrderHeader;

class SalesTerritory extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'SalesTerritory';

    /**
     *  Primary Key attribute.
     *
     * @var int
     */
    protected $primaryKey = 'TerritoryID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['TerritoryID', 'Name', 'CountryRegionCode', 'Group', 'SalesYTD', 'SalesLastYear', 'CostYTD', 'CostLastYear', 'rowguid', 'ModifiedDate'];

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

    //Relationships

    public function SalesPerson(){
        return $this->belongsTo('App\SalesPerson', 'TerritoryID', 'TerritoryID');
    }

    public function SalesOrderHeader(){
        return $this->belongaTo('SalesOrderHeader', 'TerritoryID', 'TerritoryID');
    }

}
