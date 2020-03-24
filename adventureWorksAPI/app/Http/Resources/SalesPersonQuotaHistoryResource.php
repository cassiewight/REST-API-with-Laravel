<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesPersonQuotaHistoryResource extends JsonResource
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
            'QuotaDate' => $this->QuotaDate, 
            'SalesQuota' => $this->SalesQuota,
            'ModifiedDate' => $this->ModifiedDate
        ];
    }
}
