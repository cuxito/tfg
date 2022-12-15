<?php

class Proveedores{
    
    private $codproveedor;
    private $nombre;
    private $poblacion;
    private $telefono;
    private $categoria;
    
    function __construct($codproveedor, $nombre, $poblacion, $telefono, $categoria) {
        $this->codproveedor = $codproveedor;
        $this->nombre = $nombre;
        $this->poblacion = $poblacion;
        $this->telefono = $telefono;
        $this->categoria = $categoria;
    }

    function getCodproveedor() {
        return $this->codproveedor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPoblacion() {
        return $this->poblacion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setCodproveedor($codproveedor): void {
        $this->codproveedor = $codproveedor;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setPoblacion($poblacion): void {
        $this->poblacion = $poblacion;
    }

    function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    function setCategoria($categoria): void {
        $this->categoria = $categoria;
    }


}

