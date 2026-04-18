<?php

class UserClave {
    private string $hash;

    private function __construct(string $hash) {
        $this->hash = $hash;
    }

    // Cuando se registra un usuario nuevo (texto plano → bcrypt)
    public static function fromPlainText(string $plain): self {
        if (empty(trim($plain))) {
            throw new InvalidArgumentException("La clave no puede estar vacía.");
        }
        return new self(password_hash($plain, PASSWORD_BCRYPT));
    }

    // Cuando se carga desde la BD (ya es un hash)
    public static function fromHash(string $hash): self {
        return new self($hash);
    }

    // Verificar contraseña en login
    public function verifyPlain(string $plain): bool {
        return password_verify($plain, $this->hash);
    }

    // Retorna el hash para guardarlo en BD
    public function value(): string {
        return $this->hash;
    }
}