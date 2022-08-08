<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [WebsiteController::class, 'dashboard']);

// contact-related routes
Route::get('contacts', [ContactController::class, 'index']);
Route::get('contacts/create', [ContactController::class, 'create']);
Route::get('contacts/{id}', [ContactController::class, 'show']);
Route::get('contacts/{id}/edit', [ContactController::class, 'edit']);
Route::post('contacts', [ContactController::class, 'save']);
Route::put('contacts/{id}', [ContactController::class, 'update']);
Route::delete('contacts/{id}', [ContactController::class, 'destroy']);
