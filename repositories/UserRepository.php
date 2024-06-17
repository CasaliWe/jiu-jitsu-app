<?php
namespace Repositories;

require __DIR__ .'/../models/User.php';
use Models\User;

class UserRepository {
    public function getAllUsers() {
        // busca todos os usuários
        return User::all();
    }

    public function updateTokenUser($identificador, $valor) {
       // Atualizar o campo 'token' diretamente
       $userSuccess = User::where('identificador', $identificador)->update(['token' => $valor]);

       // Verificar se a atualização foi bem-sucedida
       if ($userSuccess) {
           return true;
       } else {
            return false;
       }

    }

    public function getUser($identificador) {
        // Busca um usuário pelo identificador
        $user = User::where('identificador', $identificador)->first();

        // Verifica se o usuário foi encontrado
        if($user){
            return $user;
        }else{
            return false;
        }
    }

    public function findByLogin($login) {
        // Busca um usuário pelo login
        $user = User::where('login', $login)->first();

        // Verifica se o usuário foi encontrado
        if($user){
            return $user;
        }else{
            return false;
        }
    }

    public function findByEmail($email) {
        // Busca um usuário pelo email
        $user = User::where('email', $email)->first();

        // Verifica se o usuário foi encontrado
        if($user){
            return $user;
        }else{
            return false;
        }
    }

    public function create($data) {
        // Cria um novo usuário
        $user = User::create($data);

        // Verifica se o usuário foi criado
        if($user){
            return $user;
        }else{
            return false;
        }
    }


    public function updateUserData($identificador, $nome, $sobrenome, $email, $faixa) {
        // Atualizar o campos diretamente
        $userSuccess = User::where('identificador', $identificador)->update(['nome' => $nome, 'sobrenome' => $sobrenome, 'email' => $email, 'faixa' => $faixa]);
       
        // Verificar se a atualização foi bem-sucedida
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
       
    }

    
    public function updateUserImage($identificador, $imagemPerfil) {
        // Atualizar o campo 'foto' diretamente
        $userSuccess = User::where('identificador', $identificador)->update(['foto' => $imagemPerfil]);
 
        // Verificar se a atualização foi bem-sucedida
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
 
     }


     public function updateUserPassword($identificador, $senha) {
        // Atualizar o campo 'senha' diretamente
        $userSuccess = User::where('identificador', $identificador)->update(['senha' => $senha]);
 
        // Verificar se a atualização foi bem-sucedida
        if ($userSuccess) {
            return true;
        } else {
             return false;
        }
 
     }

}