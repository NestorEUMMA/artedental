 <?php

require_once '../../include/dbconnect.php';
session_start();

      $id = $_POST['txtconsultaID'];
      $idpersona = $_POST['txtpersonaID'];
      $diagnostico = $_POST['txtDiagnostico'];
      $comentarios = $_POST['txtComentarios'];
      $fechaproxvisita = $_POST['txtFechaProxima'];
      $diainico = substr($fechaproxvisita, 0, 2);
      $mesinicio = substr($fechaproxvisita, 3, 2);
      $anioinicio = substr($fechaproxvisita, 6, 4);
      $fechaproxvisitaFormat = $anioinicio.'-'.$mesinicio.'-'.$diainico;
      

      $user = $_SESSION['IdUsuario'];
      $persona = $_POST['txtPaciente'];
      $usuario = $_POST['cboUsuario'];
      $modulo = $_POST['cboModulo'];

      //AL MOMENTO DE ALMACENAR LA CONSULTA, EL IDESTADO SE GUARDA EN 1, ESO SIGNIFICA QUE NO TIENE ALMACENADOS SIGNOS VITALES
    $insertexpediente = "INSERT INTO consulta(IdUsuario,IdPersona,IdModulo,FechaConsulta, Activo, IdEstado)"
    . "VALUES ('$usuario','$persona','$modulo',now(), 0, 7)";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
      $last_id = $mysqli->insert_id;

      $insertexpediente = "UPDATE consulta SET Diagnostico='$diagnostico',Comentarios='$comentarios',FechaProxVisita='$fechaproxvisitaFormat' WHERE IdConsulta='$last_id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

      $insertexpediente1 = "UPDATE persona SET ProximaVisita='$fechaproxvisitaFormat' WHERE IdPersona='$idpersona'";
      $resultadoinsertmovimiento1 = $mysqli->query($insertexpediente1);


      header('Location: ../../web/consultaodontologicaexpress/view?id='.$idpersona);
