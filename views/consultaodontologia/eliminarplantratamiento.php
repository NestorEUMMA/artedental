<?php
require_once '../../include/dbconnect.php';
session_start();

      $idplantratamiento = $_POST['txtplantratamineto'];
      $idconsulta = $_POST['txtconsultaID'];

        $eliminarplantratamientodetalle = "DELETE FROM dienteplantratamientodetalle WHERE IdPlanTratamiento = $idplantratamiento";
        $resultadoeliminarplantratamientodetalle = $mysqli->query($eliminarplantratamientodetalle);

        $eliminarplantratamiento = "DELETE FROM dienteplantratamiento WHERE IdPlanTratamiento = $idplantratamiento";
        $resultadoeliminarplantratamiento = $mysqli->query($eliminarplantratamiento);

        header('Location: ../../web/consultaodontologia/medical?id='.$idconsulta);