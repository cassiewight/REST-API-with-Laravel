<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesTerritoryResource extends JsonResource
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
            'TerritoryID' => $this->TerritoryID,
            'Name' => $this->Name,
            'CountryRegionCode' => $this->CountryRegionCode,
            'Group' => $this->Group,
            'SalesYTD' => $this->SalesYTD,
            'SalesLastYear' => $this->SalesLastYear,
            'CostYTD' => $this->CostYTD,
            'CostLastYear' => $this->CostLastYear,
            'ModifiedDate' => $this->ModifiedDate
        ];
    }
}
