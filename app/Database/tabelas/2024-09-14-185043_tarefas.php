<?php

use Hefestos\Database\Tabela;

return ( new Tabela('tarefas') )
    ->id()
    ->string('titulo')
    ->string('descricao')
    ->int('status')
    ->int('usuario_id')
    ->foreignKey('usuario_id', 'usuarios', 'id');