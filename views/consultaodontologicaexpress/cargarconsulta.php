<?php

require_once '../../include/dbconnect.php';
session_start();

    $idconsulta = $_POST["id"];


    $queryexpedientesu = "SELECT UPPER(CONCAT(U.Nombres,' ',U.Apellidos)) AS 'usuario', CONCAT(P.Nombres,' ',P.Apellidos) AS 'paciente', M.descripcion AS 'modulo', c.fechaconsulta,  c.diagnostico, c.comentarios, c.FechaProxVisita 
    FROM consulta C
    INNER JOIN persona P on P.Idpersona = C.IdPersona
    INNER JOIN usuario U on U.IdUsuario = C.IdUsuario
    INNER JOIN modulo M on M.IdModulo = C.IdModulo 
    WHERE c.IdConsulta = $idconsulta";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                    $datos["usuario"] = $test['usuario'];
                    $datos["paciente"] = $test['paciente'];
                    $datos["fechaconsulta"] = $test['fechaconsulta'];
                    $datos["modulo"] = $test['modulo'];
                      $datos["diagnostico"] = $test['diagnostico'];
                      $datos["comentarios"] = $test['comentarios'];
                      $datos["FechaProxVisita"] = $test['FechaProxVisita'];
                  }

    header("Content-Type","application/json");
    print_r(json_encode($datos));

?>
