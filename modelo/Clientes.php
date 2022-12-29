<?php

class Clientes{
    
    private $id_usuario;
    private $nombre_comp;
    private $email;
    private $clave;
    private $tipo;
    
    function __construct($id_usuario, $nombre_comp,  $email, $clave, $tipo) {
        $this->id_usuario = $id_usuario;
        $this->nombre_comp = $nombre_comp;
        $this->email = $email;
        $this->clave = $clave;
        $this->tipo = $tipo;
    }

    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre_comp() {
        return $this->nombre_comp;
    }

    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    function setNombre_comp($nombre_comp): void {
        $this->nombre_comp = $nombre_comp;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setClave($clave): void {
        $this->clave = $clave;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

        
}

