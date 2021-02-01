<?php
use Illuminate\Support\Facades\Route;
use Packt\PacktAuth\Http\Controllers\PacktAuth;

Route::group(['middleware' => ['web']], function(){
    Route::get('/auth/365', [PacktAuth::class, 'redirectToAzure'])->name('redirectToAzure');
    Route::get('/auth/365/callback', [PacktAuth::class, 'handleAzureResponse'])->name('handleAzure');
});


