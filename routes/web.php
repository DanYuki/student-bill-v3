<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;

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
Route::get('/', [PagesController::class, 'index']);
Route::get('/import', function() {
    return view('students.import');
});
Route::post('/student/import', [StudentController::class, 'storeImport'])->name('importx');
Route::resource('/student', \App\Http\Controllers\StudentController::class);