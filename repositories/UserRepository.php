<?php
namespace Repositories;

require __DIR__ .'/../models/User.php';
use Models\User;

class UserRepository {

    // busca todos os usuários
    public function getAllUsers() {
        return User::all();
    }

    // Atualizar o campo 'token' diretamente
    public function updateTokenUser($identificador, $valor) {
       $userSuccess = User::where('identificador', $identificador)->update(['token' => $valor]);

       if ($userSuccess) {
           return true;
       } else {
            return false;
       }

    }

    // Busca um usuário pelo identificador
    public function getUser($identificador) {
        $user = User::where('identificador', $identificador)->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Busca um usuário pelo login
    public function findByLogin($login) {
        $user = User::where('login', $login)->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Busca um usuário pelo email
    public function findByEmail($email) {
        $user = User::where('email', $email)->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Cria um novo usuário
    public function create($data) {
        $user = User::create($data);

        if($user){
            return $user;
        }else{
            return false;
        }
    }

    // Atualizar o campos diretamente
    public function updateUserData($identificador, $nome, $sobrenome, $email, $faixa) {
        $userSuccess = User::where('identificador', $identificador)->update(['nome' => $nome, 'sobrenome' => $sobrenome, 'email' => $email, 'faixa' => $faixa]);
 
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
       
    }

    // Atualizar o campo 'foto' diretamente
    public function updateUserImage($identificador, $imagemPerfil) {
        $userSuccess = User::where('identificador', $identificador)->update(['foto' => $imagemPerfil]);
 
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
 
     }

     // Atualizar o campo 'senha' diretamente
     public function updateUserPassword($identificador, $senha) {
        $userSuccess = User::where('identificador', $identificador)->update(['senha' => $senha]);
 
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
 
     }

}