<?php

require_once __DIR__ . '/CelularPersistenceDto.php';
require_once __DIR__ . '/CelularEntity.php';
require_once __DIR__ . '/../../Domain/Models/CelularModel.php';

class CelularPersistenceMapper {

    public function fromModelToDto(CelularModel $celular): CelularPersistenceDto {
        return new CelularPersistenceDto(
            $celular->id,
            $celular->marca,
            $celular->imei,
            $celular->pulgadas,
            $celular->megapixeles,
            $celular->ram,
            $celular->almacenamientoPrincipal,
            $celular->almacenamientoSecundario,
            $celular->sistemaOperativo,
            $celular->operador,
            $celular->tecnologiaBanda,
            $celular->wifi,
            $celular->bluetooth,
            $celular->camaras,
            $celular->marcaCpu,
            $celular->velocidadCpu,
            $celular->nfc,
            $celular->huella,
            $celular->ir,
            $celular->resisteAgua,
            $celular->cantidadSim
        );
    }

    public function fromRowToEntity(array $row): CelularEntity {
        return new CelularEntity(
            (int)    $row['id'],
            (string) $row['marca'],
            (string) $row['imei'],
            (float)  $row['pulgadas'],
            (float)  $row['megapixeles'],
            (int)    $row['ram'],
            (int)    $row['almacenamientoPrincipal'],
            (int)    $row['almacenamientoSecundario'],
            (string) $row['sistemaOperativo'],
            (string) $row['operador'],
            (string) $row['tecnologiaBanda'],
            (int)    $row['wifi'],
            (int)    $row['bluetooth'],
            (int)    $row['camaras'],
            (string) $row['marcaCpu'],
            (float)  $row['velocidadCpu'],
            (int)    $row['nfc'],
            (int)    $row['huella'],
            (int)    $row['ir'],
            (int)    $row['resisteAgua'],
            (int)    $row['cantidadSim']
        );
    }

    public function fromEntityToModel(CelularEntity $entity): CelularModel {
        return new CelularModel(
            $entity->id,
            $entity->marca,
            $entity->imei,
            $entity->pulgadas,
            $entity->megapixeles,
            $entity->ram,
            $entity->almacenamientoPrincipal,
            $entity->almacenamientoSecundario,
            $entity->sistemaOperativo,
            $entity->operador,
            $entity->tecnologiaBanda,
            $entity->wifi,
            $entity->bluetooth,
            $entity->camaras,
            $entity->marcaCpu,
            $entity->velocidadCpu,
            $entity->nfc,
            $entity->huella,
            $entity->ir,
            $entity->resisteAgua,
            $entity->cantidadSim
        );
    }

    public function fromRowToModel(array $row): CelularModel {
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