<?php

class CreateCelularService implements CreateCelularUseCase {

    private CelularRepositoryPort $repository;

    public function __construct(CelularRepositoryPort $repository) {
        $this->repository = $repository;
    }

    public function execute(CreateCelularCommand $command): CelularModel {
        $celular = new CelularModel(
            null,
            $command->marca,
            $command->imei,
            $command->pulgadas,
            $command->megapixeles,
            $command->ram,
            $command->almacenamientoPrincipal,
            $command->almacenamientoSecundario,
            $command->sistemaOperativo,
            $command->operador,
            $command->tecnologiaBanda,
            $command->wifi,
            $command->bluetooth,
            $command->camaras,
            $command->marcaCpu,
            $command->velocidadCpu,
            $command->nfc,
            $command->huella,
            $command->ir,
            $command->resisteAgua,
            $command->cantidadSim
        );

        return $this->repository->save($celular);
    }
}