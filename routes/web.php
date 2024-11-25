<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtherControll;
use App\Http\Controllers\RiceDateController;
use App\Http\Controllers\RiceDateViewController;
use App\Http\Controllers\RicePriceController;
use App\Http\Controllers\SaveMoneyController;
use App\Http\Controllers\SaveMoneyViewController;
use App\Models\SaveMoney;

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

// หน้าแรก 
Route::get('/', function () {
    return view('register.login');
});

//หน้าโฮม
Route::get('home', function () {
    return view('home.home');
})->name('home');
Route::prefix('home')->group(function () {
    Route::view('home', 'home.home')->name('home');
});

//เข้าสู่ระบบ
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
//ลงทะเบียน
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
//ออกจากระบบ
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');


//Chart Js กราฟ
Route::get('home', [ChartJsController::class, 'chartjshome']);
Route::get('home/home', [ChartJsController::class, 'chartjshome'])->name('home');

//Page customer  
Route::prefix('customer')->group(function () {

    Route::view('customer', 'customer.customer')->name('customer');
    //หน้าเพิ่มลูกค้า
    Route::view('customer-add', 'customer.customer-add')->name('customer-add');
    //หน้าแก้ไขลูกค้า
    Route::view('customer-edit', 'customer.customer-edit')->name('customer-edit');
    // Route::get('editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('editCustomer');
});
//ดูข้อมูลลูกค้า
Route::get('customer', [CustomerController::class, 'customerdata'])->name('customer');
// ฟอร์มเพิ่มลูกค้า

Route::post('insertCustomer', [CustomerController::class, 'insertCustomer'])->name('insertCustomer');
// ฟังก์ชันการแก้ไขลูกค้า
Route::get('editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('editCustomer');
//Update Customer
Route::post('updateCustomer/{id}', [CustomerController::class, 'updateCustomer'])->name('updateCustomer');

// ฟังก์ชันการลบลูกค้า
Route::delete('deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('customer.delete');



//Page manege-price
Route::prefix('manage-price')->group(function () {
    Route::view('manage-price', 'manage.manage-price')->name('manage-price');
    // ดูข้อมูลราคาข้าว
    Route::get('manage-price', [RicePriceController::class, 'ricepricedata'])->name('manage-price');
    // หน้าเพิ่มราคาข้าว
    Route::view('manage-price-add', 'manage.manage-price-add')->name('manage-price-add');
    Route::get('manage-price-add', [RicePriceController::class, 'customerdata'])->name('manage-price-add');
    // หน้าแก้ไขราคาข้าว
    Route::view('manage-price-edit', 'manage.manage-price-edit')->name('manage-price-edit');
});
// ฟอร์มเพิ่มราคาข้าว
Route::post('insertRiceprice', [RicePriceController::class, 'insertRiceprice'])->name('insertRiceprice');

// ฟังก์ชันการแก้ไขราคาข้าว
Route::get('editRiceprice/{id}', [RicePriceController::class, 'editRiceprice'])->name('editRiceprice');
//Update RicePrice
Route::post('updateRiceprice/{id}', [RicePriceController::class, 'updateRiceprice'])->name('updateRiceprice');

// ฟังก์ชันการลบราคาข้าว
Route::delete('deleteRiceprice/{id}', [RicePriceController::class, 'deleteRiceprice'])->name('deleteRiceprice');



//เส้นทางการจัดการวัน
Route::prefix('savetheday')->group(function () {
    Route::view('savetheday', 'savetheday.savetheday')->name('savetheday');
    // ดูข้อมูลวันข้าว
    Route::get('savetheday', [RiceDateController::class, 'ricedatedata'])->name('savetheday');
    // หน้าเพิ่มวันข้าว
    Route::view('savetheday-add', 'savetheday.savetheday-add')->name('savetheday-add');
    Route::get('savetheday-add', [RiceDateController::class, 'customerdata'])->name('savetheday-add');
    // หน้าแก้ไขวันข้าว
    Route::view('savetheday-edit', 'savetheday.savetheday-edit')->name('savetheday-edit');
    // หน้าใบเสร็จวันข้าว
    Route::view('savetheday-bill', 'savetheday.savetheday-bill')->name('savetheday-bill');
});
//Form Savetheday
Route::post('insertRicedate', [RiceDateController::class, 'insertRicedate'])->name('insertRicedate');
//Edit RiceDate
Route::get('editRicedate/{id}', [RiceDateController::class, 'editRicedate'])->name('editRicedate');
//Update RiceDate
Route::post('updateRicedate/{id}', [RiceDateController::class, 'updateRicedate'])->name('updateRicedate');
//Delete 
Route::delete('deleteRicedate/{id}', [RiceDateController::class, 'deleteRicedate'])->name('deleteRicedate');



//เส้นทางการจัดการเงิน
Route::prefix('savemoney')->group(function () {
    Route::view('savemoney', 'savemoney.savemoney')->name('savemoney');
    // ดูข้อมูลการจัดการเงิน
    Route::get('savemoney', [SaveMoneyController::class, 'savemoneydata'])->name('savemoney');
    // หน้าเพิ่มการจัดการเงิน
    Route::view('savemoney-add', 'savemoney.savemoney-add')->name('savemoney-add');
    Route::get('savemoney-add', [SaveMoneyController::class, 'savemoneyAddData'])->name('savemoney-add');
    // หน้าใบเสร็จการจัดการเงิน
    Route::view('savemoney-bill', 'savemoney.savemoney-bill')->name('savemoney-bill');
});
//Form SaveMoney
Route::post('insertSavemoney', [SaveMoneyController::class, 'insertSavemoney'])->name('insertSavemoney');
//Edit SaveMoney
Route::get('editSavemoney/{id}', [SaveMoneyController::class, 'editSavemoney'])->name('editSavemoney');
//Update SaveMoney
Route::post('updateSavemoney/{id}', [SaveMoneyController::class, 'updateSavemoney'])->name('updateSavemoney');
//Delete Savemoney
Route::get('deleteSavemoney/{id}', [SaveMoneyController::class, 'deleteSavemoney'])->name('deleteSavemoney');
//Detail Savemoney
Route::get('billSavemoney/{id}', [SaveMoneyController::class, 'billSavemoney'])->name('billSavemoney');



//Bill Ricedate to ricedate// ดูรายละเอียดวันข้าว
Route::get('ricedatedetail/{id}', [RiceDateViewController::class, 'ricedatedetail'])->name('ricedatedetail');
//Bill Ricedate to savemoney// ดูรายละเอียดการจัดการเงิน
Route::get('savemoneydetail/{id}', [SaveMoneyViewController::class, 'savemoneydetail'])->name('savemoneydetail');


//Pull data piceprice from customers id// ดึงข้อมูลราคาข้าวจาก ID ของลูกค้า
Route::get('/get-riceprice/{customer_id}', [RicePriceController::class, 'getRicePrice'])->name('getRicePrice');


//status// ตรวจสอบสถานะ
Route::get('/api/checkstatus/{customer_id}', [SaveMoneyController::class, 'checkstatus'])->name('checkstatus');











// page customer 
// Route::get('customer', function() {
//     return view('customer.customer');
// })->name('customer');
// Route::get('customer-add', function() {
//     return view('customer.customer-add');
// })->name('customer-add');
// Route::get('customer-edit', function() {
//     return view('customer.customer-edit');
// })->name('customer-edit');
// page customer 


//Page manage-price
// Route::get('manage-price', function() {
//     return view('manage.manage-price');
// })->name('manage-price');
// Route::get('manage-price-add', function() {
//     return view('manage.manage-price-add');
// })->name('manage-price-add');
// Route::get('manage-price-edit', function() {
//     return view('manage.manage-price-edit');
// })->name('manage-price-edit');