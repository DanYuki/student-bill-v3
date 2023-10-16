<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PaymentController;

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

// For static pages I consider using this 
// Route::get('/', function () {
//     return 'welcome';
// });

// But, since index probably will contain some data from database, I'll probably use this one
Auth::routes();
Route::get('/', [PagesController::class, 'index']);

// Student Route
Route::get('/student/add', [StudentController::class, 'create'])->name('add-student');
Route::post('/student/store', [StudentController::class, 'store'])->name('store-student');
Route::get('/student/import', [StudentController::class, 'import']);
Route::post('/student/import/store', [StudentController::class, 'storeImport'])->name('importx');
Route::get('/student/{id}/bill', [BillController::class, 'attachBill'])->name('attach-bill');
Route::post('/student/{id}/bill/store', [BillController::class, 'attachBillStore'])->name('attach-bill-post');
Route::get('/student/{id}/bill/pay', [PaymentController::class, 'create'])->name('pay-bill');
Route::post('/student/{id}/bill/pay/store', [PaymentController::class, 'store'])->name('pay-bill-post');
Route::resource('/student', \App\Http\Controllers\StudentController::class);

Route::resource('/bill', \App\Http\Controllers\BillController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
