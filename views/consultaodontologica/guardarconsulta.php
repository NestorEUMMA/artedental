
 <?php

require_once '../../include/dbconnect.php';
session_start();

    $user = $_SESSION['IdUsuario'];
    $persona = $_POST['txtPaciente'];
    $usuario = $_POST['cboUsuario'];
    $modulo = $_POST['cboModulo'];

		//AL MOMENTO DE ALMACENAR LA CONSULTA, EL IDESTADO SE GUARDA EN 1, ESO SIGNIFICA QUE NO TIENE ALMACENADOS SIGNOS VITALES
    $insertexpediente = "INSERT INTO consulta(IdUsuario,IdPersona,IdModulo,FechaConsulta, Activo, IdEstado)"
                       . "VALUES ('$usuario','$persona','$modulo',now(), 1, 1)";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    $last_id = $mysqli->insert_id;

    $insertexpediente2 = "UPDATE persona SET IdEstado=7  WHERE IdPersona='$persona'";
    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

    $insertexpediente3 = "UPDATE consulta SET IdEstado=7, Status=1 WHERE IdConsulta='$insert_id'";
    $resultadoinsertmovimiento3 = $mysqli->query($insertexpediente3);

    header('Location: ../../web/consultaodontologica/index');