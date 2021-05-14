<?php

    include '../include/dbconnect.php';
    if (!isset($_SESSION)) {
        session_start();
    }

    $queryEmpresa = "SELECT NombreEmpresa, Direccion, Telefono from empresa where IdEmpresa = 1";

    $resultadoEmpresa = $mysqli->query($queryEmpresa);
    while ($test = $resultadoEmpresa->fetch_assoc()) {
    $empresa = $test['NombreEmpresa'];
    $direccion = $test['Direccion'];
    $telefono = $test['Telefono'];
    }

?>
<script>
    $(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        <?php if ($_SESSION['IdIdioma'] == 1) { ?>
            toastr.success('<?php echo $empresa; ?>', 'Bienvenido');
        <?php } else { ?>
            toastr.success('<?php echo $empresa; ?>', 'Welcome');
        <?php } ?>
    });
</script>
<?php
/* @var $this yii\web\View */



if (!empty($_SESSION['user'])) {

    $urluri = str_replace('?'.$_SERVER["QUERY_STRING"],"", $_SERVER["REQUEST_URI"] );
    $url = str_replace("/artedental/web/","../",  $urluri );
    

    $queryfichaconsulta = "SELECT  count(c.FechaConsulta) as 'Listado', (SELECT count(p.Genero) FROM persona p INNER JOIN consulta c on c.IdPersona = p.IdPersona WHERE p.Genero = 'MASCULINO' and c.FechaConsulta = curdate()) as 'Hombre',
            (SELECT count(p.Genero) FROM persona p INNER JOIN consulta c on c.IdPersona = p.IdPersona WHERE p.Genero = 'FEMENINO' and c.FechaConsulta = curdate() ) as 'Mujer'
            FROM
            consulta c
            INNER JOIN persona p on c.IdPersona = p.IdPersona
            WHERE c.FechaConsulta = CURDATE() ";

    $resultadofichaconsulta = $mysqli->query($queryfichaconsulta);
    while ($test = $resultadofichaconsulta->fetch_assoc()) {
        $listado = $test['Listado'];
        $hombres = $test['Hombre'];
        $mujeres = $test['Mujer'];
    }

    $Hresultado = $hombres * 100;

    $hombresPor = 0;

    if ($listado != 0)
        $hombresPor = $Hresultado / $listado;


    $Mresultado = 0;
    $Mresultado = $mujeres * 100;

    $mujeresPor = 0;
    if ($listado != 0)
        $mujeresPor = $Mresultado / $listado;


    // QUERY PARA CALCULAR EDAD
    $queryfichaconsulta2 = "SELECT
                  count(CASE
                    WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) = 0 THEN 'nino'
                    WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) <= 18 THEN 'nino'
                  END) As 'Nino',
                  count(CASE
                    WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) > 18 THEN 'adulto'
                  END) As 'Adulto'
                FROM consulta c
                INNER JOIN persona p on c.IdPersona = p.IdPersona
                WHERE c.FechaConsulta = CURDATE()";

    $resultadofichaconsulta2 = $mysqli->query($queryfichaconsulta2);
    while ($test = $resultadofichaconsulta2->fetch_assoc()) {
        $nino = $test['Nino'];
        $adulto = $test['Adulto'];
    }



    $queryfichaconsulta3 = "SELECT count(c.Activo) as Activo
              FROM
              consulta c
              WHERE c.FechaConsulta = CURDATE() and Activo = 1";

    $resultadofichaconsulta3 = $mysqli->query($queryfichaconsulta3);
    while ($test = $resultadofichaconsulta3->fetch_assoc()) {
        $activo = $test['Activo'];
    }


    $queryfichaconsulta4 = "SELECT COUNT(*) as 'TOTAL' from persona";

    $resultadofichaconsulta4 = $mysqli->query($queryfichaconsulta4);
    while ($test = $resultadofichaconsulta4->fetch_assoc()) {
        $TOTAL = $test['TOTAL'];
    }

    $this->title =  $empresa;
?>
<div class="wrapper wrapper-content">
    <h1>
        <?php echo $empresa; ?> |
        <small id="encabezado1"> </small>

    </h1>
    <div class="row animated fadeInDown">
        <br><br>
        <div class="col-lg-12">
            <div class="row animated fadeInDown">
                <div class="col-lg-9">
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 default-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-address-book-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget25'></span>
                                <h2 class="font-bold"><?php echo $TOTAL; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row animated fadeInDown">
                <!-- <div class="col-lg-3">
                    <div class="widget style1 blue-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-hospital-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget1'></span>
                                <h2 class="font-bold"><?php echo $listado; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 blue-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget2'></span>
                                <h2 class="font-bold"><?php echo $adulto; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-smile-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget3'></span>
                                <h2 class="font-bold"><?php echo $nino; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-stethoscope fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget4'></span>
                                <h2 class="font-bold"><?php echo $activo; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-female fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget5'></span>
                                <h2 class="font-bold"> <?php echo $mujeres; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-male fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget6'></span>
                                <h2 class="font-bold"><?php echo $hombres ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-area-chart fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget7'></span>
                                <h2 class="font-bold"><?php echo $mujeresPor; ?>%</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-line-chart fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span id='widget8'></span>
                                <h2 class="font-bold"><?php echo $hombresPor; ?>%</h2>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 id='calendarname'></h5>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    $querybar = "SELECT 
      CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END as 'CountMasculino', 
      CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END as 'CountFemenino',
      CONCAT(CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Ene'WHEN 2 THEN  'Feb' WHEN 3 THEN 'Mar' WHEN 4 THEN 'Abr' WHEN 5 THEN 'May'
      WHEN 6 THEN 'Jun' WHEN 7 THEN 'Jul' WHEN 8 THEN 'Ago' WHEN 9 THEN 'Sep' 
      WHEN 10 THEN 'Oct' WHEN 11 THEN 'Nov' WHEN 12 THEN 'Dic'
      END,' ',YEAR(con.FechaConsulta)) as 'Mes'
      FROM consulta con
      INNER JOIN persona per on per.IdPersona = con.IdPersona
      GROUP BY CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Enero'WHEN 2 THEN  'Febrero' WHEN 3 THEN 'Marzo' WHEN 4 THEN 'Abril' WHEN 5 THEN 'Mayo'
      WHEN 6 THEN 'Junio' WHEN 7 THEN 'Julio' WHEN 8 THEN 'Agosto' WHEN 9 THEN 'Septiembre' 
      WHEN 10 THEN 'Octubre' WHEN 11 THEN 'Noviembre' WHEN 12 THEN 'Diciembre'
      END
      ORDER BY con.FechaConsulta DESC LIMIT 3";
    $resultbar = $mysqli->query($querybar);
    $chartbar_data = '';
    while ($row = mysqli_fetch_array($resultbar)) {
        $chartbar_data .= "{ Mes:'" . $row["Mes"] . "', CountMasculino:" . $row["CountMasculino"] . ", CountFemenino:" . $row["CountFemenino"] . "}, ";
    }
    $chartbar_data = substr($chartbar_data, 0, -2);


    $queryline = "SELECT 
      (CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END +
      CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END) as 'Conteo',
      mo.NombreModulo as 'Especialidad',
      CONCAT(CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Ene'WHEN 2 THEN  'Feb' WHEN 3 THEN 'Mar' WHEN 4 THEN 'Abr' WHEN 5 THEN 'May'
      WHEN 6 THEN 'Jun' WHEN 7 THEN 'Jul' WHEN 8 THEN 'Ago' WHEN 9 THEN 'Sep' 
      WHEN 10 THEN 'Oct' WHEN 11 THEN 'Nov' WHEN 12 THEN 'Dic'
      END,' ',YEAR(con.FechaConsulta)) as 'Mes'
      FROM consulta con
      INNER JOIN persona per on per.IdPersona = con.IdPersona
      INNER JOIN modulo mo on mo.IdModulo = con.IdModulo
      WHERE con.activo = 0
      GROUP BY MONTH(con.FechaConsulta) 
      ORDER BY con.FechaConsulta DESC
      LIMIT 12";
    $resultline = $mysqli->query($queryline);
    $chartline_data = '';
    while ($row = mysqli_fetch_array($resultline)) {
        $chartline_data .= "{ Mes:'" . $row["Mes"] . "', Conteo:" . $row["Conteo"] . " }, ";
    }
    $chartline_data = substr($chartline_data, 0, -2);
    ?>

    <script type="text/javascript">
        $(document).ready(function() {


            <?php if ($_SESSION['IdIdioma'] == 1) { ?>
                $("#encabezado1").text('Administración de Pacientes y Control Dental');
                $("#widget1").text('Paciente Atendido');
                $("#widget2").text('Adultos');
                $("#widget3").text('Niños');
                $("#widget4").text('En Proceso');
                $("#widget5").text('Mujer Atendida');
                $("#widget6").text('Hombre Atendido');
                $("#widget7").text('Mujer Atendida');
                $("#widget8").text('Hombre Atendido');
                $("#widget25").text('Expedientes Ingresados');
                $("#calendarname").text('Calendario');
            <?php } else { ?>
                $("#encabezado1").text('Patient and Dental Management');
                $("#widget1").text('Patients Served');
                $("#widget2").text('Adults');
                $("#widget3").text('Children');
                $("#widget4").text('In Process');
                $("#widget5").text('Women Served');
                $("#widget6").text('Men Served');
                $("#widget7").text('Women Served');
                $("#widget8").text('Men Served');
                $("#widget25").text('Expedientes Ingresados');
                $("#calendarname").text('Calendar');
            <?php } ?>
        });

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },

            displayEventTime: false, // don't show the time column in list view

            // THIS KEY WON'T WORK IN PRODUCTION!!!
            // To make your own Google API key, follow the directions here:
            // http://fullcalendar.io/docs/google_calendar/
            googleCalendarApiKey: 'AIzaSyCMbFnaAV0Vh6X1sail7gRXVK614rVpJXg',

            // US Holidays
            events: 'radamanthys.eo@gmail.com',

            eventClick: function(arg) {
                // opens events in a popup window
                window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

                arg.jsEvent.preventDefault() // don't navigate in main tab
            },

            
            });
            calendar.setOption('locale', 'es');
            calendar.render();
        });
    </script>

<?php
} else {
    echo "
   <script>
     alert('No ha iniciado sesion');
     document.location='../index.php';
   </script>
   ";
}
?>