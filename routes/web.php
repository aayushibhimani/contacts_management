<?php

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

Route::get('/create-contact', function () {
    return view('create');
});

Auth::routes();


Route::middleware(['auth'])->group(function(){
    // Route::resource('contacts','App\Http\Controllers\ContactsController')->except('index');
    // Route::get('/home', [App\Http\Controllers\ContactsController::class, 'index'])->name('home');

    Route::resource('contacts','App\Http\Controllers\ContactsController');
    Route::get('/home', [App\Http\Controllers\ContactsController::class, 'index']);

});

