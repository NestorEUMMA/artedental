<?php

$label = '';
if ($_SESSION['IdIdioma'] == 1) {
   $label = 'Medico - Consulta';
} else {
   $label = 'Physician - Visits';
}


   $queryfichaconsulta = "SELECT c.IdConsulta, p.IdPersona as 'id', u.IdUsuario as 'IdUsuario',
   CONCAT(u.Nombres,' ',u.Apellidos) as 'Medico', CONCAT(p.Nombres,' ',p.Apellidos) as 'Paciente', c.FechaConsulta as 'Fecha',
   m.NombreModulo as 'Especialidad', m.Descripcion as 'Descripcion', c.Activo, c.Diagnostico As 'Diagnostico', c.Comentarios As 'Comentarios', c.Otros As 'Otros',
   c.EstadoNutricional As 'EstadoNutricional', c.CirugiasPrevias As 'CirugiasPrevias',
   c.MedicamentosActuales As 'MedicamentosActuales', c.ExamenFisica As 'ExamenFisica',
   c.PlanTratamiento As 'PlanTratamiento', c.FechaProxVisita As 'FechaProxVisita', c.Alergias As'Alergias', e.Nombre As 'Enfermedad'
     FROM consulta c
     INNER JOIN usuario u ON u.IdUsuario = c.IdUsuario
     INNER JOIN persona p ON p.IdPersona = c.IdPersona
     INNER JOIN modulo m ON m.IdModulo = c.IdModulo
     LEFT JOIN enfermedad e ON e.IdEnfermedad = c.IdEnfermedad
     where c.IdConsulta = '$id' and c.Activo = 1";
     
   //echo  $queryfichaconsulta;
   $resultadofichaconsulta = $mysqli->query($queryfichaconsulta);
   while ($test = $resultadofichaconsulta->fetch_assoc()) {
   $idconsulta = $test['IdConsulta'];
   $idusuario = $test['Medico'];
   $idusuarioid = $test['IdUsuario'];
   $idpersona = $test['Paciente'];
   $idpersonaid = $test['id'];
   $idmodulo = $test['Especialidad'];
   $idmoduloing = $test['Descripcion'];
   $fechaconsulta = $test['Fecha'];
   $diagnostico = $test['Diagnostico'];
   $comentarios = $test['Comentarios'];
   $otros = $test['Otros'];
   $EstadoNutricional = $test['EstadoNutricional'];
   $CirugiasPrevias = $test['CirugiasPrevias'];
   $MedicamentosActuales = $test['MedicamentosActuales'];
   $ExamenFisica = $test['ExamenFisica'];
   $PlanTratamiento = $test['PlanTratamiento'];
   $FechaProxVisita = $test['FechaProxVisita'];
   $Alergias = $test['Alergias'];
   $Enfermedad = $test['Enfermedad'];
}

// CONSULTA PARA CARGAR LOS SIGNOS VITALES
$querysignos = "SELECT IdConsulta, Peso, 
CASE WHEN UnidadPeso = 1 THEN 'LBS' ELSE 'KG' END AS 'UnidadPeso', Altura,
CASE WHEN UnidadAltura = 1 THEN 'MTS' ELSE 'CMS' END AS 'UnidadAltura', Temperatura, 
CASE WHEN UnidadTemperatura = 1 THEN 'C' ELSE 'F' END AS 'UnidadTemperatura', Pulso, PresionMax, PresionMin,
   Observaciones, PeriodoMeunstral, Glucotex, PC, PT, PA, FR, PAP, Motivo, IdIndicador
FROM indicador where IdConsulta = '$id' ";
$resultadosignos = $mysqli->query($querysignos);
while ($test = $resultadosignos->fetch_assoc()) {
$idindicador = $test['IdIndicador'];
$idconsulta = $test['IdConsulta'];
$peso = $test['Peso'];
$unidadpeso = $test['UnidadPeso'];
$altura = $test['Altura'];
$unidadaltura = $test['UnidadAltura'];
$temperatura = $test['Temperatura'];
$unidadtemperatura = $test['UnidadTemperatura'];
$pulso = $test['Pulso'];
$max = $test['PresionMax'];
$min = $test['PresionMin'];
$observaciones = $test['Observaciones'];
$periodomenstrual = $test['PeriodoMeunstral'];
$glucotex = $test['Glucotex'];
$pc = $test['PC'];
$pt = $test['PT'];
$pa = $test['PA'];
$fr = $test['FR'];
$pap = $test['PAP'];
$motivo = $test['Motivo'];
}


// CONSULTA PARA CARGAR EL CBO DE LOS EXAMENES
$querytipoexamen = "SELECT IdTipoExamen, NombreExamen, DescripcionExamen FROM tipoexamen";
$resultadotipoexamen = $mysqli->query($querytipoexamen);


// CONSULTA PARA CARGAR LOS EXAMENES ASIGNADOS A LA CONSULTA
$queryexamenestabla = "SELECT  c.IdConsulta As 'Consulta', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
                         te.NombreExamen As 'Examen', le.Indicacion As 'Indicaciones', le.Activo As 'Activo'
                           FROM listaexamen le
                           INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                           INNER JOIN persona p ON le.IdPersona = p.IdPersona
                           LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                           INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                           WHERE c.IdConsulta = '$id' ";
$resultadoexamenestabla = $mysqli->query($queryexamenestabla);


// CONSULTA PARA CARGAR EXPEDIENTE DEL PACIENTE
$queryexpedientes = "SELECT PER.IdPersona as 'IdPersona', PER.Nombres as 'Nombres', PER.APellidos as 'Apellidos', PER.FechaNacimiento, Direccion, PER.Dui, PER.IdGeografia, GEO.Nombre as 'NombreDepartamento', PER.Genero, EC.Nombre as 'IdEstadoCivil', Correo, IdParentesco, Telefono, Celular, Alergias, Medicamentos, Enfermedad, TelefonoResponsable, NombresResponsable, 
ApellidosResponsable, Parentesco, DuiResponsable, PA.NombrePais as 'Pais',
(SELECT TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()))  AS ANIOS,
(SELECT (TIMESTAMPDIFF(MONTH,FechaNacimiento,CURDATE())) - (TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) * 12)) AS MESES,
(SELECT DATEDIFF(CURDATE(),DATE_ADD(DATE_ADD(FechaNacimiento, INTERVAL TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) YEAR), INTERVAL (TIMESTAMPDIFF(MONTH,FechaNacimiento,CURDATE())) - (TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) * 12) MONTH))) AS DIAS
FROM persona PER
INNER JOIN geografia GEO on PER.IdGeografia = GEO.IdGeografia
LEFT JOIN estadocivil EC on PER.IdEstadoCivil = EC.IdEstadoCivil
LEFT JOIN pais PA on PER.IdPais = PA.IdPais WHERE IdPersona  = '$idpersonaid'";
$resultadoexpedientes = $mysqli->query($queryexpedientes);
while ($test = $resultadoexpedientes->fetch_assoc()) {
$nombres = $test['Nombres'];
$apellidos = $test['Apellidos'];
$dui = $test['Dui'];
$duiresponsable = $test['DuiResponsable'];
$fnacimiento = $test['FechaNacimiento'];
$geografia = $test['IdGeografia'];
$departamento = $test['NombreDepartamento'];
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
$pais = $test['Pais'];
$telefonoresponsable = $test['TelefonoResponsable'];
$date = date("Y-m-d H:i:s");
$anios = $test['ANIOS'];
$meses = $test['MESES'];
$dias = $test['DIAS'];
}

//QUERY PARA OBTENER EL IDORTOGRAMA
$queryidortograma = "SELECT IdDienteOrtograma FROM dienteortograma WHERE IdPersona = '$idpersonaid'";
$resultadoidortograma = $mysqli->query($queryidortograma);
while ($test = $resultadoidortograma->fetch_assoc()) {
$IdDienteOrtograma = $test['IdDienteOrtograma'];
}


// CONSULTA PARA CARGAR EL CBO DE LOS EXAMENES
$querytiporayosx = "SELECT IdTipoRayosx, NombreRayosx, DescripcionRayosx FROM tiporayosx";
$resultadotiporayosx = $mysqli->query($querytiporayosx);

// CONSULTA PARA CARGAR EL CBO DE LOS PROCEDIMIENTOS
$querydienteprocedimiento = "SELECT IdDienteProcedimiento, DescripcionProcedimiento FROM dienteprocedimiento";
$resultadodienteprocedimiento = $mysqli->query($querydienteprocedimiento);

// CONSULTA PARA CARGAR DEPARTAMENTOS EN EL EXPEDIENTE
$querydepartamentos = "SELECT * FROM geografia WHERE IdGeografia='$geografia'";
$resultadodepartamentos = $mysqli->query($querydepartamentos);


// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS EN EL EXPEDIENTE DEL PACIENTE
$querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                          CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                          FROM consulta c
                          INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                          INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                          INNER JOIN persona p ON c.IdPersona = p.IdPersona
                          WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid
                          ORDER BY c.FechaConsulta DESC";
$resultadotablaconsulta = $mysqli->query($querytablaconsulta);

$querytablaconsulta2 = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                          CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.Descripcion As 'Especialidad', c.IdEstado as 'Estado'
                          FROM consulta c
                          INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                          INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                          INNER JOIN persona p ON c.IdPersona = p.IdPersona
                          WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid
                          ORDER BY c.FechaConsulta DESC";
$resultadotablaconsulta2 = $mysqli->query($querytablaconsulta2);


// CONSULTA PARA CARGAR LA TABLA DE LAS EXAMENES ASIGNADOS AL PACIENTE
$querytablaexameneslabasignados = "SELECT LE.IdListaExamen as 'IdListaExamen',TE.NombreExamen AS 'NombreExamen', TE.DescripcionExamen AS 'NombreExamening', CONCAT(US.Nombres,' ', US.Apellidos) As 'Medico', LE.Indicacion as 'Indicacion'  
                         FROM listaexamen LE
                         INNER JOIN TipoExamen TE on LE.IdTipoExamen = TE.IdTipoExamen
                         INNER JOIN Usuario US on LE.IdUsuario = US.IdUsuario
                         WHERE LE.Activo = 1 and LE.IdUsuario =  '$idusuarioid' and LE.IdConsulta = '$id'";
$resultadotablaexameneslabasignados = $mysqli->query($querytablaexameneslabasignados);



// CONSULTA PARA CARGAR LA TABLA DE LOS EXAMENES FINALIZADOS EN EL EXPEDIENTE DEL PACIENTE
$querytablaexamenes = "SELECT le.IdListaExamen As 'IdListaExamen', c.IdConsulta As 'Consulta', le.FechaExamen As 'Fecha', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', te.IdTipoExamen As IdTipoExamen, te.NombreExamen As 'Examen', le.Activo
               FROM listaexamen le
               INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
               INNER JOIN persona p ON le.IdPersona = p.IdPersona
               LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
               INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                         WHERE le.Activo = 0 and le.IdPersona = $idpersonaid
                         ORDER BY le.FechaExamen DESC";
$resultadotablaexamenes = $mysqli->query($querytablaexamenes);


// CONSULTA PARA CARGAR LA TABLA DE LOS MEDICAMENTOS ACTIVOS EN MODAL
$querytablamedicamentos = "SELECT IdMedicamento , CONCAT(m.NombreMedicamento, ' - ', m.NombreComercial, ' - ', m.codigo) As 'Medicamento', concat(m.concentracion, ' - ' ,u.NombreUnidadMedida) As 'Presentacion', c.NombreCategoria As 'Categoria',
l.NombreLaboratorio As 'Laboratorio', m.Existencia As 'Existencia'
                           FROM medicamentos m
                           INNER JOIN laboratorio l on m.IdLaboratorio = l.IdLaboratorio
                           INNER JOIN categoria c on m.IdCategoria = c.IdCategoria
                           INNER JOIN unidadmedida u on m.IdUnidadMedida = u.IdUnidadMedida
                           WHERE m.Existencia > 0
                           ORDER BY Medicamento ASC";
$resultadotablamedicamentos = $mysqli->query($querytablamedicamentos);

// CONSULTA PARA CARGAR LA TABLA DE LOS RECETA
$querytablarecetas = "SELECT r.IdReceta, c.IdConsulta As 'Consulta', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                         r.Fecha As 'Fecha', r.Activo As 'Activo'
                         FROM receta r
                         INNER JOIN usuario u ON r.IdUsuario = u.IdUsuario
                         INNER JOIN persona p ON r.IdPersona = p.IdPersona
                         INNER JOIN consulta c ON r.IdConsulta = c.IdConsulta
                         WHERE c.IdConsulta = $id";
$resultadotablarecetas = $mysqli->query($querytablarecetas);

$queryvalidarreceta = "SELECT r.IdReceta, r.Activo As 'Activo'
                         FROM receta r
                         INNER JOIN consulta c ON r.IdConsulta = c.IdConsulta
                         WHERE c.IdConsulta = $id";
$resultadovalidarreceta = $mysqli->query($queryvalidarreceta);

// CONSULTA PARA CARGAR ENFERMEDADES EN SELECT DE DIAGNOSTICO
$querytablaenfermedad = "SELECT IdEnfermedad, CONCAT(CodigoICD,' ',Nombre) AS 'Nombre'
                           FROM enfermedad";
$resultadotablaenfermedad = $mysqli->query($querytablaenfermedad);


$querytablaenfermedad2 = "SELECT IdEnfermedad, CONCAT(CodigoICD,' ',Nombre) AS 'Nombre'
                           FROM enfermedad";
$resultadotablaenfermedad2 = $mysqli->query($querytablaenfermedad2);

$querytablaenfermedadICD = "SELECT IdCodigoICD, NombreCodigo 
                           FROM codigoicd";
$resultadotablaenfermedadICD = $mysqli->query($querytablaenfermedadICD);

$querytablarecetamedicamentos = "SELECT CONCAT(m.NombreComercial,' ',m.NombreMedicamento,' ',um.NombreUnidadMedida) As 'Medicamento', rm.Total As 'Cantidad'
       FROM receta_medicamentos rm
       INNER JOIN medicamentos m ON m.IdMedicamento = rm.IdMedicamento
       INNER JOIN receta r ON r.IdReceta = rm.IdReceta
       INNER JOIN consulta c ON c.IdConsulta = r.IdConsulta
       INNER JOIN unidadmedida um ON um.IdUnidadMedida = m.IdUnidadMedida
       WHERE r.IdConsulta =$id";
$resultadotablarecetamedicamentos = $mysqli->query($querytablarecetamedicamentos);

$queryhistoricomedicamentos = "SELECT c.IdConsulta As 'ID', r.IdReceta As 'IDReceta', r.Fecha As 'Fecha', CONCAT(p.Nombres,' ',p.Apellidos) As 'Nombre Completo', CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', CONCAT(m.NombreComercial,' ',m.NombreMedicamento,' ',um.NombreUnidadMedida) As 'Medicamento',
           rm.Cantidad As 'Cantidad', rm.Dias As 'Dias', rm.Horas As 'Horas', rm.Total As 'Total'
       FROM receta r
       INNER JOIN  usuario u on u.IdUsuario = r.IdUsuario
       INNER JOIN persona p on p.IdPersona = r.IdPersona
       INNER JOIN receta_medicamentos rm on rm.IdReceta = r.IdReceta
       INNER JOIN medicamentos m on m.IdMedicamento = rm.IdMedicamento
       INNER JOIN unidadmedida um on um.IdUnidadMedida = m.IdUnidadMedida
       INNER JOIN consulta c on c.IdConsulta = r.IdConsulta
       WHERE  p.IdPersona =$idpersonaid
       ORDER BY c.IdConsulta DESC";
$resultadotablahistoricomedicamentos = $mysqli->query($queryhistoricomedicamentos);

$querytablaprocedimientos = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
     CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo',m.Descripcion As 'Moduloing', ep.FechaProcedimiento As 'Fecha',
       mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'
       FROM enfermeriaprocedimiento ep
       INNER JOIN persona p ON p.IdPersona = ep.IdPersona
       INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
       INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
       INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
       WHERE p.IdPersona = '$idpersonaid'
       order by ep.IdEnfermeriaProcedimiento DESC";
$resultadotablaprocedimientos = $mysqli->query($querytablaprocedimientos);

//TABLA PARA CARGAR PLAN DE TRATAMIENTO SELECCIONADO POR EL CAREOGRAMA
$querytablaplantratamiento = "SELECT CONCAT(UPPER(LEFT(D.Diente, 1)), LOWER(SUBSTRING(D.Diente, 2))) AS 'Diente', DP.DescripcionProcedimiento, DPO.NombrePosicion FROM dienteortogramadetalle DOD
      INNER JOIN dienteortograma DO ON DO.IdDienteOrtograma = DOD.IdDienteOrtograma
      INNER JOIN dienteprocedimiento DP ON DOD.IdDienteProcedimiento = DP.IdDienteProcedimiento
      INNER JOIN dienteposicion DPO ON DPO.IdDientePosicion = DOD.IdDientePosicion
      INNER JOIN diente D ON D.IdDiente = DPO.IdDiente
      INNER JOIN persona P ON P.IdPersona = DO.IdPersona
      WHERE DO.IdPersona = $idpersonaid AND DP.IdDienteProcedimiento > 1
      ORDER BY DPO.IdDientePosicion ASC";
$resultadotablaplantratamiento = $mysqli->query($querytablaplantratamiento);

//TABLA PARA CARGAR PLAN DE TRATAMIENTO GUARDADO EN LA BASE DE DATOS
$querytablaplantratamientohistorico = "SELECT DPT.IdPlanTratamiento ,CONCAT(P.Nombres,' ',P.Apellidos) as 'NombreCompleto', DPT.Fecha, DPT.Hora FROM dienteplantratamiento DPT
INNER JOIN PERSONA P ON P.IdPersona = DPT.IdPersona
WHERE DPT.IdPersona =  $idpersonaid";
$resultadotablaplantratamientohistorico = $mysqli->query($querytablaplantratamientohistorico);

?>
