<?php

class UserRol {
    private const VALID_ROLES = ['admin', 'usuario', 'asp'];
    private string $value;

    public function __construct(string $value) {
        $value = trim($value);
        if (!in_array($value, self::VALID_ROLES, true)) {
            throw new InvalidArgumentException("Rol inválido: '$value'. Roles válidos: " . implode(', ', self::VALID_ROLES));
        }
        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }
}