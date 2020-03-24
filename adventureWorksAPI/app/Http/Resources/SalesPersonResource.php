<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesPersonResource extends JsonResource
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
            'SalesPersonID' => $this->SalesPersonID, 
            'TerritoryID' => $this->TerritoryID, 
            'SalesQuota' => $this->SalesQuota, 
            'Bonus' => $this->Bonus, 
            'CommissionPct' => $this->CommissionPct, 
            'SalesYTD' => $this->SalesYTD, 
            'SalesLastYear' => $this->SalesLastYear, 
            'ModifiedDate'=> $this->ModifiedDate
        ];
    }
}
