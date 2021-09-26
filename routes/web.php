<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\UserContolloer;
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
    return view('welcome')->with('title', 'Home');
});

Route::get('/dashboard', function () {
    return view('welcome')->with('title', 'Home');
});

Route::get('/about-us', function () {
    // return 'About us';
    return view('about-us');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact-us', function () {
    return 'Contact us';
});

Route::resource('expenses', ExpensesController::class)->middleware('auth');
Route::resource('users', UserContolloer::class)->middleware('auth')->middleware('admin');


include __DIR__ . '/auth.php';
