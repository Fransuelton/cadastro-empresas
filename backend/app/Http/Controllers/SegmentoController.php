<?php

namespace App\Http\Controllers;

use App\Models\Segmento;
use Illuminate\Http\JsonResponse;

class SegmentoController extends Controller
{
    public function index(): JsonResponse
    {
        $segmentos = Segmento::all();
        return response()->json($segmentos);
    }
}
