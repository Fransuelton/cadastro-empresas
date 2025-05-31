<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SegmentoController;

Route::get('/segmentos', [SegmentoController::class, 'index']);
