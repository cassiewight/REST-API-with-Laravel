<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SalesPerson;
use App\SalesTerritory;
use App\SalesOrderHeader;
use App\SalesPersonQuotaHistory;
use App\Http\Resources\SalesTerritoryResource;
use App\Http\Resources\SalesPersonResource;
use App\Http\Resources\SalesOrderHeaderResource;
use App\Http\Resources\SalesPersonQuotaHistoryResource;
use App\Helper;

class SalesPersonController extends Controller
{
    public function index()
    {
        //call resource function to return JSON
        return SalesPersonResource::collection((new SalesPerson)::paginate(10));
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
        $salesHeader = SalesPerson::create($request->all());

        //return resource
        return new SalesPersonResource($salesHeader);
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
        return new SalesPersonResource(SalesPerson::findOrFail($id));
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
        $target = SalesPerson::findOrFail($id);
        
        //update record
        $target->update($request->all());
        return new SalesPersonResource($target);
        
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
        $target = SalesPerson::findOrFail($id);

        //delete entry
        $target->delete();
    }


    //****************************************/
    //********* GET Sub Resources ************/
    //****************************************/


    public function showTerritory($id)
    {
        $person = SalesPerson::findOrFail($id);
        $territory = $person->salesTerritory;
        
        return new SalesTerritoryResource($territory);
    }

    public function showQuotaHistory($id)
    {

        //Cannot use Eloquent Relationship because of composite primary key(?)
        return SalesPersonQuotaHistoryResource::collection((new SalesPersonQuotaHistory)::where('SalesPersonID', $id)->paginate(10));

    }

    public function showHeaders($id){

        //Cannot use Eloquent because no reference to SalesOrderHeader in SalesPerson table. (SalesOrderHeader : SalesPerson = Zero or One : Zero or One or Many relationship)
        return SalesOrderHeaderResource::collection((new SalesOrderHeader)::where('SalesPersonID', $id)->paginate(10)); 

    }

    //****************************************/
    //******** MUTATORS - Sub-Resources ********/
    //****************************************/


    public function addQuotaHistory(Request $request, $id){

        SalesPersonQuotaHistory::create([
            "SalesPersonID" => $id,
            "QuotaDate" => $request->QuotaDate,
            "SalesQuota" => $request->SalesQuota,
        ]);

    }

    public function deleteQuotaHistory($salesPersonID, $salesQuotaDate){

        $target = SalesPersonQuotaHistory::where('QuotaDate', $salesQuotaDate)->where('SalesPersonID', $salesPersonID)->first();
        
        $target->delete();

    }

    

}
