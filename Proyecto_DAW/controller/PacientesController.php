<?php
//autor:CABRERA GAMBOA MAXIMILIANO

require_once 'model/dao/PacienteDAO.php';
require_once 'model/dto/Paciente.php';

class PacientesController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new PacienteDAO();
    }

    // funciones del controlador
    public function index() {
     
      //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll("");
      // comunicarnos a la vista
      $titulo="Buscar Paciente";
      require_once VPACIENTES.'list.php';
    
      
    }

    public function search(){
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
       //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAll($parametro);
       // comunicarnos a la vista
       $titulo="Buscar Paciente";
       require_once VPACIENTES.'list.php';
      }

    // muestra el formulario de nuevo producto
    public function view_new(){
          //comunicarse con el modelo
          $modeloCat = new PacienteDAO();
          $categorias = $modeloCat->selectAll("");

          // comunicarse con la vista
          $titulo="Nuevo Paciente";
          require_once VPACIENTES.'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
          // considerar verificaciones
          //if(!isset($_POST['codigo'])){ // redireccionar header('');}
          $pacie = new Paciente();
          // lectura de parametros
          $pacie->setNombre(htmlentities($_POST['nombre']));
          $pacie->setApellido(htmlentities($_POST['apellido']));
          $pacie->setFechaNacimiento($_POST['fechaNacimiento']);
          $pacie->setGenero(htmlentities($_POST['genero']));
          $pacie->setDireccion(htmlentities($_POST['direccion']));
          $pacie->setTelefono(htmlentities($_POST['telefono']));
          $pacie->setHistorialMedico(htmlentities($_POST['historialMedico']));
          $pacie->setAlergias(htmlentities($_POST['alergias']));
        
          //comunicar con el modelo
          $exito = $this->model->insert($pacie);

          $msj = 'Paciente guardado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar el guardado";
              $color = "danger";
          }
          if (!isset($_SESSION)) {
              session_start();
          };
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
          //llamar a la vista
          header('Location:index.php?c=Pacientes&f=index');
      } 
  }
  
  public function delete(){
      //leeer parametros
     $pacient = new Paciente();
     $pacient->setId(htmlentities($_REQUEST['id']));
           
         //comunicando con el modelo
         $exito = $this->model->delete($pacient);
        $msj = 'Paciente eliminado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo eliminar la actualizacion";
                $color = "danger";
            }
             if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
        //llamar a la vista
          header('Location:index.php?c=Pacientes&f=index');
  }


   public function view_edit(){
     $id= $_REQUEST['id']; // verificar, limpiar
    $pacie = $this->model->selectOne($id);
    $titulo="Editar Paciente";
    require_once VPACIENTES.'edit.php';

  }

   // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
   public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
  
          $pacie = new Paciente();
          $pacie->setId(htmlentities($_POST['id']));
          $pacie->setNombre(htmlentities($_POST['nombre']));
          $pacie->setApellido(htmlentities($_POST['apellido']));
          $pacie->setFechaNacimiento($_POST['fechaNacimiento']);
          $pacie->setGenero(htmlentities($_POST['genero']));
          $pacie->setDireccion(htmlentities($_POST['direccion']));
          $pacie->setTelefono(htmlentities($_POST['telefono']));
          $pacie->setHistorialMedico(htmlentities($_POST['historialMedico']));
          $pacie->setAlergias(htmlentities($_POST['alergias']));
          //llamar al modelo
          $exito = $this->model->update($pacie);
          
          $msj = 'Paciente actualizado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar la actualizacion";
              $color = "danger";
          }
           if(!isset($_SESSION)){ session_start();};
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
      //llamar a la vista
     header('Location:index.php?c=pacientes&f=index');
         
      } 
   }
}
