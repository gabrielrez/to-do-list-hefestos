<?php
$rotas = \Hefestos\Rotas\Roteador::instancia();
/* ----------------------------------------------------------------------
Cada rota deve ser respondida com o retorno de uma função, seja ela uma
função anonima ou um metodo de controller. Consulte a documentação.
---------------------------------------------------------------------- */

use App\Controllers\TarefasController;
use App\Controllers\UsuariosController;

$rotas->get('/register', function () {
    return view('register');
});
$rotas->get('/login', function () {
    return view('login');
});

$rotas->post('/login', [UsuariosController::class, 'login']);
$rotas->post('/logout', [UsuariosController::class, 'logout'])->filtro('logado');
$rotas->post('/register', [UsuariosController::class, 'criarConta']);

$rotas->get('/', [TarefasController::class, 'index'])->filtro('logado');
$rotas->get('/tarefas', [TarefasController::class, 'index'])->filtro('logado');
$rotas->post('/tarefas', [TarefasController::class, 'store'])->filtro('logado');
$rotas->delete('/tarefas/{id}', [TarefasController::class, 'destroy'])->filtro('logado');
