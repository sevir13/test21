<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix("upload")->group(function() {
    Route::post("sales", [\App\Http\Controllers\SaleController::class, "upload"]);
    Route::post("orders", [\App\Http\Controllers\OrderController::class, "upload"]);
    Route::post("stocks", [\App\Http\Controllers\StockController::class, "upload"]);
    Route::post("incomes", [\App\Http\Controllers\IncomeController::class, "upload"]);
});
