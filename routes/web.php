<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



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

Route::get('/', function () {
    return view('welcome');
});



// Route::group(['middleware' => ['filament.auth']], function () {
    
// });


Route::group(['middleware' => 'auth'], function () {
    Route::get('/category', [CategoryController::class,'index']);
    // Your protected routes here
});


// Route::group(['middleware' => ['filament.auth']], function () {
// });


 
