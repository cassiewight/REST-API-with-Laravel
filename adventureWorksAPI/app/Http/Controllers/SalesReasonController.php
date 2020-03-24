<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SalesReason;
use App\SalesOrderHeader;
use App\Http\Resources\SalesReasonResource;
use App\Http\Resources\SalesOrderHeaderResource;
use App\Helper;

class SalesReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call resource fucntion to return JSON
        return SalesReasonResource::collection((new SalesReason)::all());
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
        $salesReason = SalesReason::create
        ($request->all());

        //return resource
        return new SalesReasonResource($salesReason);
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
        return new SalesReasonResource(SalesReason::findOrFail($id));
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
        $target = SalesReason::findOrFail($id);
        
        //update record
        $target->update($request->all());
        return new SalesReasonResource($target);
        
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
        $target = SalesReason::findOrFail($id);

        //delete entry
        $target->delete();
    }


    //****************************************/
    //********* GET Nested Tables ************/
    //****************************************/

    public function showHeaders($id){
        
        $reason= SalesReason::find($id);
        $header = $reason->salesOrderHeaders()->paginate();

        return SalesOrderHeaderResource::collection($header);

    }
}


