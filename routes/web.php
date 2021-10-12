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
    $items = config('items');
    return view('home', ['items'=> $items]);
})->name('home');

Route::get('/items/{id}', function ($id) {
    $items = config('items');
    $item = $items[$id];
    return view('item_details', compact('item'));
})->name('item_details');
