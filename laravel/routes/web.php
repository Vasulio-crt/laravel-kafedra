<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dump('hello');
    // dump(config('database.connections.mysql'));
    dump(config('custom.custom_test', 'var not exist'));
    dump(config('custom.custom_test_env'));
    return view('welcome');
});
