<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Empresa extends Model
{
    public function segmentos(): BelongsTo
    {
        return $this->belongsTo(Segmento::class);
    }
}
