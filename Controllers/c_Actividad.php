<!--Raul 14/11/2016-->
<?php
require_once("../Model/Actividad.php");
require_once("../DB/connectDB.php");

//Metodos por defecto para los formularios
if(isset($_POST['idActividad'])){

  if($_GET['op']==0){ //Eliminar
    ActividadController::delActividad($_POST['idActividad']);
  }if($_GET['op']==1){              //Modificar
    ActividadController::modActividad();
  }if($_GET['op']==2){		//Crear
	ActividadController::addActividad();
  }
}

class ActividadController{
  function __construct(){
  }
  public function gestionActividades(){
    $e = new Actividad();
    $actividades = $e->getNameAndID();
    return $actividades;
  }

  public static function delActividad($id){
    $e = new Actividad();
    $e->deleteActividad($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
  }

  public static function addActividad(){
	  $e = new Actividad();
	  
	  if($_POST['tipoActividad'] == 'Individual'){
		  $num = 0;
	  }
		else{
		  $num = $_POST['plazasActividad'];
		}
	  
	  $e->createActividad($_POST['nomActividad'],$_POST['tipoActividad'],$num);
  	header('Location: ../Views/GestionActividades.php'); //redirect pagina anterior
  }

  public static function getActividad($id){
    $e = new Actividad();
    return $e->getById($id);
  }

//Enchufa todas las variables POST en base de datos
  public static function modActividad(){
    $e = new Actividad();
	
    if(!isset($_POST['tipoActividad'])){
      $tipo = "";
    }else{
      $tipo = $_POST['tipoActividad'];
	  if($_POST['tipoActividad'] == 'Individual')
	  {
		  $num = 0;
	  }
		else{
		  $num = $_POST['plazasActividad'];
		
	  }
    }
    
	
	
    //HASYA AQUI
    $e->modificarActividad($_POST['idActividad'],$_POST['nomActividad'],$tipo,$num);
    header('Location: ../Views/GestionActividades.php');
    }

}

 ?>
