<?php
//autor:CABRERA GAMBOA MAXIMILIANO


class Paciente {
    //properties
    private $id, $nombre, $apellido, $fechaNacimiento, 
    $genero, $direccion, $telefono, $historialMedico, $alergias;

    function __construct() {
        
    }

   function getId() {
        return $this->id;
    }

   
    function getNombre() {
        return $this->nombre;
    }


    function getApellido() {
        return $this->apellido;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getGenero() {
        return $this->genero;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getHistorialMedico() {
        return $this->historialMedico;
    }

    function getAlergias(){
        return $this->alergias;
    }

    function setId($id) {
        $this->id = $id;
    }


    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

  
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setHistorialMedico($historialMedico) {
        $this->historialMedico = $historialMedico;
    }

    function setAlergias($alergias) {
        $this->alergias = $alergias;
    }
    
    // Methods get y set parametrizados
    public function __set($nombre, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('Paciente', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
      // Verifica que exista la propiedad
        if (property_exists('Paciente', $nombre)) {
            return $this->$nombre;
        }
// Retorna null si no existe
        return NULL;
    }

    
    
}
