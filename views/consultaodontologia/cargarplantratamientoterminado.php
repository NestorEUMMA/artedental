<?php

include '../../include/dbconnect.php';
session_start();

    $idplantratamiento = $_POST["id"];


   $queryexpedientesu = "SELECT Procedimiento, Diente, Posicion, Precio FROM dienteplantratamientodetalle
    where IdPlanTratamiento = $idplantratamiento";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);


   $data = array();
   while ($rowtwo = $resultadoexpedientesu->fetch_assoc()){
       $temp = array();
   
       $temp['Procedimiento'] = $rowtwo['Procedimiento'];
       $temp['Diente'] = $rowtwo['Diente'];
       $temp['Posicion'] = $rowtwo['Posicion'];
       $temp['Precio'] = $rowtwo['Precio'];
   
       $data[] = $temp;
   }

    header("Content-Type","application/json");

    print_r(json_encode($data));

?>

