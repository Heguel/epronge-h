<?php

use App\Http\Controllers\NewEnrollController;
use Illuminate\Support\Facades\Route;

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

Route::controller(NewEnrollController::class)->group(function () {
    Route::resource('enrolls',NewEnrollController::class);
    Route::get('inscription', "inscriptionFunc")->name('newEnroll.form');

});

