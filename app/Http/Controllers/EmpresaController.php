<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Models\Empresa;
use App\Models\Segmento;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function store(StoreEmpresaRequest $request)
    {
        $data = $request->validated();

        try {
            if (!empty($data['segmento_outro'])) {
                $segmento = Segmento::firstOrCreate(['nome' => $data['segmento_outro']]);
                $data['segmento_id'] = $segmento->id;
            }

            unset($data['segmento_outro']);

            $empresa = Empresa::create($data);


            return response()->json([
                'sucess' => true,
                'message' => 'Empresa cadastrada com sucesso!',
                'data' => $empresa
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao salvar a empresa no banco de dados.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Throwable $e) {
            return response()->json([
                'sucess' => false,
                'message' => 'Erro inesperado. Por favor, tente novamente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
