<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SalesOrderHeader;
use App\SalesOrderHeaderSalesReason;
use App\SalesReason;
use App\SalesPerson;
use App\SalesOrderDetail;
use App\Http\Resources\SalesOrderHeaderResource;
use App\Http\Resources\SalesTerritoryResource;
use App\Http\Resources\SalesOrderDetailResource;
use App\Http\Resources\SalesReasonResource;
use App\Http\Resources\SalesPersonResource;
use App\Helper;

class SalesOrderHeaderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call resource function to return JSON
        return SalesOrderHeaderResource::collection((new SalesOrderHeader)::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new entry
        $salesHeader = SalesOrderHeader::create($request->all());

        //return resource
        return new SalesOrderHeaderResource($salesHeader);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //call resource fucntion to return JSON
        return new SalesOrderHeaderResource(SalesOrderHeader::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //find target object
        $target = SalesOrderHeader::findOrFail($id);
        
        $target->update($request->all());
        return new SalesOrderHeaderResource($target);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find target object
        $target = SalesOrderHeader::findOrFail($id);

        //delete entry
        $target->delete();
    }


    //****************************************/
    //********* GET Sub-Resources ************/
    //****************************************/

    public function showDetail($id)
    {      
        return SalesOrderDetailResource::collection((new SalesOrderDetail)::where('SalesOrderID', $id)->paginate());
        
    }

    public function showTerritory($id)
    {
        $salesOrderHeader = SalesOrderHeader::findOrFail($id);
        $territory = $salesOrderHeader->salesTerritory;

        return new SalesTerritoryResource($territory);
    }

    public function showReason($id)
    {
        $header = SalesOrderHeader::find($id);
        $reason = $header->salesReasons;

        return SalesReasonResource::collection($reason);
        
    }

    public function showSalesPerson($id)
    {
        $header = SalesOrderHeader::findOrFail($id);
        $person = $header->salesPerson;

        return new SalesPersonResource($person);
    }


    //****************************************/
    //******** MUTATORS Sub Resources ********/
    //****************************************/


    //Add SalesReason to a SalesOrderHeader by adding an entry into the junction table 'SalesOrderHeaderSalesReason'
    public function addSalesReason($salesOrderId, $salesReasonId)
    {
        SalesOrderHeaderSalesReason::create([
            'SalesOrderID' => $salesOrderId,
            'SalesReasonID' => $salesReasonId
        ]);
    }

    //Remove a SalesReason from a SalesOrderHeader by destroying the record in the junction table 'SalesOrderHeaderSalesReason'
    public function removeSalesReason($salesOrderId, $salesReasonId)
    {
        $target = SalesOrderHeaderSalesReason::where('SalesOrderID', $salesOrderId)->where('SalesReasonID', $salesReasonId);

        $target->delete();

    }

}
