<?php

include '../../include/dbconnect.php';
session_start();

    $idplantratamiento = $_POST["id"];


   $queryexpedientesu = "SELECT DPT.Procedimiento, DPT.Diente, DPT.Posicion, DPT.Precio, DPC.Comentarios FROM dienteplantratamientodetalle DPT
   INNER JOIN dienteplantratamientocomentarios DPC on DPC.IdPlanTratamiento = DPT.IdPlanTratamiento
   WHERE DPT.IdPlanTratamiento = $idplantratamiento";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);


   $data = array();
   while ($rowtwo = $resultadoexpedientesu->fetch_assoc()){
       $temp = array();
   
       $temp['Procedimiento'] = $rowtwo['Procedimiento'];
       $temp['Diente'] = $rowtwo['Diente'];
       $temp['Posicion'] = $rowtwo['Posicion'];
       $temp['Precio'] = $rowtwo['Precio'];
       $temp['Comentarios'] = $rowtwo['Comentarios']; 
       $data[] = $temp;
   }

    header("Content-Type","application/json");

    print_r(json_encode($data));

?>

