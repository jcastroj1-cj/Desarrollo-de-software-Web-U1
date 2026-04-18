<?php

class CelularModel {
    public $id;
    public $marca;
    public $imei;
    public $pulgadas;
    public $megapixeles;
    public $ram;
    public $almacenamientoPrincipal;
    public $almacenamientoSecundario;
    public $sistemaOperativo;
    public $operador;
    public $tecnologiaBanda;
    public $wifi;
    public $bluetooth;
    public $camaras;
    public $marcaCpu;
    public $velocidadCpu;
    public $nfc;
    public $huella;
    public $ir;
    public $resisteAgua;
    public $cantidadSim;

    public function __construct($id, $marca, $imei, $pulgadas, $megapixeles, $ram,
        $almacenamientoPrincipal, $almacenamientoSecundario, $sistemaOperativo,
        $operador, $tecnologiaBanda, $wifi, $bluetooth, $camaras, $marcaCpu,
        $velocidadCpu, $nfc, $huella, $ir, $resisteAgua, $cantidadSim) {

        $this->id = $id;
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