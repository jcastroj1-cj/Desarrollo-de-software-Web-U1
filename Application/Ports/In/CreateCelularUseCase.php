<?php
interface CreateCelularUseCase {
    public function execute(CreateCelularCommand $command): CelularModel;
}
