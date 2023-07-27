<?php
// Eduardo Vera Romero
class Citas {

    //propiedades 
    private $idcita, $paciente,$especialidad,$fecha,$motivo,$medico;

    function __construct(){

    }

    function getIdCita() {
        return $this->idcita;
    }

    function getPaciente() {
        return $this->paciente;
    }
    function getEspecialidad() {
        return $this->especialidad;
    }
    function getFecha() {
        return $this->fecha;
    }
    function getMotivo() {
        return $this->motivo;
    }
    function getMedico() {
        return $this->medico;
    }

    function setIdCita($idcita) {
        $this->idcita = $idcita;
    }
    function setPaciente($paciente) {
        $this->paciente = $paciente;
    }
    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }
    function setMedico($medico) {
        $this->medico = $medico;
    }



}