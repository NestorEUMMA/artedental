<?php
require_once '../../include/dbconnect.php';
session_start();

      $idpersona = $_POST['txtpersonaID'];
      $idconsulta = $_POST['txtconsultaID'];
      $diente=count(($_POST['Diente']));
    //   $diente = $_POST['Diente'];
    //   $descripcionprocedimiento = $_POST['DescripcionProcedimiento'];
    //   $nombreposicion=$_POST['NombrePosicion'];
    //   $valor=$_POST['Valor'];


        $insertexpediente = "INSERT INTO dienteplantratamiento(IdPersona,Fecha,Hora) VALUES ('$idpersona',NOW(),NOW())";
        $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
        $last_id = $mysqli->insert_id;

        echo $diente;
        if($diente > 0)  
        {  
        for($i=0; $i<$diente; $i++)  
        {  

            $dientee = $_POST['Diente'];
            $descripcionprocedimiento = $_POST['DescripcionProcedimiento'];
            $nombreposicion=$_POST['NombrePosicion'];
            $valor=$_POST['Valor'];

            $sql = "INSERT INTO dienteplantratamientodetalle(IdPlanTratamiento, Procedimiento,Diente, Posicion,Precio) 
            VALUES('$last_id', '$dientee[$i]','$descripcionprocedimiento[$i]','$nombreposicion[$i]','$valor[$i]')";  
            $resultadoinsertmovimiento = $mysqli->query($sql);
            
            echo $resultadoinsertmovimiento;
        }   
        }  
        else  
        {  

        } 

        header('Location: ../../web/consultaodontologia/medical?id='.$idconsulta);
