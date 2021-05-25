<?php
require_once '../../include/dbconnect.php';
session_start();

      $idpersona = $_POST['txtpersonaID'];
      $idortogramadetalle = $_POST['txtidortogramadetalle'];
      $idProcedimiento = $_POST['cboProcedimiento'];
      $idconsulta = $_POST['txtconsultaID'];

      $updateprocedimiento = "UPDATE dienteortogramadetalle SET IdDienteProcedimiento = $idProcedimiento where IdDienteOrtogramaDetalle = $idortogramadetalle";
	$resultadoupdateprocedimiento = $mysqli->query($updateprocedimiento);
	header('Location: ../../web/consultaodontologicaexpress/view?id='.$idpersona);