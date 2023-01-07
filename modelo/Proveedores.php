<?php 
class Proveedores{
    private $cod_prov;
    private $nom_prov;
    private $telefono;
    private $direccion;

    function __construct($cod_prov, $nom_prov, $telefono, $direccion)
    {
        $this->cod_prov=$cod_prov;
        $this->nom_prov=$nom_prov;
        $this->telefono=$telefono;
        $this->direccion=$direccion;
    }

    function getCod_prov(){
        return $this->cod_prov;
    }
    function getNom_prov(){
        return $this->nom_prov;
    }
    function getTelefono(){
        return $this->telefono;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function setCod_prov($cod_prov): void {
        $this->cod_prov = $cod_prov;
    }
    function setNom_prov($nom_prov): void {
        $this->nom_prov = $nom_prov;
    }
    function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }
    function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }
}

?>