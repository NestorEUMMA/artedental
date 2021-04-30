<?php

use yii\helpers\Html;
include '../include/dbconnect.php';
/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Nueva Consulta';

$id = $model->IdPersona;
$queryexpedientes = "SELECT * FROM persona WHERE IdPersona  = '$id'";
$resultadoexpedientes = $mysqli->query($queryexpedientes);
while ($test = $resultadoexpedientes->fetch_assoc())
{
	$idpersona = $test['IdPersona'];
	$nombres = $test['Nombres'];
	$apellidos = $test['Apellidos'];
	$dui = $test['Dui'];
	$fnacimiento = $test['FechaNacimiento'];
	$geografia = $test['IdGeografia'];
	$direccion = $test['Direccion'];
	$genero = $test['Genero'];
	$estadocivil = $test['IdEstadoCivil'];
	$nombreResponsable = $test['NombresResponsable'];
	$apellidoResponsable = $test['ApellidosResponsable'];
	$parentesco = $test['Parentesco'];
	$telefono = $test['Telefono'];
	$celular = $test['Celular'];
	$correo = $test['Correo'];
	$alergias = $test['Alergias'];
	$medicinas = $test['Medicamentos'];
	$enfermedad = $test['Enfermedad'];
	$telefonoresponsable = $test['TelefonoResponsable'];
	$date = date("Y-m-d");
}

 $querydepartamentos = "SELECT * from geografia where IdGeografia='$geografia'";
 $resultadodepartamentos = $mysqli->query($querydepartamentos);

 $queryestadocivil = "SELECT * from estadocivil where IdEstadoCivil = '$estadocivil'";
 $resultadoestadocivil = $mysqli->query($queryestadocivil);

 $queryusuario = "SELECT u.IdUsuario, CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto'
	from usuario u
	inner join puesto = p on u.IdPuesto = p.IdPuesto
	where p.Descripcion = 'Odontologia' and u.Activo = 1 ";
 $resultadousuario = $mysqli->query($queryusuario);


 $querymodulo = "SELECT * FROM modulo WHERE IdModulo in(1) order by NombreModulo asc";
 $resultadomodulo = $mysqli->query($querymodulo);
?>
</br>
<!-- <?= $this->render('_form', [
        'model' => $model,
    ]) ?> -->

<style>
	.example-modal .modal {
		position: relative;
		top: auto;
		bottom: auto;
		right: auto;
		left: auto;
		display: block;
		z-index: 1;
	}

	.example-modal .modal {
		background: transparent !important;
	}
</style>
<link rel="stylesheet" href="../template/parsley/parsley.css">
<script src="../template/parsley/parsley.min.js"></script>
<script src="../template/i18n/es.js"></script>


<div class="row">
	<div class="col-md-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<p align="right">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsulta"
						id='btnconsulta'> </button>
				</p>
			</div>
			<div class="ibox-content">
				<h3 class="box-title" id=''></h3>

			</div>
		</div>
	</div>
</div>
<!-- MODAL PARA INGRESAR UNA NUEVA CONSULTA -->
<div class="modal inmodal" id="modalConsulta" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
				<i class="fa fa-medkit modal-icon"></i>
				<h4 class="modal-title" id='encabezadomodal1'></h4>
				<small id='encabezadomodal2'></small>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="../../views/consultaodontologica/guardarconsulta.php" role="form"
					method="POST">
					<div class="form-group">
						<div class="col-sm-1"></div>
						<div class="col-sm-3"><label for="inputEmail3" class="control-label" id='FechaModal1'></label>
						</div>
						<div class="col-sm-7"><input value="<?php echo $date ?>" class="form-control" name="txtFecha"
								disabled="disabled"></div>
						<div class="col-sm-1"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-1"></div>
						<div class="col-sm-3"><label for="inputEmail3" class="control-label" id='MedicoModal1'></label>
						</div>
						<div class="col-sm-7">
							<select class="form-control select2" style="width: 100%;" name="cboUsuario">
								<?php
                    while ($row = $resultadousuario->fetch_assoc()) {
                      echo "<option value = '".$row['IdUsuario']."'>".$row['NombreCompleto']."</option>";
                    }
                 ?>
							</select>
						</div>
						<div class="col-sm-1"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-1"></div>
						<div class="col-sm-3"><label for="inputEmail3" class="control-label"
								id='PacienteModal1'></label></div>
						<div class="col-sm-7"><input type="text" value="<?php echo $nombres. " " .$apellidos ?>"
								class="form-control" disabled="disabled">
							<input type="hidden" name="txtPaciente" value="<?php echo $idpersona ?>">
						</div>
						<div class="col-sm-1"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-1"></div>
						<div class="col-sm-3"><label for="inputEmail3" class="control-label" id='ModuloModal1'></label>
						</div>
						<div class="col-sm-7">
							<select class="form-control select2" style="width: 100%;" name="cboModulo">
								<?php
                                        while ($row = $resultadomodulo->fetch_assoc()) {
                                          echo "<option value = '".$row['IdModulo']."'>".$row['NombreModulo']."</option>";
                                        }
                                        ?>
							</select>
						</div>
						<div class="col-sm-1"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" id='btncerrarmodal1'></button>
						<button type="submit" class="btn btn-primary" name="guardarConsulta"
							id='btnguardarmodal1'></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>

<script type="text/javascript">
   $(document).ready(function(){
   <?php if ($_SESSION['IdIdioma'] == 1){ ?>
       $("#btnconsulta").text('Nueva consulta');
       $("#encabezadomodal1").text('Nueva Consulta');
       $("#encabezadomodal2").text('Ingrese los datos requeridos.');
       $("#FechaModal1").text('Fecha');
       $("#MedicoModal1").text('Medico');
       $("#PacienteModal1").text('Paciente');
       $("#ModuloModal1").text('Modulo');
       $("#btncerrarmodal1").text('Cerrar');
       $("#btnguardarmodal1").text('Guardar Cambios');
       $("#tablaconsultas").text('Historial de Consultas');
       $("#tabla1columna1").text('Fecha de Consulta');
       $("#tabla1columna2").text('Nombre de Paciente');
       $("#tabla1columna3").text('Nombre de Medico');
       $("#tabla1columna4").text('Nombre de Especialidad');
       $("#tabla1columna5").text('Accion');


       $("#mdlsignosvitalesencabezado1").text('SIGNOS VITALES');
       $("#mdlsignosvitalesencabezado2").text('INGRESE LOS DATOS REQUERIDOS');
       $("#tab1signosvitales1").text('FICHA DE CONSULTA');
       $("#tab1signosvitales2").text('DATOS GENERALES');
       $("#tab1signosvitales3").text('USO GINECOLOGICO');
       $("#tab1signosvitales4").text('USO PEDIATRICO');
       $("#tab1signosvitales5").text('OTROS');
       $("#tab1tab1paciente").text('Paciente');
       $("#tab1tab1medico").text('Medico');
       $("#tab1tab1especialidad").text('Especialidad');
       $("#tab1tab1fecha").text('Fecha');
       $("#tab1tab2peso").text('Peso');
       $("#tab1tab2altura").text('Altura');
       $("#tab1tab2temperatura").text('Temperatura');
       $("#tab1tab2fr").text('F/R');
       $("#tab1tab2pulso").text('Pulso');
       $("#tab1tab2presion").text('Presion');
       $("#tab1tab2glucotex").text('Glucotex');
       $("#tab1tab3menstruacion").text('Ult. Menstruacion');
       $("#tab1tab3pap").text('Ult. PAP');
       $("#tab1tab5observaciones").text('Observaciones');
       $("#tab1tab5motivo").text('Motivo de Visita');
       $("#btnmodalsignoscerrar").text('Cerrar');
       $("#btnmodalsignosguardar").text('Guardar Cambios');

       $("#mdlsignosvitalesencabezado12").text('SIGNOS VITALES');
       $("#mdlsignosvitalesencabezado22").text('FICHA DE CONSULTA');
       $("#tab1signosvitales12").text('FICHA DE CONSULTA');
       $("#tab1signosvitales22").text('DATOS GENERALES');
       $("#tab1signosvitales32").text('USO GINECOLOGICO');
       $("#tab1signosvitales42").text('USO PEDIATRICO');
       $("#tab1signosvitales52").text('OTROS');
       $("#tab1tab1paciente2").text('Paciente');
       $("#tab1tab1medico2").text('Medico');
       $("#tab1tab1especialidad2").text('Especialidad');
       $("#tab1tab1fecha2").text('Fecha');
       $("#tab1tab2peso2").text('Peso');
       $("#tab1tab2altura2").text('Altura');
       $("#tab1tab2temperatura2").text('Temperatura');
       $("#tab1tab2fr2").text('F/R');
       $("#tab1tab2pulso2").text('Pulso');
       $("#tab1tab2presion2").text('Presion');
       $("#tab1tab2glucotex2").text('Glucotex');
       $("#tab1tab3menstruacion2").text('Ult. Menstruacion');
       $("#tab1tab3pap2").text('Ult. PAP');
       $("#tab1tab5observaciones2").text('Observaciones');
       $("#tab1tab5motivo2").text('Motivo de Visita');
       $("#btnmodalsignoscerrar2").text('Cerrar');
       $("#btnmodalsignosguardar2").text('Guardar Cambios');
<?php }else
  { ?>
       $("#btnconsulta").text('Doctor Appointment');
       $("#encabezadomodal1").text('New Doctor Appointment');
       $("#encabezadomodal2").text('ENTER THE REQUIRED DATA');
       $("#FechaModal1").text('Date');
       $("#MedicoModal1").text('Doctor');
       $("#PacienteModal1").text('Patient Name');
       $("#ModuloModal1").text('Speciality Name');
       $("#btncerrarmodal1").text('Close');
       $("#btnguardarmodal1").text('Save Changes');
       $("#tablaconsultas").text('History of Medical Consultations');
       $("#tabla1columna1").text('Date');
       $("#tabla1columna2").text('Patient Name');
       $("#tabla1columna3").text('Doctor Name');
       $("#tabla1columna4").text('Speciality Name');
       $("#tabla1columna5").text('Action');

       
       $("#mdlsignosvitalesencabezado1").text('VITAL SINGS');
       $("#mdlsignosvitalesencabezado2").text('ENTER THE REQUIRED DATA');
       $("#tab1signosvitales1").text('MEDICAL CONSULTION');
       $("#tab1signosvitales2").text('GENERAL DATA');
       $("#tab1signosvitales3").text('GYNECOLOGICAL USE');
       $("#tab1signosvitales4").text('PEDIATRIC USE');
       $("#tab1signosvitales5").text('OTHERS');
       $("#tab1tab1paciente").text('Patient Name');
       $("#tab1tab1medico").text('Doctor');
       $("#tab1tab1especialidad").text('Speciality Name');
       $("#tab1tab1fecha").text('Date');
       $("#tab1tab2peso").text('Weight');
       $("#tab1tab2altura").text('Height');
       $("#tab1tab2temperatura").text('Temperature');
       $("#tab1tab2fr").text('F/R');
       $("#tab1tab2pulso").text('Pulse');
       $("#tab1tab2presion").text('Pressure');
       $("#tab1tab2glucotex").text('Glucotex');
       $("#tab1tab3menstruacion").text('Last Menstrua.');
       $("#tab1tab3pap").text('Last PAP');
       $("#tab1tab5observaciones").text('Observations');
       $("#tab1tab5motivo").text('Reason for Visit');
       $("#btnmodalsignoscerrar").text('Close');
       $("#btnmodalsignosguardar").text('Save Changes');

       $("#mdlsignosvitalesencabezado12").text('VITAL SINGS');
       $("#mdlsignosvitalesencabezado22").text('MEDICAL FORM');
       $("#tab1signosvitales12").text('MEDICAL CONSULTION');
       $("#tab1signosvitales22").text('GENERAL DATA');
       $("#tab1signosvitales32").text('GYNECOLOGICAL USE');
       $("#tab1signosvitales42").text('PEDIATRIC USE');
       $("#tab1signosvitales52").text('OTHERS');
       $("#tab1tab1paciente2").text('Patient Name');
       $("#tab1tab1medico2").text('Doctor');
       $("#tab1tab1especialidad2").text('Speciality Name');
       $("#tab1tab1fecha2").text('Date');
       $("#tab1tab2peso2").text('Weight');
       $("#tab1tab2altura2").text('Height');
       $("#tab1tab2temperatura2").text('Temperature');
       $("#tab1tab2fr2").text('F/R');
       $("#tab1tab2pulso2").text('Pulse');
       $("#tab1tab2presion2").text('Pressure');
       $("#tab1tab2glucotex2").text('Glucotex');
       $("#tab1tab3menstruacion2").text('Last Menstrua.');
       $("#tab1tab3pap2").text('Last PAP');
       $("#tab1tab5observaciones2").text('Observations');
       $("#tab1tab5motivo2").text('Reason for Visit');
       $("#btnmodalsignoscerrar2").text('Close');
       $("#btnmodalsignosguardar2").text('Save Changes');
  <?php } ?>
 });
</script>