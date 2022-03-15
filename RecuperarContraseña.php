
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

<link rel="manifest" href="./manifest.json"> <!-- meta etiquetas para PWA-->
</head>



<!--<body onload="myFunction()">-->
<body >

<main id='app' class="container center">
<br><br>
<div class="container center" style="width:70%;">

    <br><br>
    <div id="iniciarSesion" class="row" style="margin:0,auto; width:100%;" >
      <div class="col s12 m12 l12">
        <div class="card">
          <div class="card-content">
            <img src="img/LogoSemill-IAS.jpeg" width=250>
            <span class="card-title">Recuperar contraseña</span> 
            <form id="recuperar" autocomplete="off" @submit.prevent="recuperarPassword" >
                <input type="email" name="email" v-model="correo" placeholder="Correo electronico" @blur="validarCorreo2" required  >
                
                <input type="submit" value="Enviar" style = "background-color:#1e88e5" class="btn" >
            </form>
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
    <script src="js/appLogin.js"></script>

    <script src="./script.js"></script>

</body>

<script>

</script>

</html>