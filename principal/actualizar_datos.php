<?php

include '../api/conexion.php';

$b = $_POST['b'];

if ($b == 0){
    $id = $_POST['id'];
    $texto = $_POST['texto'];
    $variable = $_POST['variable'];
    $fechaObs = $_POST['fechaObs'];
    $horaObs = $_POST['horaObs'];


    if ($variable == '1'){
        $consulta = mysqli_query($con, "UPDATE alerttemperature SET obs = '$texto' WHERE alerttemperature.id = $id"); 
        $consulta = mysqli_query($con, "INSERT INTO historialobs (id,fecha,hora,obs,idalerta,variable) VALUES (DEFAULT,'$fechaObs','$horaObs','$texto',$id,1)"); 
    }
    else if ($variable == '2'){
        $consulta = mysqli_query($con, "UPDATE alertcurrent SET obs = '$texto' WHERE alertcurrent.id = $id"); 
        $consulta = mysqli_query($con, "INSERT INTO historialobs (id,fecha,hora,obs,idalerta,variable) VALUES (NULL,'$fechaObs','$horaObs','$texto',$id,2)"); 
    }

}
else if ($b == 1){
    $nombre = $_POST['id'];
    $accion = $_POST['accion'];
    $consulta = mysqli_query($con, "UPDATE integrantes SET estado = $accion WHERE nombre = $nombre"); 
    if ($accion == 'activo'){echo "activo";}
    if ($accion == 'inactivo'){echo "inactivo";}
    
}
else if ($b == 2){
    $codigo = $_POST['codigo'];
    $password = $_POST['contrasena'];
    $passEncriptada = password_hash($password, PASSWORD_BCRYPT);
    $consulta = mysqli_query($con, "UPDATE usuarios SET pass = '$passEncriptada', codigo = '' WHERE codigo = '$codigo'");
}

if (!$consulta){
    echo "Error al actualizar los datos." . mysql_error();
    exit();
}
else{
    echo "Se han actualizado los datos";
}

?>
