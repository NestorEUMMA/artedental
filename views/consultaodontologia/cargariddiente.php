<?php

require_once '../../include/dbconnect.php';
session_start();

    $iddiente = $_POST["id"];


    $queryexpedientesu = "SELECT IdDiente FROM diente where IdDiente = $iddiente";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["IdDiente"] = $test['IdDiente'];
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
