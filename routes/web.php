<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nura', function () {
    return view('nura');
});

Route::resource('mahasiswa', MahasiswaController::class)->except(['show']);