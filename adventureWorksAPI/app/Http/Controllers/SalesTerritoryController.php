<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SalesTerritory;
use App\SalesPerson;
use App\SalesOrderHeader;
use App\Http\Resources\SalesTerritoryResource;
use App\Http\Resources\SalesPersonResource;
use App\Http\Resources\SalesOrderHeaderResource;
use App\Helper;

class SalesTerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call resource fucntion to return JSON
        return SalesTerritoryResource::collection((new SalesTerritory)::all());
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
        $territory = SalesTerritory::create($request->all());

        //return resource
        return new SalesTerritoryResource($territory);
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
        return new SalesTerritoryResource(SalesTerritory::findOrFail($id));
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
        $target = SalesTerritory::findOrFail($id);
        
        //update table
        $target->update($request->all());
        return new SalesTerritoryResource($target);
        
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
        $target = SalesTerritory::findOrFail($id);

        //delete entry
        $target->delete();
    }


    //****************************************/
    //********* GET Sub-Resources ************/
    //****************************************/
    

    public function showSalesPerson($id){

        return SalesPersonResource::collection((new SalesPerson)::where('TerritoryID', $id)->paginate(10));
    }

    public function showHeaders($id){
        
        return SalesOrderHeaderResource::collection((new SalesOrderHeader)::where('TerritoryID', $id)->paginate(10));
    }
}
