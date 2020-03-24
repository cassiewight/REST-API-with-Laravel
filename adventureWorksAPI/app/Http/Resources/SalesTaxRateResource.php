<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesTaxRateResource extends JsonResource
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
        'SalesTaxRateID' => $this->SalesTaxRateID,
        'StateProvinceID' => $this->StateProvinceID,
        'TaxType' => $this->TaxType,
        'TaxRate' => $this->TaxRate,
        'Name' => $this->Name,
        'ModifiedDate' => $this->ModifiedDate
        ];
    }

    
}
