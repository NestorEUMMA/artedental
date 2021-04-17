<?php
include '../include/dbconnect.php';

  $querydepartamentos = "SELECT IdGeografia,Nombre from geografia where Nivel='1' order by Nombre";
  $resultadodepartamentos = $mysqli->query($querydepartamentos);

  $queryestadocivil = "SELECT * from estadocivil ";
  $resultadoestadocivil = $mysqli->query($queryestadocivil);

  $queryPais = "SELECT IdPais,NombrePais FROM pais";
  $resultPais = $mysqli->query($queryPais);

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = 'Nuevo Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<link href="../template/css/plugins/select2/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="../template/parsley/parsley.css">
<link href="../template/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
<link href="../template/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="../template/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<script src="../template/parsley/parsley.min.js"></script>
<script src="../template/i18n/es.js"></script>
<script src="../template/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="../template/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <style type="text/css">
    .box-solid .box-body{ min-height: 300px;}
   </style>
<div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                  <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>INGRESO DE EXPEDIENTE <small>INGRESE LOS DATOS REQUERIDOS.  </small></h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <form  action="../../views/persona/guardar.php" method="post" id="demo-form" data-parsley-validate="">
                    <div class="form-horizontal" role="form">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> DATO GENERAL</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">RESPONSABLE</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3">DATO MEDICO</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4">SOCIOECONOMICO</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-5">HISTORIAL CLINICO</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-6">ESQUEMA DE VACUNACION</a></li>
                            <li class="pull-right">
                                <button type="submit" class="btn btn-primary dim" name="guardarPaciente"><i class="fa fa-check"></i></button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                  <div class="form-group">
                                      <label for="txtNombres" class="col-sm-1 control-label">Nombres</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input type="text" class="form-control" id="txtNombres" name="txtNombres" required="">
                                        </div>
                                      </div>

                                      <label for="txtApellidos" class="col-sm-1 control-label">Apellidos</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" required="" >
                                        </div>
                                      </div>
                                    </div>

                                      <div class="form-group">
                                      <label for="txtFechaNacimiento" class="col-sm-1 control-label">Nacimiento</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaNacimiento" id="txtFechaNacimiento" required="">
                                        </div>
                                      </div>
                                      <label for="txtGenero" class="col-sm-1 control-label">Genero</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                          <select class="form-control select2" style="width: 100%;" name="txtGenero" id="txtGenero" required="required">
                                            <option value=""></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                          </select>
                                        </div>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                      <label for="txtIdEstadoCivil" class="col-sm-1 control-label">Estado Civil</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                            <select class="form-control select2" style="width: 100%;" id="txtIdEstadoCivil" name="txtIdEstadoCivil" required="">
                                              <option value=""></option>
                                              <?php
                                                while ($row = $resultadoestadocivil->fetch_assoc()) {
                                                  echo "<option value = '".$row['IdEstadoCivil']."'>".$row['Nombre']."</option>";
                                                }
                                              ?>
                                            </select>
                                        </div>
                                      </div>

                                      <label for="txtDui" class="col-sm-1 control-label">Dui</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                          <input type="text" class="form-control" data-mask="99999999-9" name="txtDui" id="username"  >
                                          <center><div id="Info"></div></center>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtIdPais" class="col-sm-1 control-label">Pais</label>
                                        <div class="col-sm-5">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                            <select class="form-control select2" style="width: 100%;" id="txtIdPais" name="txtIdPais" required="">
                                              <option value=""></option>
                                              <?php
                                                while ($row = $resultPais->fetch_assoc()) {
                                                  $idPais = ($row['IdPais'] == 54)? 'selected':'';
                                                  echo "<option $idPais value = '".$row['IdPais']."'>".$row['NombrePais']."</option>";
                                                }
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                        <label for="txtDepartamento" class="col-sm-1 control-label">Departamento</label>
                                        <div class="col-sm-5">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                            <select class="form-control select2" style="width: 100%;" id="txtDepartamento" name="txtDepartamento" required="" >
                                              <option value=""></option>
                                              <?php
                                                while ($row = $resultadodepartamentos->fetch_assoc()) {
                                                  echo "<option value = '".$row['IdGeografia']."'>".$row['Nombre']."</option>";
                                                }
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                        </div>
                                         <div class="form-group">
                                        <label for="txtMunicipio" class="col-sm-1 control-label">Municipio</label>
                                        <div class="col-sm-5">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                            <select class="form-control select2" style="width: 100%;" id="txtMunicipio" name="txtMunicipio" required=""></select>
                                          </div>
                                        </div>

                                        <label for="txtCanton" class="col-sm-1 control-label">Cantón</label>
                                        <div class="col-sm-5">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                            <select class="form-control select2" style="width: 100%;" name="txtCanton" id="txtCanton"></select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                    <label for="txtDireccion" class="col-sm-1 control-label">Dirección</label>
                                    <div class="col-sm-11">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
                                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="">
                                      </div>
                                    </div>
                                  </div>

                                      <div class="form-group">
                                        <label for="txtTelefono" class="col-sm-1 control-label">Teléfono</label>
                                        <div class="col-sm-2">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                            <input type="text" class="form-control"  data-mask="9999-9999" id="txtTelefono" name="txtTelefono" />
                                          </div>
                                        </div>

                                        <label for="txtCelular" class="col-sm-1 control-label">Celular</label>
                                        <div class="col-sm-2">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                            <input type="text" class="form-control" data-mask="9999-9999" id="txtCelular" name="txtCelular" />
                                          </div>
                                        </div>
                                        <label for="txtCorreo" class="col-sm-1 control-label">Correo</label>
                                        <div class="col-sm-5">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                            <input type="text" class="form-control" id="txtCorreo" name="txtCorreo"  data-parsley-trigger="change">
                                          </div>
                                        </div>
                                      </div>


                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="form-group">
                                      <label for="txtNombresResponsable" class="col-sm-1 control-label">Nombres</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input type="text" class="form-control" id="txtNombresResponsable"  name="txtNombresResponsable"/>
                                        </div>
                                      </div>

                                      <label for="txtApellidosResponsable" class="col-sm-1 control-label">Apellidos</label>
                                      <div class="col-sm-5">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input type="text" class="form-control" id="txtApellidosResponsable"  name="txtApellidosResponsable"/>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtParentesco" class="col-sm-1 control-label">Parentesco</label>
                                        <div class="col-sm-2">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                            <select class="form-control" id="txtParentesco" name="txtParentesco">
                                                <option value=""></option>
                                                <option value="ESPOSO">ESPOSO</option>
                                                <option value="ESPOSA">ESPOSA</option>
                                                <option value="MADRE">MADRE</option>
                                                <option value="PADRE">PADRE</option>
                                                <option value="ABUELO">ABUELO</option>
                                                <option value="ABUELA">ABUELA</option>
                                                <option value="TIO">TIO</option>
                                                <option value="TIA">TIA</option>
                                                <option value="HERMANO">HERMANO</option>
                                                <option value="HERMANA">HERMANA</option>
                                                <option value="PRIMO">PRIMO</option>
                                                <option value="PRIMA">PRIMA</option>
                                                <option value="NINGUNO">NINGUNO</option>
                                            </select>
                                          </div>
                                        </div>
                                        <label for="txtDuiResponsable" class="col-sm-1 control-label">Dui Responsable</label>
                                        <div class="col-sm-2">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                            <input type="text" class="form-control" data-mask="99999999-9" data-mask name="txtDuiResponsable" id="txtDuiResponsable" >
                                          </div>
                                        </div>
                                        <label for="txtTelefonoResponsable" class="col-sm-1 control-label">Telefono</label>
                                        <div class="col-sm-2">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                            <input type="text" class="form-control"  class="form-control" data-mask="9999-9999" data-mask id="txtTelefonoResponsable" name="txtTelefonoResponsable" />
                                          </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="txtEnfermedad" class="col-sm-2 control-label">Enfermedades:</label>
                                          <div class="col-sm-10">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                              <textarea type="text" rows="3" class="form-control" id="txtEnfermedad" name="txtEnfermedad" data-parsley-maxlength="100"></textarea>
                                            </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="txtAlergias" class="col-sm-2 control-label">Alergias:</label>
                                          <div class="col-sm-10">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                              <textarea type="text" rows="3" class="form-control" id="txtAlergias" name="txtAlergias" data-parsley-maxlength="100"></textarea>
                                            </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="txtMedicamentos" class="col-sm-2 control-label">Medicamentos:</label>
                                          <div class="col-sm-10">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                              <textarea type="text" rows="3" class="form-control" id="txtMedicamentos"  name="txtMedicamentos" data-parsley-maxlength="100"></textarea>
                                            </div>
                                          </div>
                                      </div>  
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                    <div class="pull-right">
                                          <label for="txtCategoria" class="col-sm-6 control-label">Categoría:</label>
                                          <div class="col-sm-6">
                                            <select class="form-control" id="txtCategoria" name="txtCategoria">
                                              <option value=""></option>
                                              <option value="A">A</option>
                                              <option value="B">B</option>
                                              <option value="C">C</option>
                                              <option value="D">D</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div id="test"></div>
                                </div>
                            </div>
                            <div id="tab-5" class="tab-pane">
                                <div class="panel-body">
                                    <div id="historialclinico"></div>
                                </div>
                            </div>
                            <div id="tab-6" class="tab-pane">
                                <div class="panel-body">
                                    <div id="vacunacion"></div>
                                    <div>
                                    <div class="col-sm-12">
                                    <center><h3>VESTIBULAR</h3></center>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="col-sm-1"><center>18</center>  
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div> 
                                      <div class="col-sm-1"><center>17</center>  
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>16</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>15</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div> 
                                      <div class="col-sm-1"><center>14</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>13</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>12</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>11</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div> 
                                      <div class="col-sm-1"></div>            
                                    </div>
                                    <div class="col-sm-12">  
                                      <div class="col-sm-1"><center>55</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>54</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>53</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>52</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1"><center>51</center>
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div> 
                                      <div class="col-sm-1"></div>            
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="col-sm-4"></div>
                                      <div class="col-sm-1">21
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div> 
                                      <div class="col-sm-1">22
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1">23
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1">24
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1">25
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1">26
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div> 
                                      <div class="col-sm-1">27
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>   
                                      <div class="col-sm-1">28
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>           
                                    </div>
                                    
                                    <div class="col-sm-6">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-1">61</div>
                                      <div class="col-sm-1">62</div>  
                                      <div class="col-sm-1">63</div>  
                                      <div class="col-sm-1">64</div>  
                                      <div class="col-sm-1">65</div>
                                      <div class="col-sm-6"></div>            
                                    </div>
                                    <div class="col-sm-4">
                                    <center><h3>DERECHO</h3></center>
                                    </div>
                                    <div class="col-sm-4">
                                    <center><h3>LINGUALES</h3></center>
                                    </div>
                                    <div class="col-sm-4">
                                    <center><h3>IZQUIERDO</h3></center>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="col-sm-6"></div>  
                                      <div class="col-sm-1">85
                                        <br>
                                        <select  class='form-control select3'>
                                          <option value='No'>No</option>
                                          <option value='Si'>Si</option>
                                      </select>
                                      </div>  
                                      <div class="col-sm-1">84</div>  
                                      <div class="col-sm-1">83</div>  
                                      <div class="col-sm-1">82</div>  
                                      <div class="col-sm-1">81</div>
                                      <div class="col-sm-1"></div>            
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-1">71 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                                      <div class="col-sm-1">72 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">73 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">74 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">75 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                                      <div class="col-sm-6"></div>            
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="col-sm-3"></div>
                                      <div class="col-sm-1">48 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                                      <div class="col-sm-1">47 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">46 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">45 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">44 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">43 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">42 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">41 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                                      <div class="col-sm-1"></div>            
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="col-sm-1"></div>
                                      <div class="col-sm-1">31 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                                      <div class="col-sm-1">32 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">33 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">34 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">35 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">36 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">37 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>  
                                      <div class="col-sm-1">38 <br><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                                      <div class="col-sm-3"></div>            
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

</div>
<script src="../template/js/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

  $(function () {
    $('#demo-form').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
      return true;
    });
  });

  $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });

    $.post( "../../views/persona/test.php", { IdFactor: 1})
      .done(function( data ) {
        $("#test").html(data);

    });


  $('#username').blur(function(){ 
    $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

    var username = $(this).val();   
    var dataString = 'username='+username;
    
    $.ajax({
            type: "POST",
            url: "../../views/persona/check.php",
             data: dataString,
            success: function

            (data) {
        $('#Info').fadeIn(1000).html(data);
        //alert(data);
            }
        });
    });              

      $.post( "../../views/persona/test.php", { IdFactor: 2})
      .done(function( data ) {
        $("#historialclinico").html(data);
        $(".select3").select2();
        $(".select2-container").css("width","100%");
      });

      $.post( "../../views/persona/test.php", { IdFactor: 3})
      .done(function( data ) {
        $("#vacunacion").html(data);
        $(".select3").select2();
        $(".select2-container").css("width","100%");
      });



      $("#txtDepartamento").change(function(){

        //alert($("#cboGeografia").val());
        var id = '';
        id = $("#txtDepartamento").val();

        $.ajax({
          url: '../../views/persona/Municipios.php',
          type: 'POST',
          dataType: 'json',
          data: { 'IdGeografia': id },
          beforeSend: function() { },
          success: function(data) {

              $("#txtMunicipio").empty();

              var opcs = "<option value=''></option>";
              $.each(data, function(i,v){
                  opcs += "<option value='" + v.IdGeografia + "'>" + v.Nombre + "</option>";
              });
              $("#txtMunicipio").html(opcs).select2().val(null);

          },
          error: function(xhr, textStatus, errorThrown) {

          }
        });

      });


      $("#txtMunicipio").change(function(){

        //alert($("#cboGeografia").val());
        var id = '';
        id = $("#txtMunicipio").val();

        $.ajax({
          url: '../../views/persona/Municipios.php',
          type: 'POST',
          dataType: 'json',
          data: { 'IdGeografia': id },
          beforeSend: function() { },
          success: function(data) {

              $("#txtCanton").empty();
              $("#txtCanton span.select2-selection__rendered").html("");
              var opcs = "";
              $.each(data, function(i,v){
                  opcs += "<option value='" + v.IdGeografia + "'>" + v.Nombre + "</option>";
              });
              $("#txtCanton").html(opcs);

          },
          error: function(xhr, textStatus, errorThrown) {

          }
        });

      });

      $("#txtMunicipio").select2();

      $(".select2_demo_1").select2();
      $(".select2_demo_2").select2();
      $(".select2_demo_3").select2({
          placeholder: "Select a state",
          allowClear: true
      });
  });

</script>

