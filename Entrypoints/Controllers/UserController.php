<?php

class UserController {

    private $service;
    private $repo;

    public function __construct($service = null, $repo = null) {
        $this->service = $service;
        $this->repo = $repo;
    }

    public function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin') {
            View::redirect('celular.index');
        }
        $users = $this->repo->findAll();
        View::render('User/index', ['users' => $users]);
    }

    public function bienvenida() {
        View::render('User/bienvenida');
    }

    public function create() {
        View::render('User/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            View::redirect('user.loginForm');
        }
        try {
            $command = new CreateUserCommand(
                (int) $_POST['id'],
                $_POST['clave'],
                $_POST['nombre'],
                $_POST['rol'],
                $_POST['codigo_admin'] ?? ''
            );
            $this->service->execute($command);
            FlashMessage::set('success', 'Usuario registrado correctamente.');
        } catch (Exception $e) {
            FlashMessage::set('error', 'Error al registrar: ' . $e->getMessage());
        }
        View::redirect('user.bienvenida');
    }

    public function loginForm() {
        View::render('User/login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            View::redirect('user.loginForm');
        }
        $id = (int) $_POST['id'];
        $clave = $_POST['clave'];

        $user = $this->repo->findById($id);

        if ($user && $user->clave()->verifyPlain($clave)) {
            $_SESSION['user'] = [
                'id' => $user->id()->value(),
                'nombre' => $user->nombre()->value(),
                'rol' => $user->rol()->value()
            ];
            View::redirect('celular.index');
        } else {
            FlashMessage::set('error', 'ID o clave incorrectos.');
            View::redirect('user.loginForm');
        }
    }

    public function logout() {
        session_destroy();
        View::redirect('user.loginForm');
    }

    public function promote() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin') {
            View::redirect('celular.index');
        }
        try {
            $id = (int) $_GET['id'];
            $this->repo->promoteToAdmin($id);
            FlashMessage::set('success', 'Usuario promovido a admin correctamente.');
        } catch (Exception $e) {
            FlashMessage::set('error', 'Error al promover usuario: ' . $e->getMessage());
        }
        View::redirect('user.index');
    }

    public function destroy() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin') {
            View::redirect('celular.index');
        }
        try {
            $id = (int) $_GET['id'];
            $this->repo->delete($id);
            FlashMessage::set('success', 'Usuario eliminado correctamente.');
        } catch (Exception $e) {
            FlashMessage::set('error', 'Error al eliminar usuario: ' . $e->getMessage());
        }
        View::redirect('user.index');
    }
}