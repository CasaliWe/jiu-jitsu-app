<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model {
    protected $table = 'treino';
    protected $fillable = ['tipo_treino', 'aula_treino', 'hora_treino', 'dia_treino', 'data_treino', 'img_treino', 'observacoes_treino'];
    public $timestamps = false;
    protected $casts = ['observacoes_treino' => 'array',];
}