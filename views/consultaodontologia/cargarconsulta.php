<?php

require_once '../../include/dbconnect.php';
session_start();

    $idconsulta = $_POST["id"];


    $queryexpedientesu = "SELECT diagnostico, comentarios, FechaProxVisita FROM consulta WHERE IdConsulta = $idconsulta";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["diagnostico"] = $test['diagnostico'];
                      $datos["comentarios"] = $test['comentarios'];
                      $datos["FechaProxVisita"] = $test['FechaProxVisita'];
                  }

    header("Content-Type","application/json");
    print_r(json_encode($datos));

?>
