<?php

namespace App\Filtros;

class FiltroUsuarioLogado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $usuario_logado = isset($_SESSION['usuario_id']);

        if (!$usuario_logado) {
            return redirecionar('/login')
                ->com('feedback', 'Você precisa estar logado para acessar essa página.');
        }
    }
}
