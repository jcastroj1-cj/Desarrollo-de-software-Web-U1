<?php

class UserPersistenceDto {

    private int $id;
    private string $nombre;
    private string $clave;
    private string $rol;

    public function __construct(int $id, string $nombre, string $clave, string $rol) {
        $this->id = $id;
        $this->nombre = trim($nombre);
        $this->clave = trim($clave);
        $this->rol = trim($rol);
    }

    public function id(): int { return $this->id; }
    public function nombre(): string { return $this->nombre; }
    public function clave(): string { return $this->clave; }
    public function rol(): string { return $this->rol; }
}
