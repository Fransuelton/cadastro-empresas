<?php

namespace App\Http\Requests;

use App\Rules\CpfOuCnpj;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'cep' => 'required|string|size:8',
            'rua' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'estado' => 'required|string',
            'numero_whatsapp' => 'required|string',
            'cnpj_cpf' => ['required', 'string', new CpfOuCnpj],
            'segmento_id' => 'nullable|exists:segmentos,id',
            'segmento_outro' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
{
    return [
        'nome.required' => 'O nome da empresa é obrigatório.',
        'cep.required' => 'O CEP é obrigatório.',
        'cep.size' => 'O CEP deve ter exatamente 8 dígitos.',
        'rua.required' => 'A rua é obrigatória.',
        'numero.required' => 'O número é obrigatório.',
        'bairro.required' => 'O bairro é obrigatório.',
        'estado.required' => 'O estado é obrigatório.',
        'numero_whatsapp.required' => 'O número do WhatsApp é obrigatório.',
        'cnpj_cpf.required' => 'O CPF ou CNPJ é obrigatório.',
        'segmento_id.exists' => 'O segmento selecionado não é válido.',
        'segmento_outro.max' => 'O nome do novo segmento não pode ter mais de 255 caracteres.',
    ];
}

}
