<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesOrderHeaderResource extends JsonResource
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
            'RevisionNumber' => $this->RevisionNumber, 
            'OrderDate' => $this->OrderDate, 
            'DueDate' => $this->DueDate, 
            'ShipDate' => $this->ShipDate, 
            'Status' => $this->Status, 
            'OnlineOrderFlag' => $this->OnlineOrderFlag, 
            'SalesOrderNumber' => $this->SalesOrderNumber, 
            'PurchaseOrderNumber' => $this->PurchaseOrderNumber, 
            'AccountNumber' => $this->AccountNumber, 
            'CustomerID' => $this->CustomerID, 
            'ContactID' => $this->ContactID, 
            'SalesPersonID' => $this->SalesPersonID, 
            'TerritoryID' => $this->TerritoryID, 
            'BillToAddressID' => $this->BillToAddressID, 
            'ShipToAddressID' => $this->ShipToAddressID, 
            'ShipMethodID' => $this->ShipMethodID, 
            'CreditCardID' => $this->CreditCardID, 
            'CreditCardApprovalCode' => $this->CreditCardApprovalCode, 
            'CurrencyRateID' => $this->CurrencyRateID, 
            'SubTotal' => $this->SubTotal, 
            'TaxAmt' => $this->TaxAmt, 
            'Freight' => $this->Freight, 
            'TotalDue' => $this->TotalDue, 
            'Comment' => $this->Comment, 
            'ModifiedDate' => $this->ModifiedDate
            ];
    }
}
