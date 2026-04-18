<?php

class View {
    public static function render(string $template, array $data = []): void {
        extract($data);
        $path = __DIR__ . '/../Views/' . $template . '.php';
        if (!file_exists($path)) {
            throw new RuntimeException("Vista no encontrada: $path");
        }
        require $path;
    }

    public static function redirect(string $route): void {
        header("Location: ?route=$route");
        exit;
    }
}