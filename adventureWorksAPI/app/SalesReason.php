<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SalesOrderHeaderSalesReason;
use App\Http\Resources\SalesOrderHeaderResource;

class SalesReason extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'SalesReason';

    /**
     *  Primary Key attribute.
     *
     * @var int
     */
    protected $primaryKey = 'SalesReasonID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['SalesReasonID', 'Name', 'ReasonType', 'ModifiedDate'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

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


    //****** Relationships */

    //SalesOrderHeader : SalesReason = Many : Many relationship. Access SalesReason through junction table 'SalesOrderHeaderSalesReason'.
    public function salesOrderHeaders()
    {
        return $this->hasManyThrough(
            'App\SalesOrderHeader', // Target Table
            'App\SalesOrderHeaderSalesReason', // Junction Table
            'SalesReasonID', // Foreign key (of junction table) on this table...
            'SalesOrderID', // Foreign key (of junction table) on target table...
            'SalesReasonID', // Local key on this table...
            'SalesOrderID' // Local key on target table...
        );
    }

}
