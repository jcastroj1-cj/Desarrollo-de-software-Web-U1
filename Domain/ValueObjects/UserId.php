<?php

class UserId {
    private int $value;

    public function __construct(int $value) {
        if ($value <= 0) {
            throw new InvalidArgumentException("El ID debe ser un número positivo.");
        }
        $this->value = $value;
    }

    public function value(): int {
        return $this->value;
    }

    public function __toString(): string {
        return (string) $this->value;
    }
}