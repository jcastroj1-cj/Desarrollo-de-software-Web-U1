<?php

class UserName {
    private string $value;

    public function __construct(string $value) {
        $value = trim($value);
        if (empty($value)) {
            throw new InvalidArgumentException("El nombre no puede estar vacío.");
        }
        if (strlen($value) > 100) {
            throw new InvalidArgumentException("El nombre no puede superar 100 caracteres.");
        }
        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }
}