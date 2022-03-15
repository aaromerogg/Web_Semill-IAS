<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $email = $con ->real_escape_string(htmlentities($_POST['email']));

    $sel = $con->query("SELECT user,email  FROM usuarios WHERE email = '$email' ");

    if ($f = $sel->fetch_assoc()) {
        $correo = $f['email'];
        $user = $f['user'];
    }
    else{
        echo "fail";
    }

    if ($email == $correo) {

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        $URL = 'http://127.0.0.1/neveraur/NuevaContraseña.php?v={{codigo}}';
        $URL = str_replace("{{codigo}}", $pass, $URL);

        $consulta = mysqli_query($con, "UPDATE usuarios SET codigo = '$pass' WHERE email = '$email'");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                    //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                           //Enable SMTP authentication
            $mail->Username   = 'urneveras@gmail.com';          //SMTP username
            $mail->Password   = 'IoTNeveras';                   //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
            $mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('urneveras@gmail.com', 'Grupo IoT URosario');
            $mail->addAddress($email, $user);     //Add a recipient

            //Content
            $mail->isHTML(true);                                 //Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Recuperación de Contraseña - SiMCa-Bio';
            $mail->Body    = 'Hola {{name}}, <br><br> Recientemente solicitó restablecer su contraseña para su cuenta en el Sistema de Monitoreo de la Calidad de Equipos Biomédicos (SiMCa-Bio). Haga clic
                              en el link de abajo para realizar el cambio de su contraseña.
                              <br><br> <a href={{URL}}> LINK </a> <br><br> Si no solicitó restablecer su contraseña, ignore este correo electrónico o póngase en contacto con el
                              servicio de asistencia si tiene alguna pregunta. <br><br> Gracias, <br> Grupo IoT U Rosario';
            $mail ->Body = str_replace("{{URL}}", $URL, $mail ->Body);
            $mail ->Body = str_replace("{{name}}", $user, $mail ->Body);

            $mail->send();
            echo 'success';
        } catch (Exception $e) {
            echo "Message could not be sent";
        }
        
        
        $sel->close();
        $con->close();
    }
    else{
        echo "fail";
    }
}

?>
