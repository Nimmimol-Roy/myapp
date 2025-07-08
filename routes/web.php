<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestLogController;


Route::get('/', [RequestLogController::class, 'index'])->name('home');
Route::get('/logs', [RequestLogController::class, 'logdata'])->name('logs.index');
Route::post('/logs/clear', [RequestLogController::class, 'clear'])->name('logs.clear');

