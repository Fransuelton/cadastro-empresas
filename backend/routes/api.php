<?php

use App\Http\Controllers\SegmentoController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::get('/segmentos', [SegmentoController::class, 'index']);

Route::post('/empresas', [EmpresaController::class, 'store']);
