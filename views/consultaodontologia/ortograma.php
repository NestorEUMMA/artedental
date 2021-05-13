<?php

include_once '../../include/dbconnect.php';
session_start();

$posicion = $_POST["posicion"];
$IdPersona = $_POST["IdPersona"];

$query = "SELECT IdDiente, Diente, Clase, Descripcion, Valor, Posicion FROM diente
            WHERE Posicion = $posicion";
$tblDientes = $mysqli->query($query);
$arrDientes = array();

while ($f = $tblDientes->fetch_assoc())
{
  $arrDientes[] = $f;
}


$query = "SELECT DOD.IdDienteOrtogramaDetalle, DP.IdDientePosicion, DP.IdDiente as IdDiente, D.diente, DP.Posicion as Posicion, DP.Clase, 
            DOD.IdDienteProcedimiento, DPR.DescripcionProcedimiento, DC.CodigoColor,
            DOR.IdPersona, DC.ColorObjeto, DC.Class, DC.validar
            FROM dienteortogramadetalle DOD
            INNER JOIN dienteposicion DP on DP.IdDientePosicion = DOD.IdDientePosicion
            INNER JOIN diente D on D.IdDiente = DP.IdDiente
            INNER JOIN dienteprocedimiento DPR on DPR.IdDienteProcedimiento = DOD.IdDienteProcedimiento
            INNER JOIN dientecolor DC on DC.IdDienteColor = DPR.IdDienteColor
            INNER JOIN dienteortograma DOR on DOR.IdDienteOrtograma = DOD.IdDienteOrtograma
            WHERE D.Posicion = $posicion and DOR.IdPersona = $IdPersona
            ORDER BY DP.IdDientePosicion ASC";

$tblPosiciondiente = $mysqli->query($query);
$arrPosiciondiente = array();

while ($f = $tblPosiciondiente->fetch_assoc())
{
  $arrPosiciondiente[] = $f;
}

$i=0;
foreach ($arrDientes as $iP => $vP) {
        
       

        switch ($vP["Posicion"]) {
            case "1":
                {
                    echo "<div data-name='value' id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                    <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                    border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                    foreach ($arrPosiciondiente as $iR => $vR) {
                        if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                            echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                            if($vR["validar"] == 1){
                            echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                               //echo "X";
                            }
                            echo "</div>";
                            
                            
                        }
                    }
                    echo "</div>"; 
                    break;
                }
            
 
            case "7":
                {
                    echo "<div data-name='value' id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                    <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                    border-radius: 10px !important;' class='label label-success'> ".$vP["Valor"]." </span>";
                    foreach ($arrPosiciondiente as $iR => $vR) {
                        if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                            echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                            if($vR["validar"] == 1){
                                echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                   //echo "X";
                                }
                            echo "</div>";
                        }
                    }
                    echo "</div>"; 
                    break;
                }

            case "2":
                {
                    echo "<div id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                    <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                    border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                    foreach ($arrPosiciondiente as $iR => $vR) {
                        if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                            echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                            if($vR["validar"] == 1){
                                echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                   //echo "X";
                                }
                            echo "</div>";
                        }
                    }
                    echo "</div>"; 
                    break;
                }
    
            case "4":
                {
                    echo "<div id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                    <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                    border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                    foreach ($arrPosiciondiente as $iR => $vR) {
                        if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                            echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                            if($vR["validar"] == 1){
                                echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                   //echo "X";
                                }
                            echo "</div>";
                        }
                    }
                    echo "</div>"; 
                    break;
                }
    
                case "6":
                    {
                        echo "<div id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                        <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-success'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                if($vR["validar"] == 1){
                                    echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                       //echo "X";
                                    }
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }

                case "3":
                    {
        
                        echo "<div id='".$vP["Diente"]."'  class='".$vP["Clase"]."'>
                        <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                if($vR["validar"] == 1){
                                    echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                       //echo "X";
                                    }
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }
        
                case "5":
                    {
                        echo "<div id='".$vP["Diente"]."' style='left: -25%;' class='".$vP["Clase"]."'>
                        <span  style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-success'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                if($vR["validar"] == 1){
                                    echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                       //echo "X";
                                    }
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }
    
                case "8":
                    {
                        echo "<div id='".$vP["Diente"]."' style='left: -25%;' class='".$vP["Clase"]."'>
                        <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-success'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' data-id='".$vR["IdDienteOrtogramaDetalle"]."'  data-toggle='modal' data-target='#modalCargarDiente' style='background-color: ".$vR["CodigoColor"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                if($vR["validar"] == 1){
                                    echo "<i style='color: red; position: absolute;  margin: auto; left: 0;' right: 0; botton: 0; class='fa fa-times fa-2x fa-fw'></i>";
                                       //echo "X";
                                    }
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }
            
            default:

                break;
        }

    echo "</div>";    
}

?>