<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Segmento;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cep' => 'required|string|max:20',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:50',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'numero_whatsapp' => 'required|string|max:20',
            'cnpj_cpf' => 'required|string|max:20',
            'segmento_id' => 'nullable|exists:segmentos,id',
            'segmento_outro' => 'nullable|string|max:255',
        ]);

        if (!empty($data['segmento_outro'])) {
        $segmento = Segmento::firstOrCreate(['nome' => $data['segmento_outro']]);
        $data['segmento_id'] = $segmento->id;
    }

    $empresa = Empresa::create($data);

    return response()->json(['message' => 'Empresa cadastrada com sucesso!', 'empresa' => $empresa], 201);
    }
}
