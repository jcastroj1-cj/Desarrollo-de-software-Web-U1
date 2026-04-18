<?php

class CreateUserCommand {
    public $id;
    public $clave;
    public $nombre;
    public $rol;
    public $codigoAdmin;

    public function __construct($id, $clave, $nombre, $rol, $codigoAdmin = '') {
        $this->id = $id;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->rol = $rol;
        $this->codigoAdmin = $codigoAdmin;
    }
}