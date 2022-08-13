
   <?php include '../../include/dbconnect.php'; ?>
   <?php 
        setlocale(LC_TIME, "spanish");
        $d = 0;

        $fechaInicio = $_POST['txtInicio'];
        $fechaFinal = $_POST['txtFinal'];


        $diainico = substr($fechaInicio, 0, 2);
        $mesinicio = substr($fechaInicio, 3, 2);
        $anioinicio = substr($fechaInicio, 6, 4);
        $fechaInicioFormat = $anioinicio.'-'.$mesinicio.'-'.$diainico;  

        $diafinal = substr($fechaFinal, 0, 2);
        $mesfinal = substr($fechaFinal, 3, 2);
        $aniofinal = substr($fechaFinal, 6, 4);
        $fechaFinalFormat = $aniofinal.'-'.$mesfinal.'-'.$diafinal;  

        $queryfecha = "SELECT C.IdConsulta, P.IdPersona, UPPER(CONCAT(P.Nombres,' ',P.Apellidos)) AS 'Nombre', C.FechaConsulta, P.Celular FROM consulta C
        INNER JOIN persona P ON P.IdPersona = C.IdPersona
        WHERE C.FechaConsulta BETWEEN '$fechaInicioFormat'  and '$fechaFinalFormat'
        GROUP BY P.IdPersona, C.FechaConsulta = (SELECT MAX(FechaConsulta) FROM consulta)
        ORDER BY C.FechaConsulta ASC";
        $resultadoFecha = $mysqli->query($queryfecha);

        $numMes = strtoupper(strftime("%B", strtotime($fechaInicioFormat)));
        

        $queryEmpresa = "SELECT NombreEmpresa, Direccion, Telefono from empresa where IdEmpresa = 1";

        $resultadoEmpresa = $mysqli->query($queryEmpresa);
        while ($test = $resultadoEmpresa->fetch_assoc()) {
        $empresa = $test['NombreEmpresa'];
        $direccion = $test['Direccion'];
        $telefono = $test['Telefono'];
        }
           
      ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>CONSULTAS DE <?php echo $numMes ?> DE <?php echo $anioinicio ?></title>
      <link href="../../web/template/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../web/template/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="../../web/template/css/animate.css" rel="stylesheet">
      <link href="../../web/template/css/style.css" rel="stylesheet">
      <link rel="apple-touch-icon" sizes="76x76" href="../../web/template2/assets/img/apple-icon.png" />
      <link rel="icon" type="image/png" href="../../web/template/img/uqsolutions.png" />
   </head>

   <body class="white-bg" >
      <div class="wrapper wrapper-content">
         <div class="ibox-content">
            <div class="row">
               <div class="col-xs-2">
                  <div style='position: relative;'>
                     <img src='../../web/uploads/usuarios/artedental.jpg' style='width: 100px; height: 90px;' />
                  </div>
               </div>
               <div class="col-xs-5">
                  <h2>LISTADO DE CONSULTAS DE  <?php echo $numMes ?> DE <?php echo $anioinicio ?> </h2>
                  <small>
                     <address>
                        <strong><?php echo $empresa ?></strong><br>
                        <?php echo $direccion ?><br>
                        Tel:(503) <?php echo $telefono ?> <br> 
                     </address>
                  </small>
               </div>
               <br>
               <div class="row">
               <div class="col-xs-12">
                <h4>REPORTE DE CONSULTAS DEL <?php echo $fechaInicio ?> AL <?php echo $fechaFinal ?></h4>
               <table id="example2" cellspacing="0" cellpadding="0" class="table table-striped">
                    <?php
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th id=''>N°</th>";
                    echo "<th id=''>PACIENTE</th>";
                    echo "<th id=''>FECHA DE ULTIMA CONSULTA</th>";
                    echo "<th id=''>TELEFONO</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $nr = 0;
                        while ($row = $resultadoFecha->fetch_assoc()) {
                            $nr ++;
                            echo "<tr>";
                            echo "<td>".$nr."</td>";
                            echo "<td>" . $row['Nombre'] . "</td>";
                            echo "<td>" . $row['FechaConsulta'] . "</td>";
                            echo "<td>" . $row['Celular'] . "</td>";
                            echo "</tr>";
                            echo "</body>  ";
                        }
                    ?>
                </table>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script src="../../web/template/js/jquery-3.1.1.min.js"></script>
      <script src="../../web/template/barcode/jquery-barcode.min.js"></script>
      <script src="../../web/template/js/bootstrap.min.js"></script>
      <script src="../../web/template/js/plugins/metisMenu/jquery.metisMenu.js"></script>
      <!-- Custom and plugin javascript -->
      <script src="../../web/template/js/inspinia.js"></script>
</html>
<script type="text/javascript">
   $(function() {   
    setTimeout('window.print()', 500);
    setTimeout('window.close()', 1500);
   });
</script>

