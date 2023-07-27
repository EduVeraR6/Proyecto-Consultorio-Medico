<?php
//autor:CABRERA GAMBOA MAXIMILIANO

require_once 'config/Conexion.php';

class PacienteDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        // sql de la sentencia
     //$sql = "SELECT * FROM PACIENTES";
     $sql = "SELECT * FROM pacientes where Nombre like :b1";
     $stmt = $this->con->prepare($sql);
     $conlike = '%' . $parametro . '%';
     $data = array('b1' => $conlike);
      
      // ejecutar la sentencia
        $stmt->execute($data);
      //recuperar  resultados
      
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //retornar resultados
      return $resultados;


    
  }


    public function selectOne($id) { 
        $sql = "select * from pacientes where ".
        "ID_Paciente=:id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $paciente;
    }


    public function insert($pacie){
        try{
        //sentencia sql
        $sql = "INSERT INTO pacientes ( Nombre,  Apellido, FechaNacimiento, 
        Genero, Direccion, Telefono, HistorialMedico, Alergias) VALUES 
        ( :nom, :apell, :fechaNaci, :gene, :dire, :tele, :historialMed, :aler)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'nom' =>  $pacie->getNombre(),
        'apell' =>  $pacie->getApellido(),
        'fechaNaci' => $pacie->getFechaNacimiento(),
        'gene' =>  $pacie->getGenero(),
        'dire' =>  $pacie->getDireccion(),
        'tele' =>  $pacie->getTelefono(),
        'historialMed' =>  $pacie->getHistorialMedico(),
        'aler' =>  $pacie->getAlergias()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
           return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($pacie){

        try{
            //prepare
            $sql = "UPDATE pacientes SET Nombre=:nom,Apellido=:apell,FechaNacimiento=:fechaNaci,Genero=:gene,Direccion=:dire,Telefono=:tele, HistorialMedico=:historialMed, Alergias=:aler
                     WHERE ID_Paciente=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' =>  $pacie->getNombre(),
                'apell' =>  $pacie->getApellido(),
                'fechaNaci' =>  $pacie->getFechaNacimiento(),
                'gene' =>  $pacie->getGenero(),
                'dire' =>  $pacie->getDireccion(),
                'tele' =>  $pacie->getTelefono(),
                'historialMed' =>  $pacie->getHistorialMedico(),
                'aler' =>  $pacie->getAlergias(),
                'id' =>  $pacie->getId()
                ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
          echo $e->getMessage();
            return false;
        }
            return true;       
    }

   public function delete($prod){
       try{
        //prepare
        $sql = "DELETE from pacientes WHERE ID_Paciente=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = ['id' =>  $prod->getId()];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
        return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    
        return true;
    }
    
}
    