<?php
session_start();
?>
<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$email = $con ->real_escape_string(htmlentities($_POST['email']));
$pass = $con ->real_escape_string(htmlentities($_POST['pass']));


$sel = $con->query("SELECT nombre,email,pass,estado,tipo_usuario  FROM integrantes WHERE email = '$email' ");

if ($f = $sel->fetch_assoc()) {
   $correo = $f['email'];
   $password = $f['pass'];
   $user = $f['nombre'];
   $estado = $f['estado'];
   $tipousuario = $f['tipo_usuario'];
   #$passEncriptada = password_verify($pass,$password);
   $passEncriptada = ($pass==$password);

   if ($email == $correo && $passEncriptada == true) {
    $_SESSION['user'] = $user;
    if($estado=='activo'){

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] =  $correo;
        $_SESSION['tipousuario'] =  $tipousuario;
        echo "success";
    }else{
        $sel2 = $con->query("SELECT email FROM integrantes WHERE tipo_usuario = 'admin' ");

        if ($f2 = $sel2->fetch_assoc()) {
            $correoadmin = $f2['email'];
        }
        echo $correoadmin;	
    }

   } else {
    echo "fail";
    }

} else {
    echo "non";
}


$sel->close();
$con->close();
}
else{
   // header("location:../../index.php");
}
?>
