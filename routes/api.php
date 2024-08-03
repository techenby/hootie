<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('user/status', function (Request $request) {
    $data = $request->validate([
        'status' => 'required',
    ]);

    $request->user()->update(['status' => $data['status']]);
})->middleware('auth:sanctum');

Route::delete('user/status', function (Request $request) {
    $request->user()->update(['status' => null]);
})->middleware('auth:sanctum');
