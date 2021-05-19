<?php
include '../../include/dbconnect.php';
session_start();


$queryexpedientes = "SELECT IdPersona FROM persona where IdPersona between 251 and 300";
$resultadoexpedientes = $mysqli->query($queryexpedientes);
while ($test = $resultadoexpedientes->fetch_assoc()) {
    
    $IdPersona = $test['IdPersona'];

    $strOdontograma = "INSERT INTO dienteortograma (IdPersona,Fecha,Hora) VALUES ($IdPersona,NOW(),NOW())";
    $resultTest = $mysqli->query($strOdontograma);

    //OBTIENE EL ULTIMO IDORTOGRAMA CREADO
    $query = "SELECT IdDienteOrtograma FROM dienteortograma order by 1 desc limit 1";
    $tbl = $mysqli->query($query);
    $arrTest = array();
    while ($f = $tbl->fetch_assoc())
    {
      $arrTest[] = $f;
    }
    $IdDienteOrtograma = $arrTest[0]["IdDienteOrtograma"];

    //OBTENER LA POSICION DE LOS DIENTES
    $queryDientePosicion = "SELECT IdDientePosicion FROM dienteposicion";
    $tblDientePosicion = $mysqli->query($queryDientePosicion);
    //BARRIDO Y CREACION DEL CAREOGRAMA DETALLADO
    while ($test = $tblDientePosicion->fetch_assoc())
	           {
                   $IdDientePosicion =  $test['IdDientePosicion'];


	               $queryInsResp = "INSERT INTO dienteortogramadetalle
	                                   (IdDientePosicion, IdDienteProcedimiento, IdDienteOrtograma)
	                               VALUES
	                                   ($IdDientePosicion, 1, $IdDienteOrtograma)
	                               ";
	               $resultInsResp = $mysqli->query($queryInsResp);

	           }
}


header('Location: ../../web/configuraciongeneral/index');

