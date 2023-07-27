<?php
//Eduardo Vera Romero
require_once 'model/dao/CitasDAO.php';
require_once 'model/dto/Citas.php';

class CitasController
{
    private $model;

    public function __construct()
    { // constructor
        $this->model = new CitasDAO();
    }


    public function index()
    {


        $resultados = $this->model->selectAll();

        $titulo = "Buscar citas por Paciente";
        require_once VCITAS . 'list.php';

    }

    public function search()
    {

        $nombre = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";

        $resultados = $this->model->search($nombre);
        // comunicarnos a la vista
        $titulo = "Buscar cita por Paciente";
        require_once VCITAS . 'list.php';
    }




    public function view_new()
    {

        $modeloC = new CitasDAO();
        $categorias = $modeloC->selectAll();


        $titulo = "Nueva cita";
        require_once VCITAS . 'nuevo.php';

    }



    public function new ()
    {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $cita = new Citas();
            // lectura de parametros
            $cita->setPaciente(htmlentities($_POST['nombre']));
            $cita->setEspecialidad(htmlentities($_POST['especialidad']));
            $cita->setMotivo(htmlentities($_POST['motivo']));
            $fecha = htmlentities($_POST['fecha']);
            $cita->setFecha($fecha);
            $cita->setMedico(htmlentities($_POST['medico']));

            // Validar que la fecha sea en el futuro
            $fecha_actual = new DateTime();
            $fecha_cita = new DateTime($fecha);
            if ($fecha_cita <= $fecha_actual) {
                // la fecha de la cita no es válida
                $msj = "La fecha de la cita debe ser en el futuro";
                $color = "danger";
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=citas&f=index');
                exit();
            }

            //comunicar con el modelo
            $exito = $this->model->insert($cita);

            $msj = 'Cita guardada exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la Cita";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            ;
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=citas&f=index');
        }

    }

    public function delete()
    {
        //leeer parametros
        $cita = new Citas();
        $cita->setIdCita(htmlentities($_REQUEST['id']));

        //comunicando con el modelo
        $exito = $this->model->delete($cita);
        $msj = 'Cita eliminada exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar la Cita";
            $color = "danger";
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        ;
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=citas&f=index');
    }



    public function view_edit()
    {
        //leer parametro
        $id = $_REQUEST['id'];
        $cita = $this->model->selectOne($id);
        $modeloCat = new CitasDAO();
        $categorias = $modeloCat->selectAll();


        // comunicarse con la vista
        $titulo = "Editar cita";
        require_once VCITAS . 'edit.php';

    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $cita = new Citas();
            $cita->setIdCita(htmlentities($_POST['id']));
            $cita->setPaciente(htmlentities($_POST['nombre']));
            $cita->setEspecialidad(htmlentities($_POST['especialidad']));
            $cita->setMotivo(htmlentities($_POST['motivo']));
        
            // Validar fecha
            $fecha = htmlentities($_POST['fecha']);
            $hoy = date('Y-m-d');
            if (strtotime($fecha) < strtotime($hoy)) {
                // Fecha en el pasado, mostrar error
                $msj = 'La fecha de la cita debe ser a partir de hoy';
                $color = 'danger';
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=citas&f=index');
                exit();
            }
            $cita->setFecha($fecha);
        
            $cita->setMedico(htmlentities($_POST['medico']));
        
            //llamar al modelo
            $exito = $this->model->update($cita);
        
            $msj = 'Cita actualizada exitosamente';
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
            header('Location:index.php?c=citas&f=index');
      
        }
    }
}