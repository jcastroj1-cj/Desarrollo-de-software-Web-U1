<?php

require_once __DIR__ . '/UserPersistenceDto.php';
require_once __DIR__ . '/UserEntity.php';
require_once __DIR__ . '/../../Domain/Models/UserModel.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserId.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserName.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserClave.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserRol.php';

class UserPersistenceMapper {

    public function fromModelToDto(UserModel $user): UserPersistenceDto {
        return new UserPersistenceDto(
            $user->id()->value(),
            $user->nombre()->value(),
            $user->clave()->value(),
            $user->rol()->value()
        );
    }

    public function fromRowToEntity(array $row): UserEntity {
        return new UserEntity(
            (int)    $row['id'],
            (string) $row['nombre'],
            (string) $row['clave'],
            (string) $row['rol']
        );
    }

    public function fromEntityToModel(UserEntity $entity): UserModel {
        return new UserModel(
            new UserId($entity->id()),
            new UserName($entity->nombre()),
            UserClave::fromHash($entity->clave()), // carga hash desde BD
            new UserRol($entity->rol())
        );
    }

    public function fromRowToModel(array $row): UserModel {
        return $this->fromEntityToModel(
            $this->fromRowToEntity($row)
        );
    }

    public function fromRowsToModels(array $rows): array {
        $models = [];
        foreach ($rows as $row) {
            $models[] = $this->fromRowToModel($row);
        }
        return $models;
    }
}