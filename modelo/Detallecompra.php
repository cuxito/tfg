<?php

class Detallecompra{
    private $iddetalle;
    private $idcompra;
    private $idproducto;
    private $unidades;
    
    function __construct($iddetalle, $idcompra, $idproducto, $unidades) {
        $this->iddetalle = $iddetalle;
        $this->idcompra = $idcompra;
        $this->idproducto = $idproducto;
        $this->unidades = $unidades;
    }

    function getIddetalle() {
        return $this->iddetalle;
    }

    function getIdcompra() {
        return $this->idcompra;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getUnidades() {
        return $this->unidades;
    }

    function setIddetalle($iddetalle): void {
        $this->iddetalle = $iddetalle;
    }

    function setIdcompra($idcompra): void {
        $this->idcompra = $idcompra;
    }

    function setIdproducto($idproducto): void {
        $this->idproducto = $idproducto;
    }

    function setUnidades($unidades): void {
        $this->unidades = $unidades;
    }


}
