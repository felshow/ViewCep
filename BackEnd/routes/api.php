<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepController;


Route::get('/cep/{cep}', [CepController::class, 'getCepData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
