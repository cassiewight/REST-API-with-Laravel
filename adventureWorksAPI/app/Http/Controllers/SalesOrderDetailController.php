<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesOrderDetail;
use App\SalesOrderHeader;
use App\Http\Resources\SalesOrderHeaderResource;
use App\Http\Resources\SalesOrderDetailResource;

class SalesOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call resource function to return JSON
        return SalesOrderDetailResource::collection((new SalesOrderDetail)::paginate(10));
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
        $salesDetail = SalesOrderDetail::create($request->all());

        //return resource
        return new SalesOrderDetailResource($salesDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //call resource function to return JSON
        return new SalesOrderDetailResource(SalesOrderDetail::where('SalesOrderDetailID', $id)->first());
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
        $target = SalesOrderDetail::where('SalesOrderDetailID', $id)->first();

        $target->update($request->all());
        return new SalesOrderDetailResource($target);
        
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
        $target = SalesOrderDetail::where('SalesOrderDetailID', $id)->first();

        //delete entry
        $target->delete();
    }

    //****************************************/
    //********* GET Sub-Resources ************/
    //****************************************/

    public function showSalesOrderHeader($id){

        $target = SalesOrderDetail::where('SalesOrderDetailID', $id)->first();
        
        return new SalesOrderHeaderResource(SalesOrderHeader::findOrFail($target->SalesOrderID));

    }


}
