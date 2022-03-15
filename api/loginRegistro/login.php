<?php
session_start();
?>
<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$email = $con ->real_escape_string(htmlentities($_POST['email']));
$pass = $con ->real_escape_string(htmlentities($_POST['pass']));


$sel = $con->query("SELECT user,foto,email,pass,estado,tipousuario  FROM usuarios WHERE email = '$email' ");

if ($f = $sel->fetch_assoc()) {
   $correo = $f['email'];
   $password = $f['pass'];
   $user = $f['user'];
   $foto = $f['foto'];
   $estado = $f['estado'];
   $tipousuario = $f['tipousuario'];
   $passEncriptada = password_verify($pass,$password);

   if ($email == $correo && $passEncriptada == true) {
    $_SESSION['user'] = $user;
    $_SESSION['foto'] = $foto;
    if($estado==1){

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] =  $correo;
        $_SESSION['tipousuario'] =  $tipousuario;
        echo "success";
    }else{
        $sel2 = $con->query("SELECT email FROM usuarios WHERE tipousuario = 'admin' ");

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
