<?php

namespace Repositories;

use Models\User;

class UserRepository {

    // busca todos os usuários
    public static function getAllUsers() {
        try {
            return User::all();
        } catch (\Exception  $e) {
            error_log('Erro ao buscar todos os usuários: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

    // Busca um usuário pelo identificador
    public static function getUser($identificador) {
        try {
            $user = User::with(['treinos' => function($query) {
                $query->orderBy('created_at', 'desc');
            }, 'treinos.categorias.posicoes.finalizacoes'])->where('identificador', $identificador)->first();
    
            if($user){
                return $user;
            }else{
                return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao buscar usuário pelo identificador: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

    // Atualizar o campo 'token' diretamente
    public static function updateTokenUser($identificador, $valor) {
       try {
            $userSuccess = User::where('identificador', $identificador)->update(['token' => $valor]);

            if ($userSuccess) {
                return true;
            } else {
                return false;
            }
       } catch (\Exception  $e) {
            error_log('Erro ao atualizar o token: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
       }

    }

    // Busca um usuário pelo login
    public static function findByLogin($login) {
        try {
            $user = User::where('login', $login)->first();

            if($user){
                return $user;
            }else{
                return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao buscar o usúario pelo login: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

    // Busca um usuário pelo email
    public static function findByEmail($email) {
        try {
            $user = User::where('email', $email)->first();

            if($user){
                return $user;
            }else{
                return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao buscar o usúario pelo email: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

    // Cria um novo usuário
    public static function create($data) {
        try {
            $user = User::create($data);

            if($user){
                return $user;
            }else{
                return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao criar um novo usúario: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

    // Atualizar o campos diretamente
    public static function updateUserData($identificador, $nome, $sobrenome, $email, $faixa, $academia) {
        try {
            $userSuccess = User::where('identificador', $identificador)->update(['nome' => $nome, 'sobrenome' => $sobrenome, 'email' => $email, 'faixa' => $faixa, 'academia' => $academia]);
 
            if ($userSuccess) {
                return true;
            } else {
                 return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao atualizar dados do usúario: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        } 
    }

    // Atualizar o campo 'foto' diretamente
    public static function updateUserImage($identificador, $imagemPerfil) {
        try {
            $userSuccess = User::where('identificador', $identificador)->update(['foto' => $imagemPerfil]);
 
            if ($userSuccess) {
                return true;
            } else {
                 return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao atualizar o campo foto: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        } 
     }

    // Atualizar o campo 'senha' diretamente
    public static function updateUserPassword($identificador, $senha) {
        try {
            $userSuccess = User::where('identificador', $identificador)->update(['senha' => $senha]);
 
            if ($userSuccess) {
                return true;
            } else {
                 return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao atualizar a senha: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }


    // Atualizar o campo 'senha' diretamente
    public static function updatePasswordUser($id, $senha) {
        try {
            $userSuccess = User::where('identificador', $id)->update(['senha' => $senha]);
 
            if ($userSuccess) {
                return true;
            } else {
                 return false;
            }
        } catch (\Exception  $e) {
            error_log('Erro ao atualizar a senha: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

}