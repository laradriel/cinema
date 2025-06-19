<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('hello', function () {
    // print in a table a random user from the database
    $this->info('Hello, World!');
    $users = User::all()->random(5)->select('id', 'name', 'email');
    $this->table(['ID', 'Name'], $users->toArray());
})->purpose('Display a hello world message');
