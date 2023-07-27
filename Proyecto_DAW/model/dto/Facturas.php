<?php
class Facturas {

    //propiedades 
    private $idfactura , $fechaemision, $fechavencimiento , $cliente , $monto , $estado;

    function __construct(){

    }

    function getIdFactura() {
        return $this->idfactura;
    }

    function getFechaEmision() {
        return $this->fechaemision;
    }

    function getFechaVencimiento() {
        return $this->fechavencimiento;
    }
    function getCliente() {
        return $this->cliente;
    }

    function getMonto() {
        return $this->monto;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdFactura($idfactura) {
        $this->idfactura = $idfactura;
    }

    function setFechaEmision($fechaemision) {
        $this->fechaemision = $fechaemision;
    }
    function setFechaVencimiento($fechavencimiento) {
        $this->fechavencimiento = $fechavencimiento;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
   


}