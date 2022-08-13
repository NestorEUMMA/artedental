<table class="table table-striped table-hover table-bordered" >
	<tr>
		<th class="text-center" style="width: 5%">No.</th>
		<th class="text-center" style="width: 55%">Pregunta</th>
		<th class="text-center" style="width: 40%">Respuesta</th>
	</tr>

<?php

include_once '../../include/dbconnect.php';
session_start();

$id = $_POST["IdFactor"];

$query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = $id and activo = 1";
$tblPreguntas = $mysqli->query($query);
$arrPreguntas = array();

while ($f = $tblPreguntas->fetch_assoc())
{
  $arrPreguntas[] = $f;
}


$query = "select
				 b.IdPregunta
				,b.Nombre as Pregunta
				,a.IdRespuesta
			    ,a.Nombre as Respuesta
			from
				respuesta a
			left join pregunta b on a.IdPregunta = b.IdPregunta
			where
				b.idFactor = $id";

$tblRespuestas = $mysqli->query($query);
$arrRespuestas = array();

while ($f = $tblRespuestas->fetch_assoc())
{
  $arrRespuestas[] = $f;
}

$i=0;
foreach ($arrPreguntas as $iP => $vP) {
	echo "<tr>";
		echo "<td class='text-center'>". ++$i . "</td>";
		echo "<td>";
			//echo "<label for='selPregunta". $vP["IdPregunta"] ."' class='form-label'>". $vP["Nombre"]. "<label>";
			echo $vP["Nombre"];
		echo "</td>";
		echo "<td>";

			switch ($vP["Ponderacion"]) {
				case "0":
				{
					echo "<select required='' id='selPregunta". $vP["IdPregunta"] . "' name='selPregunta".$vP["IdPregunta"] . "' class='form-control select3'  onfocus='inFocus(this)' onfocusout='outFocus(this)'   >";
					echo "<option value=''></option>";

					foreach ($arrRespuestas as $iR => $vR) {
						if(	$vR["IdPregunta"] == $vP["IdPregunta"] ){
							echo "<option value='". $vR["IdRespuesta"] ."'>". $vR["Respuesta"]."</option>";
						}
					}

					echo "</select>";
					break;
				}
				case "1":
				{
					$IdPregunta = 'selPregunta'.$vP["IdPregunta"];
					echo "<textarea  required='' style='text-transform:uppercase'id='$IdPregunta' name='$IdPregunta' class='form-control' row='2'></textarea>";
					break;
				}
				case "2":
				{
					$IdPregunta = 'selPregunta'.$vP["IdPregunta"];
					echo "<select  required='' id='$IdPregunta' name='$IdPregunta". "[]" ."' class='form-control select3' multiple='multiple'>";
					echo "<option value=''></option>";

					foreach ($arrRespuestas as $iR => $vR) {
						if(	$vR["IdPregunta"] == $vP["IdPregunta"] ){
							echo "<option value='". $vR["IdRespuesta"] ."'>". $vR["Respuesta"]."</option>";
						}
					}

					echo "</select>";
					break;
				}
				case "3":
					{
						$IdPregunta = 'selPregunta'.$vP["IdPregunta"];
					echo "<textarea  required='' style='text-transform:uppercase'id='$IdPregunta' name='$IdPregunta' class='form-control' row='1'></textarea>";
					break;
					}
				default:

					break;
			}

		echo "</td>";
	echo "<tr>";
}

?>
</table>
