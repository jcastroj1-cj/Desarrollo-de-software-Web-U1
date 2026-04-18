<?php

class CreateCelularCommand {
    public string $marca;
    public string $imei;
    public float $pulgadas;
    public float $megapixeles;
    public int $ram;
    public int $almacenamientoPrincipal;
    public int $almacenamientoSecundario;
    public string $sistemaOperativo;
    public string $operador;
    public string $tecnologiaBanda;
    public int $wifi;
    public int $bluetooth;
    public int $camaras;
    public string $marcaCpu;
    public float $velocidadCpu;
    public int $nfc;
    public int $huella;
    public int $ir;
    public int $resisteAgua;
    public int $cantidadSim;

    public function __construct(
        string $marca,
        string $imei,
        float $pulgadas,
        float $megapixeles,
        int $ram,
        int $almacenamientoPrincipal,
        int $almacenamientoSecundario,
        string $sistemaOperativo,
        string $operador,
        string $tecnologiaBanda,
        int $wifi,
        int $bluetooth,
        int $camaras,
        string $marcaCpu,
        float $velocidadCpu,
        int $nfc,
        int $huella,
        int $ir,
        int $resisteAgua,
        int $cantidadSim
    ) {
        $this->marca = $marca;
        $this->imei = $imei;
        $this->pulgadas = $pulgadas;
        $this->megapixeles = $megapixeles;
        $this->ram = $ram;
        $this->almacenamientoPrincipal = $almacenamientoPrincipal;
        $this->almacenamientoSecundario = $almacenamientoSecundario;
        $this->sistemaOperativo = $sistemaOperativo;
        $this->operador = $operador;
        $this->tecnologiaBanda = $tecnologiaBanda;
        $this->wifi = $wifi;
        $this->bluetooth = $bluetooth;
        $this->camaras = $camaras;
        $this->marcaCpu = $marcaCpu;
        $this->velocidadCpu = $velocidadCpu;
        $this->nfc = $nfc;
        $this->huella = $huella;
        $this->ir = $ir;
        $this->resisteAgua = $resisteAgua;
        $this->cantidadSim = $cantidadSim;
    }
}