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
    return view('home');
})->name('home');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/order', function () {
    return view('order');
})->name('order');

Route::get('/admin-login', function () {
    return view('admin-login');
})->name('admin-login');

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->name('admin-dashboard');

Route::get('/admin-food', function () {
    return view('admin-food');
})->name('admin-food');

