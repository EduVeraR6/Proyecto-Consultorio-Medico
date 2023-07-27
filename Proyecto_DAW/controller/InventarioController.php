<?php
require_once 'model/dao/InventarioDAO.php';
require_once 'model/dto/Inventario.php';

class InventarioController
{
    private $model;

    public function __construct()
    { // constructor
        $this->model = new InventarioDAO();
    }

    // funciones del controlador
    public function index()
    {

        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAll("");
        // comunicarnos a la vista
        $titulo = "Buscar medicinas en inventario";
        require_once VINVENTARIO . 'list.php';


    }

    public function search()
    {
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAll($parametro);
        // comunicarnos a la vista
        $titulo = "Buscar en inventario";
        require_once VINVENTARIO . 'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new()
    {
        //comunicarse con el modelo
        $modeloCat = new InventarioDAO();
        // comunicarse con la vista
        $titulo = "Nuevo producto para inventario";
        require_once VINVENTARIO . 'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new ()
    {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // insertar el producto
            // considerar verificaciones
            //if(!isset($_POST['codigo'])){ // redireccionar header('');}
            $inventario = new Inventario();
            // lectura de parametros
            $inventario->setNombre(htmlentities($_POST['nombre']));
            $inventario->setCantidad(htmlentities($_POST['cantidad']));
            $inventario->setCategoria(htmlentities($_POST['categoria']));
            $inventario->setProveedor(htmlentities($_POST['proveedor']));
            $inventario->setFechaVence(htmlentities($_POST['fecha']));

            //comunicar con el modelo
            $exito = $this->model->insert($inventario);

            $msj = 'Producto guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            ;
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=Inventario&f=index');
        }
    }

    public function delete()
    {
        //leeer parametros
        $id = htmlentities($_REQUEST['id']);
        //comunicando con el modelo
        $exito = $this->model->delete($id);
        $msj = 'Medicamento eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar la actualizacion";
            $color = "danger";
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        ;
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=inventario&f=index');
    }


    // muestra el formulario de editar producto
    public function view_edit()
    {
        //leer parametro
        $id = $_REQUEST['id']; // verificar, limpiar
        //comunicarse con el modelo de productos
        $prod = $this->model->selectOne($id);
        //comunicarse con el modelo de categorias
        // comunicarse con la vista
        $titulo = "Editar producto";
        require_once VINVENTARIO . 'edit.php';

    }

    // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // actualizar
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            // leer parametros
            $inventario = new Inventario();
            // lectura de parametros
            $inventario->setNombre(htmlentities($_POST['nombre']));
            $inventario->setCantidad(htmlentities($_POST['cantidad']));
            $inventario->setCategoria(htmlentities($_POST['categoria']));
            $inventario->setProveedor(htmlentities($_POST['proveedor']));
            $inventario->setFechaVence(htmlentities($_POST['fecha']));
            $inventario->setId(htmlentities($_POST['id']));
            //llamar al modelo
            $exito = $this->model->update($inventario);

            $msj = 'Producto actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            ;
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=inventario&f=index');

        }
    }
}