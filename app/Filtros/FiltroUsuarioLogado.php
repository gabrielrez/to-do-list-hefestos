<?php

namespace App\Filtros;

class FiltroUsuarioLogado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        $usuario_logado = true;

        if (!$usuario_logado) {
            redirecionar('/login')
                ->com('feedback', 'Você precisa estar logado para acessar as tarefas');
        }
    }
}
