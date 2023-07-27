<?php
// dao data access object
require_once 'config/Conexion.php';

class InventarioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        // sql de la sentencia
        $sql = "SELECT * FROM inventario";
        if (!empty($parametro)) {
            $sql = $sql . " WHERE in_nombre LIKE UPPER(:nombre)";
        }
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        if (!empty($parametro)) {
            $parametro = "%" . $parametro . "%";
            $data = ["nombre" => $parametro];
            $stmt->execute($data);
        } else {
            $stmt->execute();
        }
        //recuperar  resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }

    public function selectOne($id)
    { // buscar un producto por su id
        $sql = "SELECT * FROM INVENTARIO WHERE id_inventario=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $inventario = $stmt->fetch(PDO::FETCH_ASSOC); // fetch retorna el primer registro
        // retornar resultados
        return $inventario;
    }

    public function insert($prod)
    {
        try {
            //sentencia sql
            $sql = "INSERT INTO inventario (in_nombre, in_cantdispon, in_catego, in_proveed, in_fechaven) VALUES (:nombre, :cantidad, :categoria, :proveedor, :fechaVence);";

            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' => $prod->getNombre(),
                'cantidad' => $prod->getCantidad(),
                'categoria' => $prod->getCategoria(),
                'proveedor' => $prod->getProveedor(),
                'fechaVence' => $prod->getFechaVence(),

            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function update($prod)
    {

        try {
            //prepare
            $sql = "UPDATE INVENTARIO SET " .
                "in_nombre = :nombre, in_cantdispon=:cantidad, in_catego=:categoria, in_proveed=:proveedor, in_fechaven=:fechaVence" .
                " WHERE id_inventario=:id";
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' => $prod->getNombre(),
                'cantidad' => $prod->getCantidad(),
                'categoria' => $prod->getCategoria(),
                'proveedor' => $prod->getProveedor(),
                'fechaVence' => $prod->getFechaVence(),
                'id' => $prod->getId()
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
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
            //prepare
            $sql = "DELETE FROM INVENTARIO WHERE id_inventario=:id";
            //now());
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => $id
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }

}