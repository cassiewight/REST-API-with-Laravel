<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SalesOrderHeaderSalesReason;
use SalesOrderDetail;
use SalesPerson;
use App\SalesTerritory;

class SalesOrderHeader extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'SalesOrderHeader';

    /**
     *  Primary Key attribute.
     *
     * @var int
     */
    protected $primaryKey = 'SalesOrderID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['SalesOrderID', 'RevisionNumber', 'OrderDate', 'DueDate', 'ShipDate', 'Status', 'OnlineOrderFlag', 'SalesOrderNumber', 'PurchaseOrderNumber', 'AccountNumber', 'CustomerID', 'ContactID', 'SalesPersonID', 'TerritoryID', 'BillToAddressID', 'ShipToAddressID', 'ShipMethodID', 'CreditCardID', 'CreditCardApprovalCode', 'CurrencyRateID', 'SubTotal', 'TaxAmt', 'Freight', 'TotalDue', 'Comment', 'rowguid', 'ModifiedDate'];

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
    protected $dates = ['OrderDate', 'DueDate', 'ShipDate', 'ModifiedDate'];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->rowguid = Helper::generateGUID();
        }); 
    }

    //**** Relationships */

    public function salesOrderDetail(){
        return $this->hasMany('App\SalesOrderDetail', 'SalesOrderID');
    }

    public function salesPerson(){
        return $this->belongsTo('App\SalesPerson', 'SalesPersonID');
    }

    public function salesTerritory(){
        return $this->belongsTo('App\SalesTerritory', 'TerritoryID');
    }

    //SalesReason : SalesOrderHeader = Many : Many relationship. Access SalesReason through junction table 'SalesOrderHeaderSalesReason'.
    public function salesReasons()
    {
        return $this->hasManyThrough(
            'App\SalesReason', //Target table
            'App\SalesOrderHeaderSalesReason', //Junction Table
            'SalesOrderID', // Foreign key (of junction table) on this table...
            'SalesReasonID', // Foreign key (of junction table) on target table...
            'SalesOrderID', // Local key on this table...
            'SalesReasonID' // Local key on target table...
        );
    }

}
