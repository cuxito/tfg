<?php

class Compras{
    private $idcompra;
    private $idcliente;
    private $total;
    private $metodopago;
    private $fechacompra;
    
    function __construct($idcompra, $idcliente, $total, $metodopago, $fechacompra) {
        $this->idcompra = $idcompra;
        $this->idcliente = $idcliente;
        $this->total = $total;
        $this->metodopago = $metodopago;
        $this->fechacompra = $fechacompra;
    }
    
    function getIdcompra() {
        return $this->idcompra;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getTotal() {
        return $this->total;
    }

    function getMetodopago() {
        return $this->metodopago;
    }

    function getFechacompra() {
        return $this->fechacompra;
    }

    function setIdcompra($idcompra): void {
        $this->idcompra = $idcompra;
    }

    function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    function setTotal($total): void {
        $this->total = $total;
    }

    function setMetodopago($metodopago): void {
        $this->metodopago = $metodopago;
    }

    function setFechacompra($fechacompra): void {
        $this->fechacompra = $fechacompra;
    }



}

