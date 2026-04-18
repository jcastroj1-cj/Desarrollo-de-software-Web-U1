<?php

require_once __DIR__ . '/ClassLoader.php';

class DependencyInjection {

    public static function boot(): void {
        ClassLoader::register();
    }

    public static function getConnection(): Connection {
        return new Connection(
            host: 'localhost',
            port: 3306,
            database: 'crud',
            username: 'root',
            password: '',
        );
    }

    public static function getPdo(): PDO {
        return self::getConnection()->createPdo();
    }

    // ===== USER =====
    public static function getUserRepository(): UserRepositoryMySQL {
        return new UserRepositoryMySQL(self::getPdo());
    }

    public static function getCreateUserService(): CreateUserService {
        return new CreateUserService(self::getUserRepository());
    }

    public static function getUserController(string $action = ''): UserController {
        if ($action === 'store') {
            return new UserController(self::getCreateUserService(), null);
        }
        return new UserController(null, self::getUserRepository());
    }

    // ===== CELULAR =====
    public static function getCelularRepository(): CelularRepositoryMySQL {
        return new CelularRepositoryMySQL(self::getPdo());
    }

    public static function getCreateCelularService(): CreateCelularService {
        return new CreateCelularService(self::getCelularRepository());
    }

    public static function getCelularController(string $action = ''): CelularController {
        if ($action === 'store') {
            return new CelularController(self::getCreateCelularService(), null);
        }
        return new CelularController(null, self::getCelularRepository());
    }
}