<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('robot_auto')->group(function() {
    Route::prefix('/fetch')->group(function () {
        Route::post('/district', [App\Http\Controllers\Controller::class, 'fetchDistrict'])->name('fetch.get-district');
        Route::post('/ward', [App\Http\Controllers\Controller::class, 'fetchWard'])->name('fetch.get-ward');
        Route::post('/street', [App\Http\Controllers\Controller::class, 'fetchStreet'])->name('fetch.get-street');
        Route::post('/street-by-district', [App\Http\Controllers\Controller::class, 'fetchStreetByDistrict'])->name('fetch.get-street-by-district');
        Route::post('/contact', [App\Http\Controllers\ProductController::class, 'fetchContact'])->name('fetch.get-contact');
        Route::post('/check-password', [App\Http\Controllers\AccountController::class, 'checkPassword'])->name('fetch.check-password');
        Route::post('/get-list-news', [App\Http\Controllers\ProductController::class, 'getListNews'])->name('fetch.get-list-news');
    });
    
    Route::middleware('guest')->group(function() {
        Route::prefix('/process')->group(function () {
            Route::post('/signup', [App\Http\Controllers\AccountController::class, 'processSignup'])->name('process-signup');
            Route::post('/signin', [App\Http\Controllers\AccountController::class, 'processSignin'])->name('process-signin');
        });
        Route::get('/login', [App\Http\Controllers\AccountController::class, 'signin'])->name('login');
        Route::get('/signin', [App\Http\Controllers\AccountController::class, 'signin'])->name('signin');
        Route::get('/signup', [App\Http\Controllers\AccountController::class, 'signup'])->name('signup');
    });
    
    Route::middleware('auth')->group(function() {
        Route::get('/dang-bai', [App\Http\Controllers\ProductController::class, 'postProduct'])->name('dang-bai');
        Route::get('/chinh-sua-bai-viet-{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('chinh-sua-bai-viet');
        Route::post('/getForm', [App\Http\Controllers\ProductController::class, 'getFormPost'])->name('getForm');
        Route::post('/process-post', [App\Http\Controllers\ProductController::class, 'processPost'])->name('process-postProduct');
        Route::post('/process-edit-post/{id}', [App\Http\Controllers\ProductController::class, 'processEdit'])->name('process-editProduct');
        Route::get('/process-status/{id}-{status}', [App\Http\Controllers\ProductController::class, 'processStatus'])->name('process-status');
        Route::prefix('/logout')->group(function () {
            Route::get('/', [App\Http\Controllers\AccountController::class, 'logout'])->name('logout');
            Route::get('/all', [App\Http\Controllers\AccountController::class, 'logoutAll'])->name('logout.all');
        });
        Route::post('/process-rating', [App\Http\Controllers\ProductController::class, 'processRating'])->name('process-rating');
        Route::get('/thong-tin-ca-nhan-cua-{phone}', [App\Http\Controllers\AccountController::class, 'profile'])->name('profile');
        Route::get('/kho-khach', [App\Http\Controllers\WarehouseController::class, 'index'])->name('kho-khach');
        Route::post('/nhu-cau-phu-hop-kho-khach', [App\Http\Controllers\WarehouseController::class, 'findNhuCau'])->name('kho-khach.find');
        Route::get('/quan-ly-tin', [App\Http\Controllers\ProductController::class, 'managementNew'])->name('quan-ly-tin');
        Route::get('/quan-ly-nhan-vien', [App\Http\Controllers\ProductController::class, 'managementStaff'])->name('quan-ly-nhan-vien');
        Route::get('/quan-ly-khach-hang', [App\Http\Controllers\ProductController::class, 'managementClient'])->name('quan-ly-khach-hang');
        Route::get('/quan-ly-thu-chi', [App\Http\Controllers\ProductController::class, 'managementExpenditure'])->name('quan-ly-thu-chi');
    });
    
    Route::prefix('/method')->group(function() {
        Route::middleware('auth')->group(function() {
            Route::post('/updateProfile', [App\Http\Controllers\AccountController::class, 'updateProfile'])->name('method.updateProfile');
            Route::post('/updatePassword', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('method.updatePassword');
            Route::post('/add-warehouse', [App\Http\Controllers\WarehouseController::class, 'addWarehouse'])->name('method.add-warehouse');
            Route::post('/add-option', [App\Http\Controllers\WarehouseController::class, 'addOption'])->name('method.add-option');
            Route::post('/get-customer-demand', [App\Http\Controllers\WarehouseController::class, 'getDemand'])->name('method.get-customer-demand');
            Route::post('/get-customer-interact', [App\Http\Controllers\WarehouseController::class, 'getInteract'])->name('method.get-customer-interact');
            Route::post('/get-customer-note', [App\Http\Controllers\WarehouseController::class, 'getNote'])->name('method.get-customer-note');
            Route::post('/add-customer-note', [App\Http\Controllers\WarehouseController::class, 'addNote'])->name('method.add-customer-note');
            Route::post('/process-images', [App\Http\Controllers\ProductController::class, 'processImages'])->name('method.process-images');
            Route::post('/process-scope', [App\Http\Controllers\ProductController::class, 'processScope'])->name('method.change-scope');
            Route::post('/transfer', [App\Http\Controllers\ProductController::class, 'transfer'])->name('method.transfer');
            Route::get('/change-role', [App\Http\Controllers\ProductController::class, 'changeRole'])->name('method.change-role');
            Route::get('/change-area', [App\Http\Controllers\ProductController::class, 'changeArea'])->name('method.change-area');
            Route::get('/change-upper', [App\Http\Controllers\ProductController::class, 'changeUpper'])->name('method.change-upper');
            Route::get('/reset-pass-{id}', [App\Http\Controllers\ProductController::class, 'resetPass'])->name('method.reset-password');
            Route::get('/lock-staff-{id}', [App\Http\Controllers\ProductController::class, 'processLock'])->name('method.process-lock');
            Route::post('/add-staff', [App\Http\Controllers\ProductController::class, 'addStaff'])->name('method.add-staff');
            Route::get('/process-marketing-{id}', [App\Http\Controllers\ProductController::class, 'processMarketing'])->name('method.marketing');
            Route::post('/search-warehouse', [App\Http\Controllers\WarehouseController::class, 'searchWarehouse'])->name('method.search-warehouse');
            Route::get('/delete-private-warehouse-{id}', [App\Http\Controllers\WarehouseController::class, 'delPrivateWarehouse'])->name('method.delete-private-warehouse');
            Route::get('/get-collect-spend', [App\Http\Controllers\ProductController::class, 'getDataThuChi'])->name('method.get-collect-spend');
            Route::get('/get-collect-spend-date', [App\Http\Controllers\ProductController::class, 'getDataThuChiDate'])->name('method.get-collect-spend-fill-date');
            Route::get('/in-phieu-thu-chi-{id}', [App\Http\Controllers\ProductController::class, 'inPhieuThuChi'])->name('method.in-phieu-thu-chi');
            Route::get('/xoa-phieu-thu-chi-{id}', [App\Http\Controllers\ProductController::class, 'xoaPhieuThuChi'])->name('method.delete-phieu-thu-chi');
            Route::post('/them-phieu-thu-chi', [App\Http\Controllers\ProductController::class, 'store_expenditure'])->name('method.add-expenditure');
        });
        Route::post('/addAddress', [App\Http\Controllers\ProductController::class, 'addAddress'])->name('method.addAddress');
        Route::get('/delete-permanently/{id}', [App\Http\Controllers\ProductController::class, 'deletePermanently'])->name('method.delete-permanently');
        Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('method.search');
        Route::post('/add-location', [App\Http\Controllers\AccountController::class, 'addLocation'])->name('method.add-location');
        Route::get('/remove-location', [App\Http\Controllers\AccountController::class, 'removeLocation'])->name('method.remove-location');
        Route::post('/filterAction/action={action}', [App\Http\Controllers\ProductController::class, 'filterAction'])->name('method.filterAction');
    });
    
    Route::prefix('/post')->group(function() {
        Route::get('/{slug}', [App\Http\Controllers\ProductController::class, 'postDetail'])->name('post-detail');
    });
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/mua-ban-bat-dong-san', [App\Http\Controllers\HomeController::class, 'signup'])->name('mua-ban-bat-dong-san');
    Route::get('/cho-thue-bat-dong-san', [App\Http\Controllers\ProductController::class, 'choThue'])->name('cho-thue-bat-dong-san');
    Route::get('/cho-thue-bat-dong-san-{seo}', [App\Http\Controllers\ProductController::class, 'choThue'])->name('cho-thue-bat-dong-san-filter');
    Route::get('/affilate', [App\Http\Controllers\HomeController::class, 'signup'])->name('affilate');
    Route::get('/tin-da-dang/{id}', [App\Http\Controllers\ProductController::class, 'postedArticle'])->name('tin-da-dang.id');    
});

Route::get('/degisn-bonlaspa', [App\Http\Controllers\HomeController::class, 'design'])->name('design');
Route::get('/test-fetch-image', [App\Http\Controllers\HomeController::class, 'testFetchImage'])->name('test-fetch-image');