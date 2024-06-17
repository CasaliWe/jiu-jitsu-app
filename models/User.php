<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'user';
    protected $fillable = ['login', 'senha', 'token', 'identificador', 'nome', 'sobrenome', 'faixa', 'foto', 'email'];
    public $timestamps = false;
}