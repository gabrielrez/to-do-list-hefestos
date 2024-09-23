<?php

namespace App\Filtros;

class FiltroUsuarioLogado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        $usuario_logado = sessao('usuario_id'); // alias para sessao()->pegar('usuario_id')

        if (!$usuario_logado) {
            return redirecionar('/login')
                ->com('feedback', 'Você precisa estar logado para acessar essa página.');
        }
    }
}
