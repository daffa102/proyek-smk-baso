<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Login Register Route
Route::get('/login', function () {
    return view('livewire.auth.login');
})->name('login');


Route::get('/register', function () {
    return view('livewire.auth.register');
})->name('register');
