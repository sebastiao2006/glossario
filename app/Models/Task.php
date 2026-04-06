<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'empresa_id',
        'titulo',
        'descricao',
        'data_inicio',
        'data_fim',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }



public function getPrazoFormatadoAttribute()
{
    if (!$this->data_fim) {
        return [
            'texto' => 'Sem prazo',
            'classe' => 'bg-secondary'
        ];
    }

    $hoje = Carbon::now();
    $fim = Carbon::parse($this->data_fim);
    $dias = $hoje->diffInDays($fim, false);

    if ($dias > 0) {
        return [
            'texto' => "Expira em {$dias} dias",
            'classe' => 'bg-success'
        ];
    } elseif ($dias == 0) {
        return [
            'texto' => "Expira hoje",
            'classe' => 'bg-warning text-dark'
        ];
    } else {
        return [
            'texto' => "Expirou há " . abs($dias) . " dias",
            'classe' => 'bg-danger'
        ];
    }
}

public function getStatusFormatadoAttribute()
{
    switch (strtolower($this->status)) {
        case 'concluida':
        case 'concluída':
            return [
                'texto' => 'Concluída',
                'classe' => 'bg-success'
            ];

        case 'em andamento':
            return [
                'texto' => 'Em andamento',
                'classe' => 'bg-primary'
            ];

        case 'pendente':
            return [
                'texto' => 'Pendente',
                'classe' => 'bg-warning text-dark'
            ];

        case 'atrasada':
            return [
                'texto' => 'Atrasada',
                'classe' => 'bg-danger'
            ];

        default:
            return [
                'texto' => ucfirst($this->status),
                'classe' => 'bg-secondary'
            ];
    }
}
}