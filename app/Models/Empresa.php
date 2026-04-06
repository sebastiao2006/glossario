<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
    'nome',
    'nif',
    'telefone',
    'localizacao',
    'senha_portal',
    'user_id' // 👈 IMPORTANTE
];
public function tasks()
{
    return $this->hasMany(Task::class);
}

/* public function users()
{
    return $this->belongsToMany(User::class);
} */
/* public function user()
{
    return $this->belongsTo(User::class)->withDefault([
        'name' => 'Não atribuído'
    ]);
} */



public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
