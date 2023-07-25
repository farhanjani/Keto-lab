<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list-products/{id}/{format?}', [ApiController::class, 'list_products']);
Route::get('/list-offers/{slug}', [ApiController::class, 'list_offers']);
Route::get('/list-upsells/{slug}', [ApiController::class, 'list_upsells']);
Route::get('/list-main-product/{id}', [ApiController::class, 'list_main_product']);
Route::get('/list-bought-products', [ApiController::class, 'list_bought_products']);
Route::post('/checkout', [ApiController::class, 'checkout']);
Route::post('/upsell-checkout', [ApiController::class, 'upsell_checkout']);
Route::post('/no-thanks', [ApiController::class, 'no_thanks']);
