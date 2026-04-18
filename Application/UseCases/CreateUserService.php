<?php

class CreateUserService implements CreateUserUseCase {

    private UserRepositoryPort $repository;
    private const CODIGO_ADMIN = 'jc';

    public function __construct(UserRepositoryPort $repository) {
        $this->repository = $repository;
    }

    public function execute(CreateUserCommand $command): UserModel {
        $rol = 'usuario';
        if ($command->rol === 'admin' && $command->codigoAdmin === self::CODIGO_ADMIN) {
            $rol = 'admin';
        }

        $user = new UserModel(
            new UserId($command->id),
            new UserName($command->nombre),
            UserClave::fromPlainText($command->clave), // bcrypt aquí
            new UserRol($rol)
        );

        return $this->repository->save($user);
    }
}