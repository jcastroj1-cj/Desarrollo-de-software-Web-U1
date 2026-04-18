<?php

require_once __DIR__ . '/../Persistence/CelularPersistenceMapper.php';

class CelularRepositoryMySQL implements CelularRepositoryPort {

    private $pdo;
    private CelularPersistenceMapper $mapper;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->mapper = new CelularPersistenceMapper();
    }

    public function save(CelularModel $celular): CelularModel {
        $sql = "INSERT INTO celular (marca, imei, pulgadas, megapixeles, ram,
                almacenamientoPrincipal, almacenamientoSecundario, sistemaOperativo,
                operador, tecnologiaBanda, wifi, bluetooth, camaras, marcaCpu,
                velocidadCpu, nfc, huella, ir, resisteAgua, cantidadSim)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $dto = $this->mapper->fromModelToDto($celular);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dto->marca,
            $dto->imei,
            $dto->pulgadas,
            $dto->megapixeles,
            $dto->ram,
            $dto->almacenamientoPrincipal,
            $dto->almacenamientoSecundario,
            $dto->sistemaOperativo,
            $dto->operador,
            $dto->tecnologiaBanda,
            $dto->wifi,
            $dto->bluetooth,
            $dto->camaras,
            $dto->marcaCpu,
            $dto->velocidadCpu,
            $dto->nfc,
            $dto->huella,
            $dto->ir,
            $dto->resisteAgua,
            $dto->cantidadSim
        ]);

        return $celular;
    }

    public function findAll(): array {
        $rows = $this->pdo->query("SELECT * FROM celular")->fetchAll(PDO::FETCH_ASSOC);
        return $this->mapper->fromRowsToModels($rows);
    }

    public function findById($id): ?CelularModel {
        $stmt = $this->pdo->prepare("SELECT * FROM celular WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->mapper->fromRowToModel($row) : null;
    }

    public function update(CelularModel $celular) {
        $sql = "UPDATE celular SET marca=?, imei=?, pulgadas=?, megapixeles=?, ram=?,
                almacenamientoPrincipal=?, almacenamientoSecundario=?, sistemaOperativo=?,
                operador=?, tecnologiaBanda=?, wifi=?, bluetooth=?, camaras=?, marcaCpu=?,
                velocidadCpu=?, nfc=?, huella=?, ir=?, resisteAgua=?, cantidadSim=?
                WHERE id=?";

        $dto = $this->mapper->fromModelToDto($celular);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dto->marca,
            $dto->imei,
            $dto->pulgadas,
            $dto->megapixeles,
            $dto->ram,
            $dto->almacenamientoPrincipal,
            $dto->almacenamientoSecundario,
            $dto->sistemaOperativo,
            $dto->operador,
            $dto->tecnologiaBanda,
            $dto->wifi,
            $dto->bluetooth,
            $dto->camaras,
            $dto->marcaCpu,
            $dto->velocidadCpu,
            $dto->nfc,
            $dto->huella,
            $dto->ir,
            $dto->resisteAgua,
            $dto->cantidadSim,
            $dto->id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM celular WHERE id=?");
        $stmt->execute([$id]);
    }
}