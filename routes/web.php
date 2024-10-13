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
    
    Route::resource('/creator', App\Http\Controllers\Creator\DeliveryOrderController::class)->middleware(CreatorHandler::class);
    Route::resource('delivery-orders', App\Http\Controllers\Creator\DeliveryOrderController::class)->middleware(CreatorHandler::class);
    Route::patch('delivery-orders/{delivery_order}/update-approval-status', [App\Http\Controllers\Creator\DeliveryOrderController::class, 'updateApprovalStatus'])->name('delivery-orders.updateApprovalStatus')->middleware(CreatorHandler::class);
    
    Route::get('/approver', [App\Http\Controllers\Approver\DeliveryOrderController::class, 'index'])->name('approver.index')->middleware(ApproverHandler::class);
    Route::patch('delivery-orders/{delivery_order}/approve', [App\Http\Controllers\Approver\DeliveryOrderController::class, 'approveDeliveryOrder'])->name('approver.approveDeliveryOrder')->middleware(ApproverHandler::class);
    Route::patch('delivery-orders/{delivery_order}/revise', [App\Http\Controllers\Approver\DeliveryOrderController::class, 'reviseDeliveryOrder'])->name('approver.reviseDeliveryOrder')->middleware(ApproverHandler::class);
    Route::patch('delivery-orders/{delivery_order}/reject', [App\Http\Controllers\Approver\DeliveryOrderController::class, 'rejectDeliveryOrder'])->name('approver.rejectDeliveryOrder')->middleware(ApproverHandler::class);

});
