<?php

use Illuminate\Support\Facades\Route;
use App\SalesTerritory;
use App\SalesOrderHeaderSalesReason;
use App\SalesOrderHeader;
use App\SalesTaxRate;
use App\SalesPerson;
use App\Model;
use App\SalesOrderDetail;
use App\SalesReason;
use App\SalesPersonQuotaHistory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

