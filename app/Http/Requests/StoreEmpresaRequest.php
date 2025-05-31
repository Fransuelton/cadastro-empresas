<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string',
            'cep' => 'required|string|size:8',
            'rua' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'estado' => 'required|string',
            'whatsapp' => 'required|string',
            'documento' => ['required', 'string', new \App\Rules\CpfOuCnpj],
            'segmento_id' => 'nullable|exists:segmentos,id',
            'novo_segmento' => 'nullable|string|max:255',
        ];
    }
}
