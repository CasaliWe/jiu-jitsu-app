<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Finalizacao extends Model {
    protected $table = 'finalizacoes';
    protected $fillable = ['nome', 'passo_a_passo', 'observacoes', 'posicao_id'];
    public $timestamps = false;
    protected $casts = ['passo_a_passo' => 'array', 'observacoes' => 'array'];

    public function posicoes()
    {
        return $this->belongsTo(Posicao::class, 'posicao_id');
    }
}