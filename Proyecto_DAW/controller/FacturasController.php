<?php
//Sergio Torres Jimenez
require_once 'model/dao/FacturasDAO.php';
require_once 'model/dto/Facturas.php';

class FacturasController
{
    private $model;

    public function __construct()
    { // constructor
        $this->model = new FacturasDAO();
    }


    public function index()
    {


        $resultados = $this->model->selectAll();
        // comunicarnos a la vista
        $titulo = "Buscar facturas por Cliente";
        require_once VFACTURAS . 'list.php';

    }

    public function search()
    {
       
        $nombre = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        
        $resultados = $this->model->search($nombre);

        $titulo = "Buscar Factura por Cliente";
        require_once VFACTURAS . 'list.php';
    }




    public function view_new()
    {
        //comunicarse con el modelo
        $modeloC = new FacturasDAO();
        $categorias = $modeloC->selectAll();

        // comunicarse con la vista
        $titulo = "Nueva factura";
        require_once VFACTURAS . 'nuevo.php';

    }



    public function new ()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $factura = new Facturas();

            // validar fecha de emisión
            $fechaActual = date('Y-m-d');
            $fechaEmision = htmlentities($_POST['fechaemision']);
            if ($fechaActual != $fechaEmision) {
                $msj = 'La fecha de emisión debe ser la fecha actual';
                $color = 'danger';
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=facturas&f=index');
                exit();
            }

            // validar fecha de vencimiento
            $fechaVencimiento = htmlentities($_POST['fechavencimiento']);
            if ($fechaVencimiento <= $fechaActual) {
                $msj = 'La fecha de vencimiento debe ser una fecha a futuro';
                $color = 'danger';
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=facturas&f=index');
                exit();
            }

            // lectura de parametros
            $factura->setCliente(htmlentities($_POST['cliente']));
            $factura->setFechaEmision($fechaEmision);
            $factura->setFechaVencimiento($fechaVencimiento);
            $factura->setMonto(htmlentities($_POST['monto']));
            $factura->setEstado(htmlentities($_POST['estado']));

            //comunicar con el modelo
            $exito = $this->model->insert($factura);

            $msj = 'Factura guardada exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=facturas&f=index');
        }


    }

    public function delete()
    {
        //leeer parametros
        $factura = new Facturas();
        $factura->setIdFactura(htmlentities($_REQUEST['id']));

        //comunicando con el modelo
        $exito = $this->model->delete($factura);
        $msj = 'Factura eliminada exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar la Factura";
            $color = "danger";
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        ;
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=facturas&f=index');
    }


    public function view_edit()
    {
        //leer parametro
        $id = $_REQUEST['id']; 
        $factura = $this->model->selectOne($id);
        $modeloCat = new FacturasDAO();
        $categorias = $modeloCat->selectAll();


        // comunicarse con la vista
        $titulo = "Editar Facturas";
        require_once VFACTURAS . 'edit.php';

    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $factura = new Facturas();
            $factura->setIdFactura(htmlentities($_POST['id']));
            $factura->setCliente(htmlentities($_POST['cliente']));

            $fechaEmision = htmlentities($_POST['fechaemision']);
            $fechaVencimiento = htmlentities($_POST['fechavencimiento']);

            // validación de fecha de emisión
            $hoy = new DateTime();
            $fechaEmision = DateTime::createFromFormat('Y-m-d', $fechaEmision);
            if (!$fechaEmision || $fechaEmision > $hoy) {
                // fecha inválida o posterior a hoy
                $msj = "La fecha de emisión no es válida";
                $color = "danger";
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=facturas&f=index');
                exit();
            }
            $factura->setFechaEmision($fechaEmision->format('Y-m-d'));

            // validación de fecha de vencimiento
            $fechaVencimiento = DateTime::createFromFormat('Y-m-d', $fechaVencimiento);
            if (!$fechaVencimiento || $fechaVencimiento <= $hoy) {
                // fecha inválida o anterior o igual a hoy
                $msj = "La fecha de vencimiento no es válida";
                $color = "danger";
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=facturas&f=index');
                exit();
            }
            $factura->setFechaVencimiento($fechaVencimiento->format('Y-m-d'));

            $factura->setMonto(htmlentities($_POST['monto']));
            $factura->setEstado(htmlentities($_POST['estado']));

            //llamar al modelo
            $exito = $this->model->update($factura);

            $msj = 'Factura actualizada exitosamente';
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
            header('Location:index.php?c=facturas&f=index');

        }

    }
}