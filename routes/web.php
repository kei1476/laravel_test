<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/',[ContactController::class,'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/complete',[ContactController::class,'complete']);
Route::get('/delete/{id}',[ContactController::class,'delete']);
Route::get('/admin',[ContactController::class,'search']);
