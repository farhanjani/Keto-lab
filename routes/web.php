<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin_site;
use App\Http\Controllers\Admin\UpsellProducts;
use App\Http\Controllers\Admin\Offers;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\Auth\AdminAuth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;

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
Route::get('admin', [AdminAuth::class, 'admin_login'])->name('admin.login');
Route::get('admin/login', [AdminAuth::class, 'admin_login'])->name('admin.login');
Route::post('admin/login-processing', [AdminAuth::class, 'login_processing'])->name('admin.login-processing');

Route::middleware('auth:admin')->prefix('admin/')->name('admin.')->group(function () {

    Route::controller(Offers::class)->group(function(){
        Route::get('offers', 'index')->name('offers');
        Route::get('/import-campaign-offers/{campaign_id}', 'import_campaign_offers')->name('import-campaign-offers');
        Route::post('/import-selected-campaign-offers', 'import_selected_campaign_offers')->name('import-selected-campaign-offers');
        Route::get('get-campaign-offers/{id}', 'get_campaign_offers')->name('get-campaign-offers');
        Route::post('/add-offer', 'add_offer')->name('add-offer');
        Route::get('/update-offer/{id}', 'update')->name('update-offer');
        Route::post('/update-offer', 'update_offer')->name('update-offer');
        Route::post('/get-offers-datatable', 'get_datatable')->name('get-offers-datatable');
        Route::get('/delete-offer/{id}', 'delete_offer')->name('delete-offer');
        Route::get('/approve-offer/{id}', 'approve_offer')->name('approve-offer');
        Route::get('/reject-offer/{id}', 'reject_offer')->name('reject-offer');
    });

    Route::controller(UpsellProducts::class)->group(function(){
        Route::get('upsell-products', 'index')->name('upsell-products');
        Route::post('/add-upsell-product', 'add_upsell_product')->name('add-upsell-product');
        Route::get('/import-upsell-products/{campaign_id}', 'import_upsell_products')->name('import-upsell-products');
        Route::post('/import-selected-upsell-products', 'import_selected_upsell_products')->name('import-selected-upsell-products');
        Route::post('/get-upsell-products-datatable', 'get_datatable')->name('get-upsell-products-datatable');
        Route::get('/delete-upsell-product/{id}', 'delete_upsell_product')->name('delete-upsell-product');
        Route::get('/approve-upsell-product/{id}', 'approve_upsell_product')->name('approve-upsell-product');
        Route::get('/reject-upsell-product/{id}', 'reject_upsell_product')->name('reject-upsell-product');
        Route::get('/update-upsell-product/{id}', 'update')->name('update-upsell-product');
        Route::post('/update-upsell-product', 'update_upsell_product')->name('update-upsell-product');
    });

    Route::get('settings', [Settings::class, 'index'])->name('settings');
    Route::get('dashboard', [Admin_site::class, 'index'])->name('dashboard');
    Route::get('/logout', [AdminAuth::class, 'logout'])->name('logout');
    Route::post('/update-setting', [Settings::class, 'update_setting'])->name('update-setting');
});


Route::controller(CheckoutController::class)->group(function(){
    Route::post('/process-cart', 'process_cart')->name('process-cart');
    Route::post('/remove-offer', 'remove_offer')->name('remove-offer');
    Route::post('/plus-offer', 'plus_offer')->name('plus-offer');
    Route::post('/minus-offer', 'minus_offer')->name('minus-offer');
    Route::post('/empty-cart', 'empty_cart')->name('empty-cart');
    Route::post('/checkout', 'checkout')->name('checkout');

});

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/ingredients', 'ingredients')->name('ingredients');
    Route::get('/contact-us', 'contact_us')->name('contact-us');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/thank-you', 'thank_you')->name('thank-you');
});

Route::get("create/user",[AdminAuth::class, 'create_user']);