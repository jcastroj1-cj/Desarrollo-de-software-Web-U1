<?php

require_once __DIR__ . '/../ValueObjects/UserId.php';
require_once __DIR__ . '/../ValueObjects/UserName.php';
require_once __DIR__ . '/../ValueObjects/UserClave.php';
require_once __DIR__ . '/../ValueObjects/UserRol.php';

class UserModel {
    private UserId $id;
    private UserName $nombre;
    private UserClave $clave;
    private UserRol $rol;

    public function __construct(UserId $id, UserName $nombre, UserClave $clave, UserRol $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->rol = $rol;
    }

    public function id(): UserId { return $this->id; }
    public function nombre(): UserName { return $this->nombre; }
    public function clave(): UserClave { return $this->clave; }
    public function rol(): UserRol { return $this->rol; }
}