<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // $foto = $_SESSION['foto'];
    $usuario = $_SESSION['user'];
    $email = $_SESSION['username'];

//   echo("<script>var foto = " . json_encode($foto) . ";var usuario = " . json_encode($usuario) . ";var email = " . json_encode($email) . ";");
//   echo "console.log(foto,usuario,email);";
//   echo "</script>";
  

} else {
 header('location:../index.php');
 exit;
}
include '../api/conexion.php';
?>
<?php
    $busqueda = $con->query("SELECT foto FROM informacion WHERE email = '$email' ");
    if ($f = $busqueda->fetch_assoc()) {
    $foto = $f['foto'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Semill-IAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/materialize.css">
    <script src="../js/sweetalert2.all.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <?php include '../includes/metadatos.html';?>
  </head>

<?php include '../includes/header2.php';?>

<body onload="M.AutoInit()">
<body >

<main id='app'>
    <div class="container center" style="zoom:88%">

    <br><br>
    <div id="iniciarSesion" class="row" style="margin:0,auto; width:100%;" >
    <div class="col s12 m12 l12">
      <div class="card">
        <div class="card-content">
            <?php
        echo '<img src="data:image/png;base64,'.base64_encode($foto).'"/>';
            ?>
        <!-- <img src="img/LogoSemill-IAS.jpeg" width=250> -->
          <span class="card-title"><?php echo $usuario ?></span> 
         
          <form id="formRegistro" autocomplete="off" @submit.prevent="registro" enctype="multipart/form-data" >
                <input type="text" name="usuario" placeholder="Nombre" required pattern="[A-Za-z\s]{1,50}" >
                <input type="password" v-model="pass" name="pass" placeholder="Password" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]){8,32}" >
                <input type="password" v-model="passC"  placeholder="Confirmar Password" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]){8,32}" >
                <input type="email" v-model="correo" name="email" placeholder="Correo electronico" @blur="validarCorreo" required >
                <!-- <div class="file-field input-field">
                        <div class="btn" style="background-color:#1e88e5">
                            <span>Imagen de perfil</span>
                            <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                </div> -->
                
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
  
    <script src="../js/materialize.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/appLogin.js"></script>
    <script src="../js/imagenes.js"></script>

</body>

</html>