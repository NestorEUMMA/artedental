 <?php

require_once '../../include/dbconnect.php';
session_start();

      $id = $_POST['txtconsultaID'];
      $idpersona = $_POST['txtpersonaID'];
      $diagnostico = $_POST['txtDiagnostico'];
      $comentarios = $_POST['txtComentarios'];
      $fechaproxvisita = $_POST['txtFechaProxima'];



      $insertexpediente = "UPDATE consulta SET Diagnostico='$diagnostico',Comentarios='$comentarios',Activo=1,FechaProxVisita='$fechaproxvisita' WHERE IdConsulta='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

      $insertexpediente1 = "UPDATE persona SET ProximaVisita='$fechaproxvisita' WHERE IdPersona='$idpersona'";
      $resultadoinsertmovimiento1 = $mysqli->query($insertexpediente1);

      
      header('Location: ../../web/consultaodontologia/medical?id='.$id);
