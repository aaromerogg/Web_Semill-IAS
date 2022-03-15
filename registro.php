
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
   content="Bienvenid@s a #ProgramadorFitness, serie de videos, donde te daré consejos para llevar una vida saludable y evitar el sedentarismo. Recuerda... mente sana en cuerpo sano :)">

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

<main id='app'>
    <div class="container center" style="zoom:88%">

    <br><br>
    <div id="iniciarSesion" class="row" style="margin:0,auto; width:100%;" >
    <div class="col s12 m12 l12">
      <div class="card">
        <div class="card-content">
        <img src="img/LogoSemill-IAS.jpeg" width=250>
          <span class="card-title">Registrarse</span> 
         
          <form id="formRegistro" autocomplete="off" @submit.prevent="registro" enctype="multipart/form-data" >
                <input type="text" name="usuario" placeholder="Nombre de usuario" required pattern="[A-Za-z]{5,30}" >
                <input type="password" v-model="pass" name="pass" placeholder="Password" required pattern="[A-Za-z0-9]{8,15}" >
                <input type="password" v-model="passC"  placeholder="Confirmar Password" required pattern="[A-Za-z0-9]{8,15}" >
                <input type="email" v-model="correo" name="email" placeholder="Correo electronico" @blur="validarCorreo" required >
                <div class="file-field input-field">
                        <div class="btn" style="background-color:#1e88e5">
                            <span>Imagen de perfil</span>
                            <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                </div>
                
                <input type="submit" value="Registrarse" style="background-color:#1e88e5" class="btn" >
            </form>
        </div>
        <div class="card-action">
          <a class = "left" style = "color:#1e88e5;width:100%" href="index.php">Iniciar sesion</a><br>
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

</html>