<?php
// dto data transfer object
class Inventario {
    //properties
    private $id, $nombre, $cantidad, $categoria, 
    $proveedor, $fechaVence;

    function __construct() {
    }

   function getId() {
        return $this->id;
    }

   
    function getNombre() {
        return $this->nombre;
    }


    function getCantidad() {
        return $this->cantidad;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getProveedor() {
        return $this->proveedor;
    }

    function getFechaVence() {
        return $this->fechaVence;
    }


    function setId($id) {
        $this->id = $id;
    }


    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

  
    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    function setFechaVence($fechaVence) {
        $this->fechaVence = $fechaVence;
    }
    
}
