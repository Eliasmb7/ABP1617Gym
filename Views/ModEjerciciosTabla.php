<!--Martin 15/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar la Tabla</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Ejercicio.php');
        require_once("../DB/connectDB.php");
        $ejerciciosController = new EjercicioController();
        $ejercicios = $ejerciciosController->gestionEjercicios();
    ?>

  </head>

    <body>
    <!-- TODO pillar dinamicamente los ejercicios con foreach-->
    <form>
      <select name='idEjercicio'>
          <option value="">--Selecionar--</option>
        <?php foreach($ejercicios as $it){ ?>
          <option value="<?php echo($it['idEjercicio']);?>"><?php echo($it['nomEjercicio']);?></option>
        <?php }?>
      </select>
      <input type="text" name="numRepeticiones" placeholder="Numero de repeticiones"/>
      <input type="text" name="carga" placeholder="carga"/>
    </form>





    </body>
</html>
