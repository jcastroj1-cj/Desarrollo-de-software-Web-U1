<?php

class ClassLoader {

    private static array $classMap = [
        // Domain - Models    // Common
    'FlashMessage'              => 'Common/FlashMessage.php',

    // Domain - Models
    'UserModel'                 => 'Domain/Models/UserModel.php',
    'CelularModel'              => 'Domain/Models/CelularModel.php',

    // Domain - ValueObjects
    'UserId'                    => 'Domain/ValueObjects/UserId.php',
    'UserName'                  => 'Domain/ValueObjects/UserName.php',
    'UserClave'                 => 'Domain/ValueObjects/UserClave.php',
    'UserRol'                   => 'Domain/ValueObjects/UserRol.php',

    // Application - Ports In
    'CreateUserUseCase'         => 'Application/Ports/In/CreateUserUseCase.php',
    'CreateCelularUseCase'      => 'Application/Ports/In/CreateCelularUseCase.php',

    // Application - Ports Out
    'UserRepositoryPort'        => 'Application/Ports/Out/UserRepositoryPort.php',
    'CelularRepositoryPort'     => 'Application/Ports/Out/CelularRepositoryPort.php',

    // Application - DTOs
    'CreateUserCommand'         => 'Application/DTO/CreateUserCommand.php',
    'CreateCelularCommand'      => 'Application/DTO/CreateCelularCommand.php',

    // Application - UseCases
    'CreateUserService'         => 'Application/UseCases/CreateUserService.php',
    'CreateCelularService'      => 'Application/UseCases/CreateCelularService.php',

    // Infrastructure - Config
    'Connection'                => 'Infrastructure/Config/Connection.php',

    // Infrastructure - Persistence (User)
    'UserPersistenceDto'        => 'Infrastructure/Percistence/UserPersistenceDto.php',
    'UserEntity'                => 'Infrastructure/Percistence/UserEntity.php',
    'UserPersistenceMapper'     => 'Infrastructure/Percistence/UserPersistenceMapper.php',

    // Infrastructure - Persistence (Celular)
    'CelularPersistenceDto'     => 'Infrastructure/Persistence/CelularPersistenceDto.php',
    'CelularEntity'             => 'Infrastructure/Persistence/CelularEntity.php',
    'CelularPersistenceMapper'  => 'Infrastructure/Persistence/CelularPersistenceMapper.php',

    // Infrastructure - Repositories
    'UserRepositoryMySQL'       => 'Infrastructure/Repositories/UserRepositoryMySQL.php',
    'CelularRepositoryMySQL'    => 'Infrastructure/Repositories/CelularRepositoryMySQL.php',

    // Entrypoints - Controllers
    'UserController'            => 'Entrypoints/Controllers/UserController.php',
    'CelularController'         => 'Entrypoints/Controllers/CelularController.php',

    'UserClave' => 'Domain/ValueObjects/UserClave.php',
    
    'View' => 'Common/View.php',
];

    public static function register(): void {
        spl_autoload_register([self::class, 'loadClass']);
    }

    public static function loadClass(string $className): void {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                "No se encontró el archivo para la clase $className en $filePath"
            );
        }

        require_once $filePath;
    }
}