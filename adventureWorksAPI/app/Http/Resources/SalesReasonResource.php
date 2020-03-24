<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesReasonResource extends JsonResource
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
            'SalesReasonID' => $this->SalesReasonID,
            'Name' => $this->Name,
            'ReasonType' => $this->ReasonType,
            'ModifiedDate' => $this->ModifiedDate
            ];
    }
}
