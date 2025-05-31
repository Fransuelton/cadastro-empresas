<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Models\Empresa;
use App\Models\Segmento;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function store(StoreEmpresaRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['segmento_outro'])) {
        $segmento = Segmento::firstOrCreate(['nome' => $data['segmento_outro']]);
        $data['segmento_id'] = $segmento->id;
    }

    $empresa = Empresa::create($data);

    return response()->json(['message' => 'Empresa cadastrada com sucesso!', 'empresa' => $empresa], 201);
    }
}
