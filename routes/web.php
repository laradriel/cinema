<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['name' => 'World']);
});

Route::post('/submit', function () {});
Route::put('/put', function () {});
Route::delete('/delete', function () {});
Route::patch('/patch', function () {});
Route::options('/options', function () {});

Route::resource('users', UserController::class)
  ->only(['index', 'store', 'update', 'destroy']);
