<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
require_once __DIR__ .'/../models/Posicao.php';

class Categoria extends Model {
    protected $table = 'categorias';
    protected $fillable = ['nome', 'user_identificador', 'user_id'];
    public $timestamps = false;

    public function treinos()
    {
        return $this->belongsTo(Treino::class, 'treino_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_login');
    }

    public function posicoes()
    {
        return $this->hasMany(Posicao::class, 'categoria_id', 'id');
    }
}