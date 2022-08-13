<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Plan de Tratamiento</title>
      <link href="../../web/template/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../web/template/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="../../web/template/css/animate.css" rel="stylesheet">
      <link href="../../web/template/css/style.css" rel="stylesheet">
      <link rel="apple-touch-icon" sizes="76x76" href="../../web/template2/assets/img/apple-icon.png" />
      <link rel="icon" type="image/png" href="../../web/template/img/uqsolutions.png" />
   </head>
   <?php include '../../include/dbconnect.php'; ?>
   <?php 
      $IdPlanTratamiento = $_POST['txtplantratamineto'];
      
      $queryexpedientesu = "SELECT DPT.Procedimiento, DPT.Diente, DPT.Posicion, DPT.Precio, DPC.Comentarios, PT.IdPersona FROM dienteplantratamientodetalle DPT
      INNER JOIN dienteplantratamientocomentarios DPC on DPC.IdPlanTratamiento = DPT.IdPlanTratamiento
      INNER JOIN dienteplantratamiento PT on PT.IdPlanTratamiento = DPT.IdPlanTratamiento
      WHERE DPT.IdPlanTratamiento = $IdPlanTratamiento";
      $resultadoexpedientesu = $mysqli->query($queryexpedientesu);
   

    $queryexpedientesu1 = "SELECT DPC.Comentarios, PT.IdPersona FROM dienteplantratamientodetalle DPT
    INNER JOIN dienteplantratamientocomentarios DPC on DPC.IdPlanTratamiento = DPT.IdPlanTratamiento
    INNER JOIN dienteplantratamiento PT on PT.IdPlanTratamiento = DPT.IdPlanTratamiento
    WHERE DPT.IdPlanTratamiento = $IdPlanTratamiento
    LIMIT 1";
    $resultadoexpedientesu1 = $mysqli->query($queryexpedientesu1);
 
    while ($test = $resultadoexpedientesu1->fetch_assoc()) {
      $Comentarios = $test['Comentarios'];
      $idpersona = $test['IdPersona'];
  }
      
        $queryobtenerinformaciongeneral = "SELECT 
            p.CodigoPaciente as 'Codigo',
            CONCAT(p.Nombres,' ',p.Apellidos) as 'NombrePaciente',
            p.dui as 'DUI',
            p.FechaNacimiento as 'FNacimiento',
            p.Direccion as 'Direccion',
            g.Nombre as 'Municipio',
            pa.NombrePais as 'Pais',
            (select nombre from geografia where IdGeografia = (select IdPadre from geografia where IdGeografia = p.IdGeografia)) as 'Departamento',
            p.Telefono as 'Telefono',
            p.Celular as 'Celular',
            p.Genero as 'Genero',
            ec.Nombre as 'EstadoC',
            p.FechaNacimiento as 'FechaNac',
            TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) AS 'Edad',
            CONCAT(p.NombresResponsable,' ',p.ApellidosResponsable) as 'NombreResponsable',
            p.DuiResponsable as 'DuiResp',
            p.TelefonoResponsable as 'TelResp',
            p.Parentesco as 'Parentezco',
            p.Categoria as 'Categoria',
            p.Alergias as 'Alergias',
            p.Medicamentos as 'Medicamentos',
            p.Enfermedad as 'EnfermedadP',
            (SELECT TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()))  AS ANIOS,
            (SELECT (TIMESTAMPDIFF(MONTH,FechaNacimiento,CURDATE())) - (TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) * 12)) AS MESES,
            (SELECT DATEDIFF(CURDATE(),DATE_ADD(DATE_ADD(FechaNacimiento, INTERVAL TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) YEAR), INTERVAL (TIMESTAMPDIFF(MONTH,FechaNacimiento,CURDATE())) - (TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) * 12) MONTH))) AS DIAS
            FROM persona p
            LEFT JOIN geografia g on p.IdGeografia = g.IdGeografia
            LEFT JOIN estadocivil ec on p.IdEstadoCivil = ec.IdEstadoCivil
            LEFT JOIN pais pa on p.IdPais = pa.IdPais
            WHERE p.IdPersona = $idpersona";
            $resultadoobtenerinformaciongeneral = $mysqli->query($queryobtenerinformaciongeneral);
            while ($test = $resultadoobtenerinformaciongeneral->fetch_assoc()) {
            $CodPaciente = $test['Codigo'];
            $NombrePaciente = $test['NombrePaciente'];
            $DUIprint = $test['DUI'];
            $FNacimiento = $test['FNacimiento'];
            $Direccion = $test['Direccion'];
            $Municipio = $test['Municipio'];
            $Paisprint = $test['Pais'];
            $Departamentoprint = $test['Departamento'];
            $Telefono = $test['Telefono'];
            $Celular = $test['Celular'];
            $Genero = $test['Genero'];
            $EstadoC = $test['EstadoC'];
            $FechaNac = $test['FechaNac'];
            $Edad = $test['Edad'];
            $NombreResponsable = $test['NombreResponsable'];
            $DuiResp = $test['DuiResp'];
            $TelResp = $test['TelResp'];
            $Parentezco = $test['Parentezco'];
            $Categoria = $test['Categoria'];
            $Alergias = $test['Alergias'];
            $Medicamentos = $test['Medicamentos'];
            $EnfermedadP = $test['EnfermedadP'];
            $anios = $test['ANIOS'];
            $meses = $test['MESES'];
            $dias = $test['DIAS'];
        }   

        $queryEmpresa = "SELECT NombreEmpresa, Direccion, Telefono from empresa where IdEmpresa = 1";
        $resultadoEmpresa = $mysqli->query($queryEmpresa);
        while ($test = $resultadoEmpresa->fetch_assoc()) {
            $empresa = $test['NombreEmpresa'];
            $direccion = $test['Direccion'];
            $telefono = $test['Telefono'];
        }
           
      ?>
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
                  <h2>PLAN DE TRATAMIENTO</h2>
                  <small>
                     <address>
                        <strong><?php echo $empresa ?></strong><br>
                        <?php echo $direccion ?><br>
                        Tel: (503) <?php echo $telefono ?>
                     </address>
                  </small>
               </div>
               <div class="col-xs-3">

               </div>
               <div class="col-xs-2">
                  <br>
                  <center>
                     <div id="barcode"></div>
                  </center>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Nombre Completo:</strong>
               </div>
               <div class="col-xs-5">
                  <?php echo $NombrePaciente; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Edad:</strong>
               </div>
               <div class="col-xs-5">
               Años: <?php echo $anios ?>, Meses: <?php echo $meses?>, Dias: <?php echo $dias ?>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-xs-12">
               <center><strong>PLAN DE TRATAMIENTO</strong></center>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12">
               <table id="example2" cellspacing="0" cellpadding="0" class="table table-striped">
                    <?php
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th id=''>N°</th>";
                    echo "<th id=''>PROCEDIMIENTO</th>";
                    echo "<th id=''>DIENTE</th>";
                    echo "<th id=''>POSICION</th>";
                    echo "<th id=''>PRECIO</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $nr = 0;
                        while ($row = $resultadoexpedientesu->fetch_assoc()) {
                            $nr ++;
                            echo "<tr>";
                            echo "<td>".$nr."</td>";
                            echo "<td>" . $row['Procedimiento'] . "</td>";
                            echo "<td>" . $row['Diente'] . "</td>";
                            echo "<td>" . $row['Posicion'] . "</td>";
                            echo "<td>$" . $row['Precio'] . "</td>";
                            echo "</tr>";
                            echo "</body>  ";
                        }
                    ?>
                </table>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Comentarios:</strong>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-xs-12">
               <p style="text-align:justify">  
                  <?php echo $Comentarios; ?>
                </p>
               </div>
            </div>
         </div>
      </div>
      <!-- Mainly scripts -->
      <script src="../../web/template/js/jquery-3.1.1.min.js"></script>
      <script src="../../web/template/barcode/jquery-barcode.min.js"></script>
      <script src="../../web/template/js/bootstrap.min.js"></script>
      <script src="../../web/template/js/plugins/metisMenu/jquery.metisMenu.js"></script>
      <!-- Custom and plugin javascript -->
      <script src="../../web/template/js/inspinia.js"></script>
   </body>
</html>
<script type="text/javascript">
   $(function() {   
    $("#barcode").barcode(
     "<?php echo $CodPaciente ?>", // Valor del codigo de barras
   "code128" // tipo (cadena)
   );
    //window.print();
    //window.close();
    setTimeout('window.print()', 500);
    setTimeout('window.close()', 1500);
   });
</script>
