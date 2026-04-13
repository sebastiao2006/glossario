<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RegularizacaoEmpresa extends Model
{
    
    protected $fillable = [
    'empresa_id',
    'user_id',
    'situacao',
    'observacao', // 👈 TEM que estar aqui
    'checklist',
    'documentos',
];

public function empresa()
{
    return $this->belongsTo(Empresa::class);
}
}
