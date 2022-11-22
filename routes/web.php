<?php

use App\Http\Controllers\Admin\HomeController;
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

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::name('guest.')->group(
    function () {
        Route::get('/show{slug}', 'HomeController@show')->name('doctors.show');
    }
);



Auth::routes();

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/plans', 'PlanController@plan')->name('plans');

        // Route::get('/stats', 'StatsController@stats')->name('stats');

        Route::resource('messages', 'MessageController');

        Route::resource('stats', 'StatsController');

        Route::resource('reviews', 'ReviewController');

        Route::resource('doctors', 'DoctorController');
    });
