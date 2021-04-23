<?php

include_once '../../include/dbconnect.php';
session_start();

$posicion = $_POST["posicion"];

$query = "SELECT IdDiente, Diente, Clase, Descripcion, Valor, Posicion FROM diente
            WHERE Posicion = $posicion";
$tblDientes = $mysqli->query($query);
$arrDientes = array();

while ($f = $tblDientes->fetch_assoc())
{
  $arrDientes[] = $f;
}


$query = "SELECT DP. IdDiente as IdDiente, D.diente, DP.Posicion as Posicion, DP.Clase FROM diente D
            INNER JOIN dienteposicion DP on D.IdDiente = DP.IdDiente
            WHERE D.Posicion = $posicion";

$tblPosiciondiente = $mysqli->query($query);
$arrPosiciondiente = array();

while ($f = $tblPosiciondiente->fetch_assoc())
{
  $arrPosiciondiente[] = $f;
}

$i=0;
// 1 y 7
foreach ($arrDientes as $iP => $vP) {
        
       

        switch ($vP["Posicion"]) {
            case "1":
                {
                    echo "<div data-name='value' id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                    <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                    border-radius: 10px !important;' data-toggle='modal' data-target='#myModal6' class='label label-info'> ".$vP["Valor"]." </span>";
                    foreach ($arrPosiciondiente as $iR => $vR) {
                        if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                            echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
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
                    border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                    foreach ($arrPosiciondiente as $iR => $vR) {
                        if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                            echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
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
                            echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
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
                            echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
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
                        border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }

                case "3":
                    {
        
                        echo "<div id='".$vP["Diente"]."' style='left: -25%;' class='".$vP["Clase"]."'>
                        <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }
        
                case "5":
                    {
                        echo "<div id='".$vP["Diente"]."' style='left: -25%;' class='".$vP["Clase"]."'>
                        <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
                                echo "</div>";
                            }
                        }
                        echo "</div>"; 
                        break;
                    }
    
                case "8":
                    {
                        echo "<div id='".$vP["Diente"]."' class='".$vP["Clase"]."'>
                        <span style='margin-left: 45px; margin-bottom:5px; display: inline-block !important; 
                        border-radius: 10px !important;' class='label label-info'> ".$vP["Valor"]." </span>";
                        foreach ($arrPosiciondiente as $iR => $vR) {
                            if(	$vR["IdDiente"] == $vP["IdDiente"] ){
                                echo "<div id='".$vR["Posicion"]."' value='".$vR["Posicion"]."' class='".$vR["Clase"]."'>";
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
