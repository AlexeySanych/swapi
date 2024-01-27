<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomelandController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('homepage');
Route::get('/people/homeland', [HomelandController::class, 'search'])->name('homeland.search');
Route::post('/people/homeland', [HomelandController::class, 'result'])->name('homeland.search');
Route::resource('/people', ResourceController::class)->whereNumber(['person']);
