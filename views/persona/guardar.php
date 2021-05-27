<?php
include '../../include/dbconnect.php';
session_start();



    //Guardar la geografia correcta
    $geografia = "";

    if(isset($_POST['txtDepartamento']))
        $geografia = $_POST['txtDepartamento'];

    if(isset($_POST['txtMunicipio']))
        $geografia = $_POST['txtMunicipio'];

    if(isset($_POST['txtCanton']))
        $geografia = $_POST['txtCanton'];


    $usuario = $_SESSION['IdUsuario'];
    $Nombres = strtoupper($_POST['txtNombres']);
    $Apellidos = strtoupper($_POST['txtApellidos']);
    $FechaNacimiento = $_POST['txtFechaNacimiento'];
    $dia = substr($FechaNacimiento, 0, 2);
    $mes = substr($FechaNacimiento, 3, 2);
    $anio = substr($FechaNacimiento, 6, 4);
    $FechaNacimientoPersona = $anio.'-'.$mes.'-'.$dia;    
    echo $FechaNacimientoPersona;
    $Direccion = strtoupper($_POST['txtDireccion']);
    $Correo = strtoupper($_POST['txtCorreo']);
    // $IdGeografia = $geografia;
    $Genero = $_POST['txtGenero'];
    // $IdEstadoCivil = $_POST['txtIdEstadoCivil'];
    //$IdParentesco = 1; //$_POST['txt'];
    $Telefono = $_POST['txtTelefono'];
    $Celular = $_POST['txtCelular'];
    $Alergias = $_POST['txtAlergias'];
    $Medicamentos = $_POST['txtMedicamentos'];
    $Enfermedad = $_POST['txtEnfermedad'];
    //$Dui = $_POST['txtDui'];
    $TelefonoResponsable = $_POST['txtTelefonoResponsable'];
    $IdEstado = "1";
    $Categoria = $_POST['txtCategoria'];

    //Datos del Responsable
    $NombresResponsable = strtoupper($_POST['txtNombresResponsable']);
    $ApellidosResponsable = $_POST['txtApellidosResponsable'];
    $DuiResponsable = $_POST['txtDuiResponsable'];
    $Parentesco = $_POST['txtParentesco'];
    // $IdPais = $_POST['txtIdPais'];

    $querybc = "SELECT CASE WHEN IdPersona IS NULL THEN 90000001 ELSE MAX(CONCAT(9,'',LPAD((SELECT MAX(IDPERSONA) FROM persona), 7 , 0))) + 1 END AS BC FROM persona";
    $resultadobc = $mysqli->query($querybc);
    while ($test = $resultadobc->fetch_assoc()) {
        $bc = $test['BC'];
    }


           $insertexpediente = "INSERT INTO persona
                        (
                             Nombres,Apellidos,FechaNacimiento,Direccion
                            ,Correo,Genero
                            ,Telefono,Celular,Alergias, IdGeografia
                            ,Medicamentos,Enfermedad,TelefonoResponsable
                            ,IdEstado,Categoria,NombresResponsable
                            ,ApellidosResponsable,Parentesco,DuiResponsable,CodigoPaciente
                        )
                        VALUES
                        (
                             '$Nombres','$Apellidos','$FechaNacimientoPersona','$Direccion'
                            ,'$Correo','$Genero'
                            ,'$Telefono','$Celular','$Alergias', 0
                            ,'$Medicamentos','$Enfermedad','$TelefonoResponsable'
                            ,'$IdEstado','$Categoria','$NombresResponsable'
                            ,'$ApellidosResponsable','$Parentesco','$DuiResponsable',$bc
                        )";


    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    $last_id = $mysqli->insert_id;

    echo $resultadoinsertmovimiento;
    $query = "select IdPersona from persona order by 1 desc limit 1";
                            
    $tbl = $mysqli->query($query);
    $arr = array();

    while ($f = $tbl->fetch_assoc())
    {
      $arr[] = $f;
    }

    $IdPersona = $arr[0]["IdPersona"];

    echo "<h1>$IdPersona</h1>";


    //CREACION DEL ORTOGRAMA
    $strOdontograma = "INSERT INTO dienteortograma (IdPersona,Fecha,Hora) VALUES ($IdPersona,NOW(),NOW())";
    $resultTest = $mysqli->query($strOdontograma);

    //OBTIENE EL ULTIMO IDORTOGRAMA CREADO
    $query = "SELECT IdDienteOrtograma FROM dienteortograma order by 1 desc limit 1";
    $tbl = $mysqli->query($query);
    $arrTest = array();
    while ($f = $tbl->fetch_assoc())
    {
      $arrTest[] = $f;
    }
    $IdDienteOrtograma = $arrTest[0]["IdDienteOrtograma"];

    //OBTENER LA POSICION DE LOS DIENTES
    $queryDientePosicion = "SELECT IdDientePosicion FROM dienteposicion";
    $tblDientePosicion = $mysqli->query($queryDientePosicion);
    //BARRIDO Y CREACION DEL CAREOGRAMA DETALLADO
    while ($test = $tblDientePosicion->fetch_assoc())
	           {
                   $IdDientePosicion =  $test['IdDientePosicion'];


	               $queryInsResp = "INSERT INTO dienteortogramadetalle
	                                   (IdDientePosicion, IdDienteProcedimiento, IdDienteOrtograma)
	                               VALUES
	                                   ($IdDientePosicion, 1, $IdDienteOrtograma)
	                               ";
	               $resultInsResp = $mysqli->query($queryInsResp);

	           }


    ////Insertando el registro para el test de la persona
    $strTest = "INSERT INTO test (IdPersona,IdClase,Fecha,Hora) VALUES ($IdPersona,1,NOW(),NOW())";
    $resultTest = $mysqli->query($strTest);

    echo "<h2>$strTest</h2>";

    ////Determinando el IdTest
    $query = "SELECT IdTest FROM test order by 1 desc limit 1";

    $tbl = $mysqli->query($query);
    $arrTest = array();

    while ($f = $tbl->fetch_assoc())
    {
      $arrTest[] = $f;
    }

    $IdTest = $arrTest[0]["IdTest"];



    //Guardar gestacion
    $query = "SELECT IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 4 and activo = 1;";
    $tblPregGE = $mysqli->query($query);
    $arrPregGE = array();

    while ($f = $tblPregGE->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 4;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "INSERT into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "INSERT into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }

    //Guardar nacimiento
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 5 and activo = 1;";
    $tblPregNA = $mysqli->query($query);
    $arrPregNA = array();

    while ($f = $tblPregNA->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 5;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:
                break;
        }
    }

    //Guardar infancia
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 6 and activo = 1;";
    $tblPregIN = $mysqli->query($query);
    $arrPregIN = array();

    while ($f = $tblPregIN->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 6;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }
    }

    //Guardar amamantamiento
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 7 and activo = 1;";
    $tblPregAM = $mysqli->query($query);
    $arrPregAM = array();

    while ($f = $tblPregAM->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 7;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }

    //Guardar alimentacion
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 8 and activo = 1;";
    $tblPregAL = $mysqli->query($query);
    $arrPregAL = array();

    while ($f = $tblPregAL->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 8;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }

    //Guardar endulzantes
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 9 and activo = 1;";
    $tblPregEN = $mysqli->query($query);
    $arrPregEN = array();

    while ($f = $tblPregEN->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 9;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }

    //Guardar alimentacion nocturna
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 10 and activo = 1;";
    $tblPregAN = $mysqli->query($query);
    $arrPregAN = array();

    while ($f = $tblPregAN->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 10;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }

    //Guardar higiene dental
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 11 and activo = 1;";
    $tblPregHD = $mysqli->query($query);
    $arrPregHD = array();

    while ($f = $tblPregHD->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 11;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }


    //Guardar primera visita
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 12 and activo = 1;";
    $tblPregHD = $mysqli->query($query);
    $arrPregHD = array();

    while ($f = $tblPregHD->fetch_assoc())
    {
        $IdPregunta = $f["IdPregunta"];
        $Ponderacion = $f["Ponderacion"];

        $IdFactor = 12;
        $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

        switch ($Ponderacion) {
            case "0":
            {
                //Insertar una respuesta por pregunta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "1":
            {
                //Insertar la respuesta abierta
                $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,Detalle)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                        ";
                $resultInsResp = $mysqli->query($queryInsResp);
                //echo "<h3>$queryInsResp</h3>";
                break;
            }
            case "2":
            {
                //Insertar múltiples respuestas
                echo "<h1>$IdRespuesta</h1>";
                for ($i=0;$i<count($IdRespuesta);$i++)
                {
                    $idResp = $IdRespuesta[$i];
                    $queryInsResp = "insert into testdetalle
                            (IdTest,IdFactor,IdPregunta,IdRespuesta)
                        values
                            ($IdTest,$IdFactor,$IdPregunta,$idResp);
                        ";
                    $resultInsResp = $mysqli->query($queryInsResp);
                    //echo "<h3>$queryInsResp</h3>";
                }

                break;
            }
            default:

                break;
        }

    }

    header('Location: ../../web/persona/view?id='.$last_id);

