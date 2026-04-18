<?php

require_once __DIR__ . '/../Persistence/UserPersistenceMapper.php';

class UserRepositoryMySQL implements UserRepositoryPort {

    private $pdo;
    private UserPersistenceMapper $mapper;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->mapper = new UserPersistenceMapper();
    }

    public function save(UserModel $user): UserModel {
        $dto = $this->mapper->fromModelToDto($user);

        $sql = "INSERT INTO usuario (id, clave, nombre, rol) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dto->id(),
            $dto->clave(),
            $dto->nombre(),
            $dto->rol()
        ]);

        return $user;
    }

    public function findAll(): array {
        $rows = $this->pdo->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_ASSOC);
        return $this->mapper->fromRowsToModels($rows);
    }

    public function findById($id): ?UserModel {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            return null;
        }

        return $this->mapper->fromRowToModel($row);
    }

    public function update(UserModel $user): void {
        $dto = $this->mapper->fromModelToDto($user);

        $stmt = $this->pdo->prepare("UPDATE usuario SET clave=?, nombre=?, rol=? WHERE id=?");
        $stmt->execute([
            $dto->clave(),
            $dto->nombre(),
            $dto->rol(),
            $dto->id()
        ]);
    }

    public function delete($id): void {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id=?");
        $stmt->execute([$id]);
    }

    public function promoteToAdmin(int $id): void {
        $stmt = $this->pdo->prepare("UPDATE usuario SET rol = 'admin' WHERE id = ?");
        $stmt->execute([$id]);
    }
}