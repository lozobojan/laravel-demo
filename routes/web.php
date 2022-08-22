<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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


Route::group(['middleware' => 'auth'], function ($router){

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard');
    // route-model binding
    Route::resource('contacts', ContactController::class);
    Route::get('/cites-by-country/{country}', [CityController::class, 'getCitiesByCountry'])->name('get-cities-by-country');
    Route::get('{contact}/download-image', [ContactController::class, 'downloadImage'])->name('download-image');

});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
