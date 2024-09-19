<?php
$rotas = \Hefestos\Rotas\Roteador::instancia();
/* ----------------------------------------------------------------------
Cada rota deve ser respondida com o retorno de uma função, seja ela uma
função anonima ou um metodo de controller. Consulte a documentação.
---------------------------------------------------------------------- */

use App\Controllers\TarefasController;

$rotas->get('/', [TarefasController::class, 'index']);
$rotas->get('/tarefas', [TarefasController::class, 'index']);
$rotas->post('/tarefas', [TarefasController::class, 'store']);
$rotas->delete('/tarefas/{id}', [TarefasController::class, 'destroy']);