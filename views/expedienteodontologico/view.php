<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   use yii\grid\GridView;
   
   /* LLAMAMOS LA CONEXION A LA BASE */
   include '../include/dbconnect.php';
   /*  LLAMAMOS LOS QUERYS PARA LAS TABLAS */
   include 'querystabla.php';
   
   /* @var $this yii\web\View */
   /* @var $model app\models\persona */
   
   $this->title = $model->fullname;
   $this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
   $this->params['breadcrumbs'][] = $this->title;
   ?>
</br>
<?php if (Yii::$app->session->hasFlash("success")) : ?>
<?php
   $session = \Yii::$app->getSession();
   $session->setFlash("success", "Se a agregado con Exito!"); ?>
<?= \odaialali\yii2toastr\ToastrFlash::widget([
   "options" => [
      "closeButton" => true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
   ]
   ]); ?>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash("warning")) : ?>
<?php
   $session = \Yii::$app->getSession();
   $session->setFlash("warning", "Se a actualizado con Exito!"); ?>
<?= \odaialali\yii2toastr\ToastrFlash::widget([
   "options" => [
      "closeButton" => true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
   ]
   ]); ?>
<?php endif; ?>
<!-- LLAMAMOS LOS CSS DEL FORMULARIO -->
<?php include 'styles.php' ?>
<link href="../css/base.css" rel="stylesheet">
<div class="row">
   <div class="col-md-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <h3>EXPEDIENTE DE: <?= Html::encode($this->title) ?></h3>
            <br>
            <br>
         </div>
         </br>
         <div class="ibox-content">
            NOTIFICACIONES:
            <?php if ($direccion == 'ACTUALIZADO') {
               ?>
            <div class="alert alert-danger alert-dismissible" hidden='hidden'>
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $direccion; ?>
            </div>
            <?php
               } else if ($direccion == 'ACTUALIZAR DIRECCION') {
               ?>
            <div class="alert alert-danger alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $direccion; ?>
            </div>
            <?php
               } ?>
            <?php if ($responsable == 'ACTUALIZADO') {
               ?>
            <div class="alert alert-danger alert-dismissible " hidden='hidden'>
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $responsable; ?>
            </div>
            <?php
               } else if ($responsable == 'FECHA DE NACIMIENTO SIN REGISTRARSE') {
               ?>
            <div class="alert alert-danger alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $responsable; ?>
            </div>
            <?php
               } else if ($responsable == 'ACTUALIZAR RESPONSABLE') {
               ?>
            <div class="alert alert-danger alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $responsable; ?>
            </div>
            <?php
               } ?>
            <?php if ($genero == 'ACTUALIZADO') {
               ?>
            <div class="alert alert-danger alert-dismissible" hidden="hidden">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $genero; ?>
            </div>
            <?php
               } else if ($genero == 'ACTUALIZAR GENERO') {
               ?>
            <div class="alert alert-danger alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Atencion!</strong> <?php echo $genero; ?>
            </div>
            <?php
               } ?>
            <div class="ibox-content">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#tab-1">DATOS GENERALES</a></li>
                     <li class=""><a data-toggle="tab" href="#tab-2">CONSULTAS</a></li>
                     <li class=""><a data-toggle="tab" href="#tab-6">CAREOGRAMA</a></li>
                  </ul>
                  <div class="tab-content">
                     <!-- TAB DE DATOS GENERALES Y UPDATE -->
                     <div id="tab-1" class="tab-pane active">
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-11">INFORMACION PERSONAL</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-12">EVALUACION DENTAL INFANTIL</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="tab-11" class="tab-pane active">
                                 <div class="panel-body">
                                    <h3> DATOS GENERALES </h3>
                                    <table class="table table-hover">
                                       <?= DetailView::widget([
                                          'model' => $model,
                                          'attributes' => [
                                             'Nombres',
                                             'Apellidos',
                                             'FechaNacimiento',
                                             [
                                                'attribute' => 'Edad',
                                                'format' => 'raw',
                                                'value' => $edad,
                                             ],
                                             'Direccion',
                                             'Correo',
                                             'Genero',
                                             'Telefono',
                                             'Celular',
                                             'CodigoPaciente',
                                          ],
                                          ]) ?>
                                    </table>
                                    <h3> CODIGO DE BARRAS </h3>
                                    <center>
                                       <div id="barcode"></div>
                                    </center>
                                    <h3> DATOS RESPONSABLE</h3>
                                    <table class="table table-hover">
                                       <?= DetailView::widget([
                                          'model' => $model,
                                          'attributes' => [
                                             'TelefonoResponsable',
                                             'NombresResponsable',
                                             'ApellidosResponsable',
                                             'Parentesco',
                                             'DuiResponsable',
                                          ],
                                          ]) ?>
                                    </table>
                                    <p align="center">
                                       <?= Html::a('Actualizar Informacion General', ['update', 'id' => $model->IdPersona], ['class' => 'btn btn-warning']) ?>
                                    </p>
                                 </div>
                              </div>
                              <div id="tab-12" class="tab-pane">
                                 <div class="panel-body">
                                    <br>
                                    <div class="panel-body">
                                       <h4>GESTACION</h4>
                                       <div id="gestacion"></div>
                                    </div>
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
                     <!-- TAB DE CONSULTAS INGRESADAS EN EL SISTEMA -->
                     <div id="tab-2" class="tab-pane">
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-52">CONSULTAS GENERAL</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-82">PLAN DE TRATAMIENTO</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="tab-52" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>CONSULTAS GENERAL</h3>
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
                                                      "<span id='btn" . $IdConsulta . "' class='btn-xs btn-success btn-cargarconsulta'><i class='fa fa-search'></i></span>" .
                                                      "</td>";
                                                   }
                                             
                                                   echo "</tr>";
                                                   echo "</body>  ";
                                                
                                             
                                             ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-82" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>PLAN DE TRATAMIENTO</h3>
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
                                                "<span id='btn" . $IdPlanTratamiento . "' class='btn-xs btn-success btn-histver'><i class='fa fa-search'></i></span>" .
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
                     <div id="tab-6" class="tab-pane">
                        <div class="row">
                        <br>
                        <br>
                        <br>
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
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   /* AGREGA TODOS LOS MODALES */
   include 'modal.php';
   /* AGREGA TODOS LOS SCRIPTS */
   include 'scripts.php';
   ?>