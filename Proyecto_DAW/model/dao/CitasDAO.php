<?php
// Eduardo Vera Romero
require_once 'config/Conexion.php';

class CitasDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM citas";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }


    public function search($nombre)
    {
        $sql = "SELECT * FROM citas WHERE paciente = :nombre";
        $stmt = $this->con->prepare($sql);
        $data = ['nombre' => $nombre];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function selectOne($id) { 
        $sql = "select * from citas where ".
        "idcitas=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];

        $stmt->execute($data);

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        // retornar resultados
        return $producto;
    }

    public function insert($cita)
    {
        try {
            $sql = "INSERT INTO citas (fecha, paciente, especialidad, motivo, medico) VALUES (:fecha, :paciente, :especialidad, :motivo, :medico)";
            $stmt = $this->con->prepare($sql);
            $data = [
                'fecha' => $cita->getFecha(),
                'paciente' => $cita->getPaciente(),
                'especialidad' => $cita->getEspecialidad(),
                'motivo' => $cita->getMotivo(),
                'medico' => $cita->getMedico()
            ];
            $stmt->execute($data);
            if ($stmt->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function update($cita)
    {
        try {
            $sql = "UPDATE citas SET fecha=:fec, paciente=:paci, especialidad=:especiali, motivo=:moti, medico=:medi WHERE idcitas=:id";
            $stmt = $this->con->prepare($sql);
            $data = [
                'fec' => $cita->getFecha(),
                'paci' => $cita->getPaciente(),
                'especiali' => $cita->getEspecialidad(),
                'moti' => $cita->getMotivo(),
                'medi' => $cita->getMedico(),
                'id' => $cita->getIdCita()
            ];
            $stmt->execute($data);
            if ($stmt->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM citas WHERE idcitas=:id";
            $stmt = $this->con->prepare($sql);
            $data = [
                'id' => $id->getIdCita()
            ];
            $stmt->execute($data);
            if ($stmt->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }
}