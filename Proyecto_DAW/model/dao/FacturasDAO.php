<?php
// Sergio Torres Jimenez
require_once 'config/Conexion.php';

class FacturasDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM facturas";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }


    public function search($nombre)
    {
        $sql = "SELECT * FROM facturas WHERE cliente = :nombre";
        $stmt = $this->con->prepare($sql);
        $data = ['nombre' => $nombre];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function selectOne($id) { 
        $sql = "select * from facturas where ".
        "idfacturas=:id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto;
    }

    public function insert($factura)
    {
        try {
            $sql = "INSERT INTO facturas ( fechaemision, fechavencimiento , cliente, monto, estado) VALUES ( :fechae, :fechav,  :cli, :monto, :estado)";
            $stmt = $this->con->prepare($sql);
            $data = [
                'cli' => $factura->getCliente(),
                'fechae' => $factura->getFechaEmision(),
                'fechav' => $factura->getFechaVencimiento(),
                'monto' => $factura->getMonto(),
                'estado' => $factura->getEstado()
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

    public function update($factura)
    {
        try {
            $sql = "UPDATE facturas SET cliente=:clie, fechaemision=:fechae, fechavencimiento=:fechav, monto=:mon, estado=:est WHERE idfacturas=:id";
            $stmt = $this->con->prepare($sql);
            $data = [
                'clie' => $factura->getCliente(),
                'fechae' => $factura->getFechaEmision(),
                'fechav' => $factura->getFechaVencimiento(),
                'mon' => $factura->getMonto(),
                'est' => $factura->getEstado(),
                'id' => $factura->getIdFactura()
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
            $sql = "DELETE FROM facturas WHERE idfacturas=:id";
            $stmt = $this->con->prepare($sql);
            $data = [
                'id' => $id->getIdFactura()
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