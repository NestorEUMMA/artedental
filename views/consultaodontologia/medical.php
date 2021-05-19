<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* OBTENEMOS EL ID DEL MODELO YII2 */
$id = $model->IdConsulta;
/* CONEXION A MYSQL PARA LAS CONSULTAS*/
include '../include/dbconnect.php';
/* CONEXION A SYBASE (MTCORPORATIVO) */
// include '../include/dbconnectsybase.php';
/* AGREGA TODOS LOS QUERYS DE LAS TABLAS */
include  'querystabla.php';

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->persona->fullName;
$this->params['breadcrumbs'][] = ['label' => $label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

/* AGREGA EL STYLE DE LOS MODALES Y LOS VALIDACIONES */
include  'styles.php';

?>

<link href="../template/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="../template/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="../css/base.css" rel="stylesheet">
<script src="../template/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<div class="wrapper wrapper-content animated fadeIn">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5 id='encabezadoform1'></h5>&nbsp;&nbsp;<small id='encabezadoform2'></small>
               <div class="ibox-tools">
               </div>
            </div>
            <div class="form-horizontal">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#tab-CONSULTA" id='tabgeneral1'></a></li>
                     <li class=""><a data-toggle="tab" href="#tab-EXPEDIENTE" id='tabgeneral2'></a></li>
                     <li class=""><a data-toggle="tab" href="#tab-HISTORIAL" id='tabgeneral3'></a></li>
                     <!-- <li class=""><a data-toggle="tab" href="#tab-MEDICAMENTO" id='tabgeneral4'></a></li> -->
                     <li class="pull-right">
                     <button type='button' id='btn" . <?php $idconsulta ?> . "' class='btn  btn-success dim btn-btnconsulta' >Consulta <i
                              class="fa fa-user-md"></i></button>
                     <button type="button" class="btn  btn-primary dim" data-toggle="modal"
                           data-target="#modalGuardarPlantratamiento">Plan de Tratamiento <i
                              class="fa fa-user-md"></i></button>
                        </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-content">
                        <!--  TABLA DE CONSULTA AQUI ESTAN LOS PANELES DE VISITA, INFORMACION GENERAL, GINECOLOGIA PEDIATRIA, OTROS E INFO MEDICO -->
                        <div id="tab-CONSULTA" class="tab-pane active">
                           <div class="panel-body">
                              <div class="tabs-container">
                                 <ul class="nav nav-tabs">
                                    <li class=""><a data-toggle="tab" href="#tab-6" id='tab1signosvitales1'>FICHA
                                          DE CONSULTA</a></li>
                                    <li class="active"><a data-toggle="tab" href="#tab-7" id=''>ODONTOGRAMA</a></li>
                                 </ul>
                                 <form class="form-horizontal">
                                    <div class="tab-content">
                                       <div id="tab-6" class="tab-pane ">
                                          <div class="panel-body">
                                             <div class="form-group hidden">
                                                <div class="col-sm-5"><input type="text" name="txtIdConsulta"
                                                      id="idconsulta"></div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid"
                                                      value="<?php echo $idpersona ?>"> </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label"
                                                      id='tab1tab1paciente'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled"
                                                         value="<?php echo $idpersona ?>" name="txtPaciente"
                                                         disabled="disabled">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label"
                                                      id='tab1tab1medico'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                      <input type="text" class="form-control"
                                                         value="<?php echo $idusuario ?>" disabled="disabled"
                                                         name="txtMedico" disabled="disabled">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">

                                                <?php if ($_SESSION['IdIdioma'] == 1) {
                                                ?>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label"
                                                      id='tab1tab1especialidad'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-plus-square-o"></i>
                                                      </div>
                                                      <input type="text" class="form-control"
                                                         value="<?php echo $idmodulo ?>" disabled="disabled"
                                                         name="txtMedico" disabled="disabled">
                                                   </div>
                                                </div>
                                                <?php } else { ?>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label"
                                                      id='tab1tab1especialidad'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-plus-square-o"></i>
                                                      </div>
                                                      <input type="text" class="form-control"
                                                         value="<?php echo $idmoduloing ?>" disabled="disabled"
                                                         name="txtMedico" disabled="disabled">
                                                   </div>
                                                </div>
                                                <?php } ?>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label"
                                                      id='tab1tab1fecha'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                      </div>
                                                      <input type="text" class="form-control"
                                                         value="<?php echo $fechaconsulta ?>" disabled="disabled"
                                                         name="txtfecha" disabled="disabled">
                                                   </div>
                                                </div>
                                             </div>
                                             <br>
                                             <!-- <div class="box-header with-border">
                                                <h4 class="box-title" id='tblexamenasignado'></h4>
                                             </div> -->
                                             <!-- TABLA DE ASIGNACION DE EXAMENES -->
                                             <!-- <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th style = 'width:150px' id='tblexamenasignadoexamen'>Tipo de Examen</th>";
                                                echo "<th id='tblexamenasignadomedico'>Medico</th>";
                                                echo "<th id='tblexamenasignadoindicacion'>Indicacion</th>";
                                                echo "<th style = 'width:150px' id='tblexamenasignadoaccion'>Accion</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                if ($_SESSION['IdIdioma'] == 1) {
                                                   while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                                                      $idexamenasignado = $row['IdListaExamen'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['NombreExamen'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Indicacion'] . "</td>";
                                                      echo "<td><a style='width:140px'  class='btn  btn-danger dim' href='../../views/consultamedico/eliminarexamenasignado.php?did=" . $idexamenasignado . "'>Eliminar</a></td>";
                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
                                                } else {
                                                   while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                                                      $idexamenasignado = $row['IdListaExamen'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['NombreExamening'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Indicacion'] . "</td>";
                                                      echo "<td><a style='width:140px'  class='btn  btn-danger dim' href='../../views/consultamedico/eliminarexamenasignado.php?did=" . $idexamenasignado . "'>Delete</a></td>";
                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
                                                }

                                                ?>
                                             </table> -->
                                          </div>
                                       </div>
                                       <div id="tab-7" class="tab-pane active">
                                          <div class="panel-body">
                                             <div class="row">
                                                <div id="tr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                                <div id="tl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                                <div id="tlr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                                </div>
                                                <div id="tll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div id="blr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                                </div>
                                                <div id="bll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                                <div id="br" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                                <div id="bl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                   <div class="panel panel-default">
                                                      <div class="panel-body">
                                                         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                                                            <div style="height: 20px; width:20px; display:inline-block;"
                                                               class="click-red"></div>
                                                            = Fractura/Carie
                                                            <br>
                                                            <div style="height: 5px; width:20px; display:inline-block;"
                                                               class="click-red"></div>
                                                            = Puente Entre Piezas
                                                         </div>
                                                         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                                                            <div style="height: 20px; width:20px; display:inline-block;"
                                                               class="click-blue"></div>
                                                            = Obturación
                                                         </div>
                                                         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
                                                            <span style="display:inline:block;"> Pieza Extraída</span> =
                                                            <img style="display:inline:block;"
                                                               src="../template/img/extraccion.png">
                                                            <br> Idicada Para Extracción = <i style="color:red;"
                                                               class="fa fa-times fa-2x"></i>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div id="tab-EXPEDIENTE" class="tab-pane">
                           <div class="panel-body">
                              <div class="tabs-container">
                                 <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#EXPDATOGEN" id='tabexpediente19'></a>
                                    </li>
                                    <li class=""><a data-toggle="tab" href="#EXPRESPON" id='tabexpediente20'></a></li>
                                    <li class=""><a data-toggle="tab" href="#EXPGEN" id=''>EVALUACION DENTAL
                                          INFANTIL</a></li>
                                 </ul>
                                 <div class="tab-content">
                                    <div id="EXPDATOGEN" class="tab-pane active">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label for="txtNombres" class="col-sm-2 control-label"
                                                id='tabexpediente1'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtNombres"
                                                      name="txtNombres" disabled="disabled" required=""
                                                      value="<?php echo $nombres ?>">
                                                </div>
                                             </div>
                                             <label for="txtApellidos" class="col-sm-2 control-label"
                                                id='tabexpediente2'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidos"
                                                      name="txtApellidos" disabled="disabled" required=""
                                                      value="<?php echo $apellidos ?>">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtFechaNacimiento" class="col-sm-2 control-label"
                                                id='tabexpediente3'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                   <input type="text" class="form-control"
                                                      data-inputmask="'alias': 'yyyy/mm/dd'" data-mask
                                                      name="txtFechaNacimiento" id="txtFechaNacimiento" required=""
                                                      value="<?php echo $fnacimiento ?>" disabled="disabled">
                                                </div>
                                             </div>
                                             <label for="txtGenero" class="col-sm-2 control-label"
                                                id=''>Edad</label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                                   <input type="text" class="form-control" name=""
                                                      id="" value="Años: <?php echo $anios ?>, Meses: <?php echo $meses?>, Dias: <?php echo $dias ?>"  disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                          <label for="txtGenero" class="col-sm-2 control-label"
                                                id='tabexpediente4'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                                   <input type="text" class="form-control" name="txtFechaNacimiento"
                                                      id="txtGenero" value="<?php echo $genero ?>" disabled="disabled">
                                                </div>
                                             </div>
                                             <label for="txtDireccion" class="col-sm-2 control-label"
                                                id='tabexpediente7'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
                                                   <input type="text" class="form-control" id="txtDireccion"
                                                      name="txtDireccion" required="" value="<?php echo $direccion ?>"
                                                      disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtTelefono" class="col-sm-2 control-label"
                                                id='tabexpediente8'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-phone-square"></i>
                                                   </div>
                                                   <input type="text" class="form-control" data-mask="9999-9999"
                                                      id="txtTelefono" name="txtTelefono"
                                                      value="<?php echo $telefono ?>" disabled="disabled" />
                                                </div>
                                             </div>
                                             <label for="txtCelular" class="col-sm-2 control-label"
                                                id='tabexpediente9'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                                   <input type="text" class="form-control" data-mask="9999-9999"
                                                      id="txtCelular" name="txtCelular" value="<?php echo $celular ?>"
                                                      disabled="disabled" />
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtCorreo" class="col-sm-2 control-label"
                                                id='tabexpediente10'></label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                   <input type="text" value="<?php echo $correo ?>" disabled="disabled"
                                                      class="form-control" id="txtCorreo" name="txtCorreo"
                                                      data-parsley-trigger="change">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="EXPRESPON" class="tab-pane">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label for="txtNombresResponsable" class="col-sm-2 control-label"
                                                id='tabexpediente11'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtNombresResponsable"
                                                      value="<?php echo $nombreResponsable ?>" disabled="disabled"
                                                      name="txtNombresResponsable" />
                                                </div>
                                             </div>
                                             <label for="txtApellidosResponsable" class="col-sm-2 control-label"
                                                id='tabexpediente12'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable"
                                                      value="<?php echo $apellidoResponsable ?>" disabled="disabled"
                                                      name="txtApellidosResponsable" />
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtParentesco" class="col-sm-2 control-label"
                                                id='tabexpediente13'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable"
                                                      value="<?php echo $parentesco ?>" disabled="disabled"
                                                      name="txtApellidosResponsable" />
                                                </div>
                                             </div>
                                             <label for="txtDuiResponsable" class="col-sm-2 control-label"
                                                id='tabexpediente14'> </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-credit-card"></i>
                                                   </div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable"
                                                      value="<?php echo $duiresponsable ?>" disabled="disabled"
                                                      name="txtApellidosResponsable" />
                                                </div>
                                             </div>

                                          </div>
                                          <div class="form-group">
                                             <label for="txtTelefonoResponsable" class="col-sm-2 control-label"
                                                id='tabexpediente15'></label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-phone-square"></i>
                                                   </div>
                                                   <input type="text" value="<?php echo $telefonoresponsable ?>"
                                                      disabled="disabled" class="form-control"
                                                      data-inputmask='"mask": "9999-9999"' data-mask
                                                      id="txtTelefonoResponsable" name="txtTelefonoResponsable" />
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="EXPGEN" class="tab-pane">
                                       <div class="panel-body">
                                          <h4>GESTACION</h4>
                                          <div id="gestacion"></div>
                                          <div class="panel-body">
                                             <h4>NACIMIENTO</h4>
                                             <div id="nacimiento"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>INFANCIA</h4>
                                             <div id="infancia"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>AMAMANTAMIENTO</h4>
                                             <div id="amamantamiento"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>ALIMENTACION</h4>
                                             <div id="alimentacion"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>ENDULZANTES</h4>
                                             <div id="endulzantes"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>ALIMENTACION NOCTURNA</h4>
                                             <div id="alimentacionnocturna"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>HIGIENE NOCTURNA</h4>
                                             <div id="higienenocturna"></div>
                                          </div>
                                          <div class="panel-body">
                                             <h4>PRIMERA VISITA</h4>
                                             <div id="primeravisita"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="tab-HISTORIAL" class="tab-pane">
                           <div class="panel-body">
                              <div class="tabs-container">
                                 <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#HISTDATOGEN"
                                          id='tab2historial1'>CONSULTAS</a></li>
                                    <li class=""><a data-toggle="tab" href="#HISTPLAN"
                                          id=''>PLAN DE TRATAMIENTO</a></li>
                                 </ul>
                                 <div class="tab-content">
                                    <div id="HISTDATOGEN" class="tab-pane active">
                                       <div class="panel-body">
                                          <div class="box-header with-border">
                                             <h3 class="box-title" id='tab2historialconsultabla6'>HISTORIAL DE CONSULTAS
                                             </h3>
                                          </div>
                                          <!-- /.box-header -->
                                          <div class="box-body">
                                             <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th id=''>N°</th>";
                                                echo "<th id=''>PACIENTE</th>";
                                                echo "<th id=''>DORTOR</th>";
                                                echo "<th id=''>ESPECIALIDAD</th>";
                                                echo "<th id=''>FECHA</th>";
                                                echo "<th style = 'width:150px' id=''>ACCION</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                $nr = 0;
                                                   while ($row = $resultadotablaconsulta->fetch_assoc()) {
                                                      $nr ++;
                                                      $IdConsulta = $row['IdConsulta'];
                                                      echo "<tr>";
                                                      echo "<td>".$nr."</td>";
                                                      echo "<td>" . $row['Paciente'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Especialidad'] . "</td>";
                                                      echo "<td>" . $row['FechaConsulta'] . "</td>";
                                                      echo "<td width='100'>" .
                                                         "<span id='btn" . $IdConsulta . "' class='btn-xs btn-success btn-cargarconsulta'><i class='fa fa-search'></i></span>
                                                         <span id='btn" . $IdConsulta . "' class='btn-xs btn-danger btn-eliminarconsulta'><i class='fa fa-remove'></i></span>" .
                                                         "</td>";
                                                      }

                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   

                                                ?>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="HISTPLAN" class="tab-pane">
                                       <div class="panel-body">
                                          <div class="box-header with-border">
                                             <h3 class="box-title" id=''>HISTORIAL DE PLANES DE TRATAMIENTO
                                             </h3>
                                          </div>
                                          <!-- /.box-header -->
                                          <div class="box-body">
                                          <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th id=''>N°</th>";
                                                echo "<th id=''>PACIENTE</th>";
                                                echo "<th id=''>FECHA</th>";
                                                echo "<th id=''>HORA</th>";
                                                echo "<th id=''>ACCION</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                $nr = 0;
                                                while ($row = $resultadotablaplantratamientohistorico->fetch_assoc()) {
                                                   $nr ++;
                                                   $IdPlanTratamiento = $row['IdPlanTratamiento'];
                                                   echo "<tr>";
                                                   echo "<td>".$nr."</td>";
                                                   echo "<td>".$row['NombreCompleto']."</td>";
                                                   echo "<td>".$row['Fecha']."</td>";
                                                   echo "<td>".$row['Hora']."</td>";
                                                   echo "<td width='100'>" .
                                                   "<span id='btn" . $IdPlanTratamiento . "' class='btn-xs btn-success btn-histver'><i class='fa fa-search'></i></span>
                                                    <span id='btn" . $IdPlanTratamiento . "' class='btn-xs btn-danger btn-histeli'><i class='fa fa-remove'></i></span>" .
                                                   "</td>";
                                                }
                                                echo "</tr>";
                                                echo "</body>  ";
                                                ?>
                                          </table> 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </br>
            <center>
               <form class="form-horizontal" action="../../views/consultaodontologia/finalizarconsulta.php"
                  method="POST">
                  <div class="hidden">
                     <textarea type="text" rows="1" class="form-control"
                        name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                  </div>
                  <div class="hidden">
                     <textarea type="text" rows="1" class="form-control"
                        name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                  </div>
                  <button type="submit" class="btn btn-success dim" id='btnfinalizarconsulta'></button>
               </form>
            </center>
         </div>
      </div>
   </div>
</div>
<script src="../template/js/plugins/daterangepicker/daterangepicker.js"></script>
<?php
/* AGREGA TODOS LOS MODALES */
include 'modals.php';
/* AGREGA TODOS LOS SCRIPTS */
include 'scripts.php';
?>