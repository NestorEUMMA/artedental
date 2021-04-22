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
    $Nombres = $_POST['txtNombres'];
    $Apellidos = $_POST['txtApellidos'];
    $FechaNacimiento = $_POST['txtFechaNacimiento'];
    $Direccion = $_POST['txtDireccion'];
    $Correo = $_POST['txtCorreo'];
    $IdGeografia = $geografia;
    $Genero = $_POST['txtGenero'];
    $IdEstadoCivil = $_POST['txtIdEstadoCivil'];
    //$IdParentesco = 1; //$_POST['txt'];
    $Telefono = $_POST['txtTelefono'];
    $Celular = $_POST['txtCelular'];
    $Alergias = $_POST['txtAlergias'];
    $Medicamentos = $_POST['txtMedicamentos'];
    $Enfermedad = $_POST['txtEnfermedad'];
    $Dui = $_POST['txtDui'];
    $TelefonoResponsable = $_POST['txtTelefonoResponsable'];
    $IdEstado = "1";
    $Categoria = $_POST['txtCategoria'];

    //Datos del Responsable
    $NombresResponsable = $_POST['txtNombresResponsable'];
    $ApellidosResponsable = $_POST['txtApellidosResponsable'];
    $DuiResponsable = $_POST['txtDuiResponsable'];
    $Parentesco = $_POST['txtParentesco'];
    $IdPais = $_POST['txtIdPais'];

    $querybc = "SELECT CASE WHEN IdPersona IS NULL THEN 90000001 ELSE MAX(CONCAT(9,'',LPAD((SELECT MAX(IDPERSONA) FROM persona), 7 , 0))) + 1 END AS BC FROM persona";
    $resultadobc = $mysqli->query($querybc);
    while ($test = $resultadobc->fetch_assoc()) {
        $bc = $test['BC'];
    }

    $query = "select Dui from persona where Dui = '".$Dui."'";
    $results = $mysqli->query( $query) or die('ok');

    if($results->fetch_assoc() > 0) // not available
    {  
        echo '<script>window.location="../../web/persona/index"</script>';  

    } else{ 

           $insertexpediente = "INSERT INTO persona
                        (
                             Nombres,Apellidos,FechaNacimiento,Direccion
                            ,Correo,IdGeografia,Genero,IdEstadoCivil
                            ,Telefono,Celular,Alergias
                            ,Medicamentos,Enfermedad,Dui,TelefonoResponsable
                            ,IdEstado,Categoria,NombresResponsable
                            ,ApellidosResponsable,Parentesco,DuiResponsable,IdPais,CodigoPaciente
                        )
                        VALUES
                        (
                             '$Nombres','$Apellidos','$FechaNacimiento','$Direccion'
                            ,'$Correo','$IdGeografia','$Genero','$IdEstadoCivil'
                            ,'$Telefono','$Celular','$Alergias'
                            ,'$Medicamentos','$Enfermedad','$Dui','$TelefonoResponsable'
                            ,'$IdEstado','$Categoria','$NombresResponsable'
                            ,'$ApellidosResponsable','$Parentesco','$DuiResponsable',$IdPais,$bc
                        )";


    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    //echo $insertexpediente;
    $last_id = $mysqli->insert_id;

   

    $query = "select IdPersona from persona order by 1 desc limit 1";

    $tbl = $mysqli->query($query);
    $arr = array();

    while ($f = $tbl->fetch_assoc())
    {
      $arr[] = $f;
    }

    $IdPersona = $arr[0]["IdPersona"];

    echo "<h1>$IdPersona</h1>";

    ////Insertando el registro para el test de la persona
    $strTest = "insert into test
                    (IdPersona,IdClase,Fecha,Hora)
                VALUES
                    ($IdPersona,1,NOW(),NOW())
                ";
    $resultTest = $mysqli->query($strTest);

    echo "<h2>$strTest</h2>";

    ////Determinando el IdTest
    $query = "select IdTest from test order by 1 desc limit 1";

    $tbl = $mysqli->query($query);
    $arrTest = array();

    while ($f = $tbl->fetch_assoc())
    {
      $arrTest[] = $f;
    }

    $IdTest = $arrTest[0]["IdTest"];




    ////Barriendo las preguntas del socioeconómico
    // $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 1;";
    // $tblPreguntas = $mysqli->query($query);
    // $arrPreguntas = array();

    // while ($f = $tblPreguntas->fetch_assoc())
    // {
    //     $IdPregunta = $f["IdPregunta"];
    //     $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];
    //     $IdFactor = 1;

    //     $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,IdRespuesta)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta)
    //                     ";
    //     $resultInsResp = $mysqli->query($queryInsResp);
    // }



    // $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 2;";
    // $tblPregHC = $mysqli->query($query);
    // $arrPregHC = array();

    // while ($f = $tblPregHC->fetch_assoc())
    // {
    //     $IdPregunta = $f["IdPregunta"];
    //     $Ponderacion = $f["Ponderacion"];

    //     $IdFactor = 2;
    //     $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

    //     switch ($Ponderacion) {
    //         case "0":
    //         {
    //             ////Insertar una respuesta por pregunta
    //             $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,IdRespuesta)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
    //                     ";
    //             $resultInsResp = $mysqli->query($queryInsResp);
    //             ////echo "<h3>$queryInsResp</h3>";
    //             break;
    //         }
    //         case "1":
    //         {
    //             ////Insertar la respuesta abierta
    //             $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,Detalle)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
    //                     ";
    //             $resultInsResp = $mysqli->query($queryInsResp);
    //             ////echo "<h3>$queryInsResp</h3>";
    //             break;
    //         }
    //         case "2":
    //         {
    //             ////Insertar múltiples respuestas
    //             echo "<h1>$IdRespuesta</h1>";
    //             for ($i=0;$i<count($IdRespuesta);$i++)
    //             {
    //                 $idResp = $IdRespuesta[$i];
    //                 $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,IdRespuesta)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,$idResp);
    //                     ";
    //                 $resultInsResp = $mysqli->query($queryInsResp);
    //                 ////echo "<h3>$queryInsResp</h3>";
    //             }

    //             break;
    //         }
    //         default:

    //             break;
    //     }

    // }



    ////Guardar vacunación
    // $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 3;";
    // $tblPregEV = $mysqli->query($query);
    // $arrPregEV = array();

    // while ($f = $tblPregEV->fetch_assoc())
    // {
    //     $IdPregunta = $f["IdPregunta"];
    //     $Ponderacion = $f["Ponderacion"];

    //     $IdFactor = 3;
    //     $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

    //     switch ($Ponderacion) {
    //         case "0":
    //         {
    //             ////Insertar una respuesta por pregunta
    //             $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,IdRespuesta)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
    //                     ";
    //             $resultInsResp = $mysqli->query($queryInsResp);
    //             ////echo "<h3>$queryInsResp</h3>";
    //             break;
    //         }
    //         case "1":
    //         {
    //             ////Insertar la respuesta abierta
    //             $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,Detalle)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
    //                     ";
    //             $resultInsResp = $mysqli->query($queryInsResp);
    //             ////echo "<h3>$queryInsResp</h3>";
    //             break;
    //         }
    //         case "2":
    //         {
    //             ////Insertar múltiples respuestas
    //             echo "<h1>$IdRespuesta</h1>";
    //             for ($i=0;$i<count($IdRespuesta);$i++)
    //             {
    //                 $idResp = $IdRespuesta[$i];
    //                 $queryInsResp = "insert into testdetalle
    //                         (IdTest,IdFactor,IdPregunta,IdRespuesta)
    //                     values
    //                         ($IdTest,$IdFactor,$IdPregunta,$idResp);
    //                     ";
    //                 $resultInsResp = $mysqli->query($queryInsResp);
    //                 ////echo "<h3>$queryInsResp</h3>";
    //             }

    //             break;
    //         }
    //         default:

    //             break;
    //     }

    // }


    //Guardar gestacion
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 4;";
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

    //Guardar nacimiento
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 5;";
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
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 6;";
    $tblPregIN = $mysqli->query($query);
    $arrPregIN = array();

    while ($f = $tblPregGE->fetch_assoc())
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
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 7;";
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
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 8;";
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
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 9;";
    $tblPregEN = $mysqli->query($query);
    $arrPregEN = array();

    while ($f = $tblPregGE->fetch_assoc())
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
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 10;";
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
    $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 11;";
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

     header('Location: ../../web/persona/view?id='.$last_id);
    }
