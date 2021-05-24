<?php
require_once '../../include/dbconnect.php';
session_start();

       $idpersona = $_POST['txtpersonaID'];
       $idconsulta = $_POST['txtconsultaID'];
       $diente=count(($_POST['Diente']));
       $comentarios = $_POST['txtComentarios'];

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

            $sqldetalle = "INSERT INTO dienteplantratamientodetalle(IdPlanTratamiento, Procedimiento,Diente, Posicion,Precio) 
            VALUES('$last_id', '$dientee[$i]','$descripcionprocedimiento[$i]','$nombreposicion[$i]','$valor[$i]')";  
            $resultadoinsertmovimiento = $mysqli->query($sqldetalle);
            
            echo $sqldetalle;
        }   
        }  
        else  
        {  

        } 

        $sqlcomentarios = "INSERT INTO dienteplantratamientocomentarios(IdPlanTratamiento, Comentarios) 
            VALUES('$last_id', '$comentarios')";  
        $resultadoinsertmovimientocomentarios = $mysqli->query($sqlcomentarios);

        header('Location: ../../web/consultaodontologia/medical?id='.$idconsulta);
