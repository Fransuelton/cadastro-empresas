<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Segmento extends Model
{

    protected $fillable = ['nome'];
    
    public function empresas(): HasMany
    {
        return $this->hasMany(Empresa::class);
    }
}
