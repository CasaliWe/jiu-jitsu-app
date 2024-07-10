<?php
namespace Repositories;

use Models\Evento;

class EventoRepository {
    
    // busca todos os eventos
    public static function getAllEventos() {
        try {
            return Evento::all();
        } catch (\Exception  $e) {
            error_log('Erro ao buscar todos os eventos: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

    // criar vários eventos ao mesmo tempo 
    public static function createEvento($evento) {
        try {
            return Evento::create($evento);
        } catch (\Exception  $e) {
            error_log('Erro ao criar varios eventos: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
        }

    // limpar tabela
    public static function resetEventos() {
        try {
            return Evento::truncate();
        } catch (\Exception  $e) {
            error_log('Erro ao limpar tabela de eventos: ' . $e, 3, __DIR__ . '/../error.log');
            return false;
        }
    }

}