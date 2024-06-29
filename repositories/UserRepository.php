<?php

namespace Repositories;

use Models\User;

class UserRepository {

    // busca todos os usuários
    public static function getAllUsers() {
        return User::all();
    }

    // Busca um usuário pelo identificador
    public static function getUser($identificador) {
        $user = User::with(['treinos' => function($query) {
            $query->orderBy('created_at', 'desc');
        }, 'treinos.categorias.posicoes.finalizacoes'])->where('identificador', $identificador)->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Atualizar o campo 'token' diretamente
    public static function updateTokenUser($identificador, $valor) {
       $userSuccess = User::where('identificador', $identificador)->update(['token' => $valor]);

       if ($userSuccess) {
           return true;
       } else {
            return false;
       }

    }

    // Busca um usuário pelo login
    public static function findByLogin($login) {
        $user = User::where('login', $login)->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Busca um usuário pelo email
    public static function findByEmail($email) {
        $user = User::where('email', $email)->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Cria um novo usuário
    public static function create($data) {
        $user = User::create($data);

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Atualizar o campos diretamente
    public static function updateUserData($identificador, $nome, $sobrenome, $email, $faixa) {
        $userSuccess = User::where('identificador', $identificador)->update(['nome' => $nome, 'sobrenome' => $sobrenome, 'email' => $email, 'faixa' => $faixa]);
 
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
       
    }

    // Atualizar o campo 'foto' diretamente
    public static function updateUserImage($identificador, $imagemPerfil) {
        $userSuccess = User::where('identificador', $identificador)->update(['foto' => $imagemPerfil]);
 
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
 
     }

     // Atualizar o campo 'senha' diretamente
     public static function updateUserPassword($identificador, $senha) {
        $userSuccess = User::where('identificador', $identificador)->update(['senha' => $senha]);
 
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
 
     }

}