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
<link href="../css/base.css" rel="stylesheet">
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
                        <!-- <li class=""><a data-toggle="tab" href="#tab-3">DATO MEDICO</a></li>
                           <li class=""><a data-toggle="tab" href="#tab-4">SOCIOECONOMICO</a></li>
                           <li class=""><a data-toggle="tab" href="#tab-5">HISTORIAL CLINICO</a></li> -->
                        <li class=""><a data-toggle="tab" href="#tab-6">EVALUACION DENTAL INFANTIL</a></li>
                        <!-- <li class=""><a data-toggle="tab" href="#tab-7">ORTOGRAMA</a></li> -->
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
                           <div class="tabs-container">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#tab-11">HISTORIAL CLINICO</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-12">ESQUEMA DE VACUNACION</a></li>
                                 <li class="pull-right">
                                    <button type="submit" class="btn btn-primary dim" name="guardarPaciente"><i class="fa fa-check"></i></button>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div id="tab-11" class="tab-pane">
                                    <div class="panel-body">
                                       <div id="historialclinico"></div>
                                    </div>
                                 </div>
                                 <div id="tab-12" class="tab-pane">
                                    <div class="panel-body">
                                       <h4>ESQUEMA DE VACUNACION</h4>
                                       <div id="vacunacion"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="tab-6" class="tab-pane">
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
                           </div>
                        </div>
                        <div id="tab-7" class="tab-pane">
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-10 col-md-offset-1">
                                    <div id="controls" class="panel panel-default">
                                       <div class="panel-body">
                                          <div class="btn-group" data-toggle="buttons">
                                             <div class="col-sm-2">
                                                <label id="fractura" class="btn btn-danger active">
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked>Fractura</label>
                                             </div>
                                             <div class="col-sm-2">
                                                <label id="restauracion" class="btn btn-primary">
                                                <input type="radio" name="options" id="option2" autocomplete="off">Obturación
                                                </label>
                                             </div>
                                             <div class="col-sm-2">
                                                <label id="extraccion" class="btn btn-warning">
                                                <input type="radio" name="options" id="option3" autocomplete="off">Extracción
                                                </label>
                                             </div>
                                             <div class="col-sm-2">
                                                <label id="extraer" class="btn btn-warning">
                                                <input type="radio" name="options" id="option4" autocomplete="off">A Extraer
                                                </label>
                                             </div>
                                             <div class="col-sm-2">
                                                <label id="puente" class="btn btn-primary">
                                                <input type="radio" name="options" id="option5" autocomplete="off">Puente
                                                </label>
                                             </div>
                                             <div class="col-sm-2">
                                                <label id="borrar" class="btn btn-default">
                                                <input type="radio" name="options" id="option6" autocomplete="off">Borrar
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- TR, TL, TLR, TLL TODO LO QUE ESTA DENTRO DE ESOS IDS SE SUSTITUYE CON 
                                    LA FUNCION DE JAVA PARA REEMPLAZAR LA PALABRA INDEX POR EL NUMERO QUE LE CORRESPONDE DE LA FILA, LUEGO 
                                    SE HACE UN BARRIDO HACIA ATRAS O HACIA ADELANTE, DEPENDIENDO DE COMO ESTE EN EL PDF DEL ORTOGRAMA  -->
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
                              <!-- HASTA AQUI TERMINA EL ORTOGRAMA -->
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="panel panel-default">
                                       <div class="panel-body">
                                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                                             <div style="height: 20px; width:20px; display:inline-block;" class="click-red"></div>
                                             = Fractura/Carie
                                             <br>
                                             <div style="height: 5px; width:20px; display:inline-block;" class="click-red"></div>
                                             = Puente Entre Piezas
                                          </div>
                                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                                             <div style="height: 20px; width:20px; display:inline-block;" class="click-blue"></div>
                                             = Obturación
                                          </div>
                                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
                                             <span style="display:inline:block;"> Pieza Extraída</span> = <img style="display:inline:block;" src="../template/img/extraccion.png">
                                             <br> Idicada Para Extracción = <i style="color:red;" class="fa fa-times fa-2x"></i>
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
            </form>
         </div>
      </div>
   </div>


   <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">Modal title</h4>
               </div>
               <div class="modal-body">
                  <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                     printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                     remaining essentially unchanged.</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
         </div>
      </div>
   </div>
</div>

<script src="../template/js/plugins/select2/select2.full.min.js"></script>
<script src="../template/js/plugins/daterangepicker/daterangepicker.js"></script>
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

   $('#txtFechaNacimiento').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "yyyy-mm-dd"
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
             }
         });
     });              
      //LLENADO DE SOCIOECONOMICO, TEST DE VACUNACION Y GENERALES DE ODONTOLOGIA
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
   
       $.post( "../../views/persona/test.php", { IdFactor: 4})
       .done(function( data ) {
         $("#gestacion").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 5})
       .done(function( data ) {
         $("#nacimiento").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 6})
       .done(function( data ) {
         $("#infancia").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 7})
       .done(function( data ) {
         $("#amamantamiento").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 8})
       .done(function( data ) {
         $("#alimentacion").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 9})
       .done(function( data ) {
         $("#endulzantes").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 10})
       .done(function( data ) {
         $("#alimentacionnocturna").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });
   
       $.post( "../../views/persona/test.php", { IdFactor: 11})
       .done(function( data ) {
         $("#higienenocturna").html(data);
         $(".select3").select2();
         $(".select2-container").css("width","100%");
       });

       $("#txtDepartamento").change(function(){
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

