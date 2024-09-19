<?php

use Hefestos\Database\Tabela;

return ( new Tabela('tarefas') )
    ->id()
    ->string('titulo')
    ->string('descricao')
    ->int('status');