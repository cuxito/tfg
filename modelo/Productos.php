<?php

class Productos{
    
    private $idproducto;
    private $nombre_prod;
    private $cantidad_prod;
    private $stock;
    private $PVP;
    private $descuento;
    private $imagen;
    
    
    
    function __construct($idproducto, $nombre_prod, $cantidad_prod, $stock 
            , $PVP, $descuento, $imagen) {
        $this->idproducto = $idproducto;
        $this->nombre_prod = $nombre_prod;
        $this->cantidad_prod = $cantidad_prod;
        $this->stock = $stock;
        $this->PVP = $PVP;
        $this->descuento = $descuento;
        $this->imagen = $imagen;
    }
    
    function getIdproducto() {
        return $this->idproducto;
    }

    function getNombre_prod() {
        return $this->nombre_prod;
    }

    function getCantidad_prod() {
        return $this->cantidad_prod;
    }

    function getStock() {
        return $this->stock;
    }

    function getPVP() {
        return $this->PVP;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setIdproducto($idproducto): void {
        $this->idproducto = $idproducto;
    }

    function setNombre_prod($nombre_prod): void {
        $this->nombre_prod = $nombre_prod;
    }

    function setCantidad_prod($cantidad_prod): void {
        $this->cantidad_prod = $cantidad_prod;
    }

    function setStock($stock): void {
        $this->stock = $stock;
    }

    function setPVP($PVP): void {
        $this->PVP = $PVP;
    }

    function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }


}

