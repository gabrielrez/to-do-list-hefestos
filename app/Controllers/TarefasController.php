<?php

namespace App\Controllers;

use App\Models\Tarefas;
use App\Models\Usuarios;
use Hefestos\Core\Controller;

class TarefasController extends Controller
{
    private $tarefas_model;
    private $usuario_model;

    public function __construct()
    {
        $this->tarefas_model = new Tarefas();
        $this->usuario_model = new Usuarios();
    }

    public function index()
    {

        $tarefas = $this->tarefas_model->where(['usuario_id' => sessao('usuario_id')])->todos();
        $usuario = $this->usuario_model->primeiroOnde(['id' => sessao('usuario_id')], 'id');

        return view('tarefas_home', [
            'tarefas' => $tarefas,
            'usuario' => $usuario
        ]);
    }

    public function store()
    {
        $tarefa = $this->dadosPost();
        $this->tarefas_model->insert($tarefa);
        return redirecionar('/tarefas');
    }

    public function destroy($id)
    {
        $this->tarefas_model->delete($id);
        return redirecionar('/tarefas');
    }
}
