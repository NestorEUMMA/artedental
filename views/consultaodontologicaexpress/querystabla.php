<?php

$label = '';
if ($_SESSION['IdIdioma'] == 1) {
   $label = 'Medico - Consulta';
} else {
   $label = 'Physician - Visits';
}


//    $queryfichaconsulta = "SELECT c.IdConsulta, p.IdPersona as 'id', u.IdUsuario as 'IdUsuario',
//    CONCAT(u.Nombres,' ',u.Apellidos) as 'Medico', CONCAT(p.Nombres,' ',p.Apellidos) as 'Paciente', c.FechaConsulta as 'Fecha',
//    m.NombreModulo as 'Especialidad', m.Descripcion as 'Descripcion', c.Activo, c.Diagnostico As 'Diagnostico', c.Comentarios As 'Comentarios', c.Otros As 'Otros',
//    c.EstadoNutricional As 'EstadoNutricional', c.CirugiasPrevias As 'CirugiasPrevias',
//    c.MedicamentosActuales As 'MedicamentosActuales', c.ExamenFisica As 'ExamenFisica',
//    c.PlanTratamiento As 'PlanTratamiento', c.FechaProxVisita As 'FechaProxVisita', c.Alergias As'Alergias', e.Nombre As 'Enfermedad'
//      FROM consulta c
//      INNER JOIN usuario u ON u.IdUsuario = c.IdUsuario
//      INNER JOIN persona p ON p.IdPersona = c.IdPersona
//      INNER JOIN modulo m ON m.IdModulo = c.IdModulo
//      LEFT JOIN enfermedad e ON e.IdEnfermedad = c.IdEnfermedad
//      where c.IdConsulta = '$id' and c.Activo = 1";
     
//    //echo  $queryfichaconsulta;
//    $resultadofichaconsulta = $mysqli->query($queryfichaconsulta);
//    while ($test = $resultadofichaconsulta->fetch_assoc()) {
//    $idconsulta = $test['IdConsulta'];
//    $idusuario = $test['Medico'];
//    $idusuarioid = $test['IdUsuario'];
//    $idpersona = $test['Paciente'];
//    $idpersonaid = $test['id'];
//    $idmodulo = $test['Especialidad'];
//    $idmoduloing = $test['Descripcion'];
//    $fechaconsulta = $test['Fecha'];
//    $diagnostico = $test['Diagnostico'];
//    $comentarios = $test['Comentarios'];
//    $otros = $test['Otros'];
//    $EstadoNutricional = $test['EstadoNutricional'];
//    $CirugiasPrevias = $test['CirugiasPrevias'];
//    $MedicamentosActuales = $test['MedicamentosActuales'];
//    $ExamenFisica = $test['ExamenFisica'];
//    $PlanTratamiento = $test['PlanTratamiento'];
//    $FechaProxVisita = $test['FechaProxVisita'];
//    $Alergias = $test['Alergias'];
//    $Enfermedad = $test['Enfermedad'];
// }




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




// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS EN EL EXPEDIENTE DEL PACIENTE
$querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                          CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                          FROM consulta c
                          INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                          INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                          INNER JOIN persona p ON c.IdPersona = p.IdPersona
                          WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid and c.IdEstado = 7
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

// CONSULTA PARA CARGAR EL CBO DE LOS PROCEDIMIENTOS
$querydienteprocedimiento = "SELECT IdDienteProcedimiento, DescripcionProcedimiento FROM dienteprocedimiento";
$resultadodienteprocedimiento = $mysqli->query($querydienteprocedimiento);

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


$queryusuario = "SELECT u.IdUsuario, CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto'
	from usuario u
	inner join puesto = p on u.IdPuesto = p.IdPuesto
	where p.Descripcion = 'Odontologia' and u.Activo = 1 ";
 $resultadousuario = $mysqli->query($queryusuario);


 $querymodulo = "SELECT * FROM modulo WHERE IdModulo in(1) order by NombreModulo asc";
 $resultadomodulo = $mysqli->query($querymodulo);

?>
