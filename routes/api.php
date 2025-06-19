<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    $user = User::all()->random();

    Log::info('User retrieved', ['user' => $user->toArray()]);

    Log::critical('USER ID: '.$user->id);

    return $user;
});
