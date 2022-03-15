<?php
include 'api/conexion.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Semill-IAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<meta name="description"
   content="">

<meta name="theme-color" content="#F0DB4F"><!-- meta etiquetas para PWA pinta la pestaña superior de la app-->
<meta name="MobileOptimized" content="width"><!-- meta etiquetas para PWA-->
<meta name="HandheldFriendly" content="true"><!-- meta etiquetas para PWA-->
<meta name="apple-mobile-web-app-capable" content="yes"><!-- meta etiquetas para PWA-->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> <!-- meta etiquetas para PWA-->

<link rel="apple-touch-icon" href="./logo.svg"><!-- meta etiquetas para PWA-->
<link rel="apple-touch-startup-image" href="./logo.svg">
<link rel="shortcut icon" type="image/png" href="./img/logo.svg"> <!-- meta etiquetas para PWA-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="manifest" href="./manifest.json"> <!-- meta etiquetas para PWA-->
</head>



<!--<body onload="myFunction()">-->
<body >

<main id='app' class="container center">
<br><br><br>    
<div class="container center" style="width:70%;">

    <br><br>
    <div id="iniciarSesion" class="row" style="margin:0,auto; width:100%;" >
      <div class="col s12 m12 l12">
        <div class="card">
          <div class="card-content">
            <img src="img/LogoSemill-IAS.jpeg" width=250>
                <input id="Pass" type="password" name="pass" placeholder="Nueva Contraseña" required pattern="[A-Za-z0-9]{8,15}" >
                <input id="Pass2" type="password" name="confirmpass" placeholder="Repetir Contraseña" required pattern="[A-Za-z0-9]{8,15}" >
                <button class="btn" style="background-color:#1e88e5;color:white" id= "BtnAceptar"  onclick="comparePass()">Aceptar</button>
          </div>
          <div class="card-action">
            <a class = "left" style = "color:#1e88e5;width:100%" href="index.php">Iniciar Sesión</a> 
            <br> 
          </div>
        </div>
      </div>
    </div>
</div>    
</main>
   
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/main.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="js/appLogin.js"></script>

    <script src="./script.js"></script>

</body>

<script>

function comparePass(){
    
    var contrasena = document.getElementById('Pass').value;
    var repetirContrasena = document.getElementById('Pass2').value;
    var URLactual = window.location.search + 'd';
    var codigo = URLactual.slice(3, -1);
    
    if (contrasena != repetirContrasena){
        Swal.fire({title:"Error!", text: "Las contraseñas no coinciden. Por favor, verifique la información.", icon: "error",confirmButtonColor: "rgb(26, 35, 126)"})
        document.getElementById('Pass').value = ""; 
        document.getElementById('Pass2').value = "";
    }
    else{
        $.ajax({
            url: "principal/actualizar_datos.php", method: "POST",
            data:{codigo:codigo,contrasena:contrasena, b:2},
            success: function(data){
                Swal.fire({title:"Hecho!", text: "Su contraseña ha sido cambiada con éxito.", icon: "success",confirmButtonColor: "rgb(26, 35, 126)"})
                .then((result) => {
                    if (result.isConfirmed) {
                        location.href = 'index.php';
                    }
                })
      
            }
        })

        
    }

}

</script>

</html>