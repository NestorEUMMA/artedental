
<?php if (Yii::$app->session->hasFlash("error")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("error", "Se a eliminado con Exito!"); ?>
    <?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
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
  ]);?>
<?php endif; ?> <?php



use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reportes';
$this->params['breadcrumbs'][] = $this->title;
?>
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
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3>REPORTE MENSUAL DE CONSULTAS</h3>
      </div>
          <div class="ibox-content">
            <form action="../../reports/consulta/proximasvisitas" target="_blank" method="post" id="demo-form" data-parsley-validate="">
              <div class="form-group" id="data_1">
                  <label class="font-normal">Fecha de Inicio</label>
                  <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"  data-mask="99-99-9999" name="txtInicio" id="" required="">
                  </div>
              </div>

              <div class="form-group" id="data_1">
                  <label class="font-normal">Fecha Final</label>
                  <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"  data-mask="99-99-9999" name="txtFinal" id="" required="">
                  </div>
              </div>
              <center><button type="submit" class="btn btn-success">VER REPORTE</button></center> 
            </form>
          </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3>REPORTE MENSUAL DE PROXIMAS CONSULTAS</h3>
        
      </div>
          <div class="ibox-content">
            <form action="../../reports/consulta/visitasmes" target="_blank" method="post" id="demo-form" data-parsley-validate="">
              <div class="form-group" id="data_1">
                  <label class="font-normal">Fecha de Inicio</label>
                  <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"  data-mask="99-99-9999" name="txtInicio1" id="" required="">
                  </div>
              </div>

              <div class="form-group" id="data_1">
                  <label class="font-normal">Fecha Final</label>
                  <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"  data-mask="99-99-9999" name="txtFinal1" id="" required="">
                  </div>
              </div>
              <center><button type="submit" class="btn btn-success">VER REPORTE</button></center> 
            </form>
          </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3>INFORMACION DE PACIENTES</h3>
        
      </div>
          <div class="ibox-content">
            <form action="../../reports/pacientes/pacientes" target="_blank" method="post" id="demo-form" data-parsley-validate="">
              <center><button type="submit" class="btn btn-success">VER REPORTE</button></center> 
            </form>
          </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3>REPORTE DE CORREOS ENVIADOS</h3>
        
      </div>
          <div class="ibox-content">
            <form action="../../reports/correos/pacientes" target="_blank" method="post" id="demo-form" data-parsley-validate="">
              <div class="form-group" id="data_1">
                    <label class="font-normal">Fecha de Inicio</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"  data-mask="99-99-9999" name="txtInicio1" id="" required="">
                    </div>
                </div>

                <div class="form-group" id="data_1">
                    <label class="font-normal">Fecha Final</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"  data-mask="99-99-9999" name="txtFinal1" id="" required="">
                    </div>
                </div>
              <center><button type="submit" class="btn btn-success">VER REPORTE</button></center> 
            </form>
          </div>
      </div>
    </div>
</div>


<script src="../template/js/plugins/select2/select2.full.min.js"></script>
<script src="../template/js/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   
   $(function () {

   $('#txtInicio1').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "yyyy-mm-dd"
            });
   
  $('#txtFinal1').datepicker({
      startView: 1,
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      format: "yyyy-mm-dd"
  });

  $('#txtInicio').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "yyyy-mm-dd"
            });
   
  $('#txtFinal').datepicker({
      startView: 1,
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      format: "yyyy-mm-dd"
  });
   

       
});

</script>