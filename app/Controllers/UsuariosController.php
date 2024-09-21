<?php

namespace App\Controllers;

use App\Models\Usuarios;
use Hefestos\Core\Controller;

class UsuariosController extends Controller
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuarios();
    }

    public function criarConta()
    {
        $usuario = $this->dadosPost();

        if (empty($usuario['nome']) || empty($usuario['email']) || empty($usuario['senha'])) {
            return redirecionar('/register')
                ->com('feedback', 'Preencha todos os campos obrigatórios.');
        }

        $usuario_existe = $this->usuario->primeiroOnde(['email' => $usuario['email']], 'email');

        if (!$usuario_existe) {
            $usuario['senha'] = password_hash($usuario['senha'], PASSWORD_DEFAULT);
            $this->usuario->insert($usuario);

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['usuario_id'] = $this->usuario->idInserido();
            $_SESSION['usuario_email'] = $usuario['email'];

            return redirecionar('/tarefas');
        }

        return redirecionar('/register')
            ->com('feedback', 'Já existe um usuário com esse email');
    }

    public function login()
    {
        $usuario = $this->dadosPost();

        if (empty($usuario['email']) || empty($usuario['senha'])) {
            return redirecionar('/login')
                ->com('feedback', 'Preencha todos os campos obrigatórios.');
        }

        $usuario_existe = $this->usuario->primeiroOnde(['email' => $usuario['email']], 'email');

        if ($usuario_existe && password_verify($usuario['senha'], $usuario_existe['senha'])) {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['usuario_id'] = $usuario_existe['id'];
            $_SESSION['usuario_email'] = $usuario_existe['email'];

            return redirecionar('/tarefas');
        }

        return redirecionar('/login')
            ->com('feedback', 'Email ou/e senha incorretos');
    }

    public function logout()
    {
        session_destroy();
        return redirecionar('/login');
    }
}
