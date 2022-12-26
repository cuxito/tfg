<?php

class Clientes{
    
    private $idcliente;
    private $perfil;
    private $nombre;
    private $direccion;
    private $email;
    private $clave;
    private $telef;
    private $fechaalta;
    
    function __construct($idcliente, $perfil, $nombre, $direccion, $email, $clave, $telef, $fechaalta) {
        $this->idcliente = $idcliente;
        $this->perfil = $perfil;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->clave = $clave;
        $this->telef = $telef;
        $this->fechaalta = $fechaalta;
    }

    
    function getIdcliente() {
        return $this->idcliente;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getTelef() {
        return $this->telef;
    }

    function getFechaalta() {
        return $this->fechaalta;
    }

    function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    function setPerfil($perfil): void {
        $this->perfil = $perfil;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setClave($clave): void {
        $this->clave = $clave;
    }

    function setTelef($telef): void {
        $this->telef = $telef;
    }

    function setFechaalta($fechaalta): void {
        $this->fechaalta = $fechaalta;
    }

        
}

