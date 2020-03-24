<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\SalesTaxRateResource;

use App\Http\Controllers\SalesTaxRateController;

use App\SalesTaxRate;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//********************************//
//******** SalesTaxRate **********//
//********************************//

//get all entries
Route::get('/SalesTaxRate', 'SalesTaxRateController@index');

//get entry by ID
Route::get('/SalesTaxRate/{id}/', 'SalesTaxRateController@show');

//create entry
Route::post('/SalesTaxRate', 'SalesTaxRateController@store');

//update entry
Route::put('/SalesTaxRate/{id}/', 'SalesTaxRateController@update');

//delete entry
Route::delete('/SalesTaxRate/{id}/', 'SalesTaxRateController@destroy');



//********************************//
//******** SalesTerritory ********//
//********************************//

//get all entries
Route::get('/SalesTerritory', 'SalesTerritoryController@index');

//get entry by ID
Route::get('/SalesTerritory/{id}/', 'SalesTerritoryController@show');

//create entry
Route::post('/SalesTerritory', 'SalesTerritoryController@store');

//update entry
Route::put('/SalesTerritory/{id}/', 'SalesTerritoryController@update');

//delete entry
Route::delete('/SalesTerritory/{id}/', 'SalesTerritoryController@destroy');

//get SalesPersons associated with TerritoryID
Route::get('/SalesTerritory/{id}/SalesPerson', 'SalesTerritoryController@showSalesPerson');

//get SalesOrderHeaders associated with TerritoryID
Route::get('/SalesTerritory/{id}/SalesOrderHeader', 'SalesTerritoryController@showHeaders');



//********************************//
//******** SalesReason ********//
//********************************//

//get all entries
Route::get('/SalesReason', 'SalesReasonController@index');

//get entry by ID
Route::get('/SalesReason/{id}/', 'SalesReasonController@show');

//create entry
Route::post('/SalesReason', 'SalesReasonController@store');

//update entry
Route::put('/SalesReason/{id}/', 'SalesReasonController@update');

//delete entry
Route::delete('/SalesReason/{id}/', 'SalesReasonController@destroy');

//get SalesOrderHeaders associated with SalesReasonID
Route::get('/SalesReason/{id}/SalesOrderHeader', 'SalesReasonController@showHeaders');



//********************************//
//******** SalesOrderHeader ********//
//********************************//

//get all entries
Route::get('/SalesOrderHeader', 'SalesOrderHeaderController@index');

//get entry by ID
Route::get('/SalesOrderHeader/{id}/', 'SalesOrderHeaderController@show');

//create entry
Route::post('/SalesOrderHeader', 'SalesOrderHeaderController@store');

//update entry
Route::put('/SalesOrderHeader/{id}/', 'SalesOrderHeaderController@update');

//delete entry
Route::delete('/SalesOrderHeader/{id}/', 'SalesOrderHeaderController@destroy');

//get SaleTerritory by SaleOrderHeaderID
Route::get('/SalesOrderHeader/{id}/SalesTerritory', 'SalesOrderHeaderController@showTerritory');

//get SaleReason by SaleOrderHeaderID
Route::get('/SalesOrderHeader/{id}/SalesReason', 'SalesOrderHeaderController@showReason');

//get SalesPerson by SaleOrderHeaderID
Route::get('/SalesOrderHeader/{id}/SalesPerson', 'SalesOrderHeaderController@showSalesPerson');

//add a SalesReason to a SalesOrderHeader by ID
Route::post('/SalesOrderHeader/{salesOrderId}/SalesReason/{salesReasonId}', 'SalesOrderHeaderController@addSalesReason');

//remove a SalesReason from a SalesOrderHeader by ID
Route::delete('/SalesOrderHeader/{salesOrderId}/SalesReason/{salesReasonId}', 'SalesOrderHeaderController@removeSalesReason');

//get all SaleOrderDetails by SaleOrderHeaderID
Route::get('/SalesOrderHeader/{id}/SalesOrderDetail', 'SalesOrderHeaderController@showDetail');



//********************************//
//******** SalesOrderDetail ********//
//********************************//


//get all entries
Route::get('/SalesOrderDetail', 'SalesOrderDetailController@index');

//get entry by ID
Route::get('/SalesOrderDetail/{id}/', 'SalesOrderDetailController@show');

//create entry
Route::post('/SalesOrderDetail', 'SalesOrderDetailController@store');

//update entry
Route::put('/SalesOrderDetail/{id}/', 'SalesOrderDetailController@update');

//delete entry
Route::delete('/SalesOrderDetail/{id}/', 'SalesOrderDetailController@destroy');

//get SalesOrderHeader by SalesOrderDetailID
Route::get('/SalesOrderDetail/{id}/SalesOrderHeader/', 'SalesOrderDetailController@showSalesOrderHeader');



//********************************//
//******** SalesPerson ********//
//********************************//

//get all entries
Route::get('/SalesPerson', 'SalesPersonController@index');

//get entry by ID
Route::get('/SalesPerson/{id}/', 'SalesPersonController@show');

//create entry
Route::post('/SalesPerson', 'SalesPersonController@store');

//update entry
Route::put('/SalesPerson/{id}/', 'SalesPersonController@update');

//delete entry
Route::delete('/SalesPerson/{id}/', 'SalesPersonController@destroy');

//get SalesTerritory by SalesPersonID
Route::get('/SalesPerson/{id}/SalesTerritory', 'SalesPersonController@showTerritory');

//get SalesPersonQuotaHistories associated with the SalesPerson ID
Route::get('/SalesPerson/{id}/SalesQuotaHistory', 'SalesPersonController@showQuotaHistory');

//get SalesOrderHeaders associated with the SalesPerson ID
Route::get('/SalesPerson/{id}/SalesOrderHeader', 'SalesPersonController@showHeaders');

//add a SalesPersonQuotaHistory associated with the SalesPerson ID
Route::post('/SalesPerson/{id}/SalesQuotaHistory', 'SalesPersonController@addQuotaHistory');

//delete a SalesPersonQuotaHistory associated with the SalesPerson ID
Route::delete('/SalesPerson/{salesPersonId}/SalesQuotaHistory/{salesQuotaDate}/', 'SalesPersonController@deleteQuotaHistory');


