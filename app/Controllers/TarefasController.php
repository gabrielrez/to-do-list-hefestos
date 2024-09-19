<?php

namespace App\Controllers;

use App\Models\Tarefas;
use Hefestos\Core\Controller;

class TarefasController extends Controller
{
    private $tarefas_model;

    public function __construct()
    {
        $this->tarefas_model = new Tarefas();
    }

    public function index()
    {
        $tarefas = $this->tarefas_model->todos();
        
        return view('tarefas_home', [
            'tarefas' => $tarefas
        ]);
    }

    public function store(){
        $tarefa = $this->dadosPost();
        $this->tarefas_model->insert($tarefa);
        return redirecionar('/tarefas');
    }

    public function destroy($id){
        $this->tarefas_model->delete($id);
        return redirecionar('/tarefas');
    }
}