<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesOrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'SalesOrderID' => $this->SalesOrderID,
            'SalesOrderDetailID' => $this->SalesOrderDetailID,
            'CarrierTrackingNumber' => $this->CarrierTrackingNumber,
            'OrderQty' => $this->OrderQty, 
            'ProductID' => $this->ProductID, 
            'SpecialOfferID' => $this->SpecialOfferID, 
            'UnitPrice' => $this->UnitPrice, 
            'UnitPriceDiscount' => $this->UnitPriceDiscount, 
            'LineTotal' => $this->LineTotal, 
            'ModifiedDate' => $this->ModifiedDate
        ];
    }
}
