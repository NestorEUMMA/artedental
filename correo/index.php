<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


$array = explode("\n", file_get_contents('C:\xampp\htdocs\artedental\config\db.txt'));
$localhost = $array[0];
$db = trim($array[1]);
$usuario = trim($array[2]);
$clave = trim($array[3]);

if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', $usuario);
if (!defined('DB_DATABASE')) define('DB_DATABASE', $db);
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', $clave);

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if($mysqli === true) {
    die ("Todo nice. " . mysqli_connect_error());
    }
if ($mysqli === false) {
die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
}
$querycorreo = "SELECT host, username, password, port, setfrom, setfromname, titulo, cuerpo FROM correo WHERE IdCorreo  = '1'";
$resultadocorreo = $mysqli->query($querycorreo);
while ($test = $resultadocorreo->fetch_assoc()) {
    $host = $test['host'];
    $username = $test['username'];
    $password = $test['password'];
    $port = $test['port'];
    $setfrom = $test['setfrom'];
    $setfromname = $test['setfromname'];
    $titulo = $test['titulo'];
    $cuerpo = $test['cuerpo'];
}

   $querylistadocorreos = "SELECT CONCAT(P.Nombres,' ',P.Apellidos) AS 'paciente', P.IdPersona AS idPersona, P.correo AS 'correo'  ,c.FechaProxVisita AS 'fechaprox'
                        FROM consulta C
                        INNER JOIN persona P on P.Idpersona = C.IdPersona
                        WHERE c.estadocorreo = 0 and c.FechaProxVisita = CURDATE() and p.correo <> '' ";
   $resultadolistadocorreos = $mysqli->query($querylistadocorreos);


   while ($row = $resultadolistadocorreos->fetch_assoc())
   {
        $idPaciente = $row['idPersona'];
        $paciente = $row['paciente'];
        $correo = $row['correo'];

        echo $paciente;
        echo $correo;
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $host;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $username;                     //SMTP username
            $mail->Password   = $password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($setfrom, $setfromname);
            $mail->addAddress($correo, $paciente);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $titulo;
            $mail->Body    = $cuerpo;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $querylistadocorreosupdate = "UPDATE consulta SET estadocorreo = 1 WHERE IdPersona = $idPaciente";
            $resultadolistadocorreosupdate = $mysqli->query($querylistadocorreosupdate);
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
