<?php
interface CelularRepositoryPort {
    public function save(CelularModel $celular): CelularModel;
    public function findAll(): array;
}
