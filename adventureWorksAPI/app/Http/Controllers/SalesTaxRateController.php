<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SalesTaxRate;
use App\Http\Resources\SalesTaxRateResource;
use App\Helper;


class SalesTaxRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call resource fucntion to return JSON
        return SalesTaxRateResource::collection((new SalesTaxRate)::all());
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
        $taxRate = SalesTaxRate::create($request->all());

        //return resource 
        return new SalesTaxRateResource($taxRate);
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
        return new SalesTaxRateResource(SalesTaxRate::findOrFail($id));
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
        $target = SalesTaxRate::findOrFail($id);
        
        //update record
        $target->update($request->all());
        return new SalesTaxRateResource($target);
        
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
        $target = SalesTaxRate::findOrFail($id);

        //delete entry
        $target->delete();
    }
}
