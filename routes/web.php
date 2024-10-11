<?php

use App\Http\Middleware\ApproverHandler;
use App\Http\Middleware\CreatorHandler;
use App\Http\Middleware\RoleHandler;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index')->middleware(RoleHandler::class);
    Route::get('/approver', [App\Http\Controllers\Approver\DashboardController::class, 'index'])->name('approver.index');
    Route::get('/creator', [App\Http\Controllers\Creator\DashboardController::class, 'index'])->name('creator.index');


    Route::resource('delivery-orders', App\Http\Controllers\Creator\DeliveryOrderController::class)->middleware(CreatorHandler::class);
});
