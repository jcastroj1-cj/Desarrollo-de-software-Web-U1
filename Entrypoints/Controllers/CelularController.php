<?php

class CelularController {

    private $createUseCase;
    private $repo;

    public function __construct($createUseCase = null, $repo = null) {
        $this->createUseCase = $createUseCase;
        $this->repo = $repo;
    }

    public function create() {
        View::render('celulares/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            View::redirect('celular.index');
        }

        try {
            $command = new CreateCelularCommand(
                (string) $_POST['marca'],
                (string) $_POST['imei'],
                (float)  $_POST['pulgadas'],
                (float)  $_POST['megapixeles'],
                (int)    $_POST['ram'],
                (int)    $_POST['almacenamientoPrincipal'],
                (int)    $_POST['almacenamientoSecundario'],
                (string) $_POST['sistemaOperativo'],
                (string) $_POST['operador'],
                (string) $_POST['tecnologiaBanda'],
                isset($_POST['wifi'])        ? 1 : 0,
                isset($_POST['bluetooth'])   ? 1 : 0,
                (int)    $_POST['camaras'],
                (string) $_POST['marcaCpu'],
                (float)  $_POST['velocidadCpu'],
                isset($_POST['nfc'])         ? 1 : 0,
                isset($_POST['huella'])      ? 1 : 0,
                isset($_POST['ir'])          ? 1 : 0,
                isset($_POST['resisteAgua']) ? 1 : 0,
                (int)    $_POST['cantidadSim']
            );

            $this->createUseCase->execute($command);
            FlashMessage::set('success', 'Celular creado correctamente.');
        } catch (Exception $e) {
            FlashMessage::set('error', 'Error al crear celular: ' . $e->getMessage());
        }

        View::redirect('celular.index');
    }

    public function index() {
        $celulares = $this->repo->findAll();
        View::render('celulares/index', ['celulares' => $celulares]);
    }

    public function delete() {
        try {
            $id = $_GET['id'];
            $this->repo->delete($id);
            FlashMessage::set('success', 'Celular eliminado correctamente.');
        } catch (Exception $e) {
            FlashMessage::set('error', 'Error al eliminar celular: ' . $e->getMessage());
        }

        View::redirect('celular.index');
    }
}