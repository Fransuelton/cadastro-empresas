<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Empresa extends Model
{

    protected $fillable = [
        'nome',
        'cep',
        'rua',
        'numero',
        'bairro',
        'estado',
        'numero_whatsapp',
        'cnpj_cpf',
        'segmento_id'
    ];

    public function segmentos(): BelongsTo
    {
        return $this->belongsTo(Segmento::class);
    }
}
