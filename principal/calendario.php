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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Semill-IAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <?php include '../includes/metadatos.html';?>
</head>

<?php include '../includes/header2.php';?>

<body onload="M.AutoInit()" background="../img/bkt.png" background-size="1rem">

<main id='app' style = "zoom:88%">

    <br><br>

    <div id="calendarContainer" class="center">
	    <iframe src="https://calendar.google.com/calendar/embed?height=500&wkst=1&bgcolor=%23dde7e9&ctz=America%2FBogota&showPrint=0&showTz=0&showNav=1&title=Calendario Semill-IAS&src=YnJuczRwdGFzZ2YzN2dwNDc3bDRybzM1YjRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=ZXMuY28jaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23E4C441&color=%23D81B60" style="border:solid 3px #777" width="1300" height="550" frameborder="0" scrolling="no"></iframe>
    </div>

</main>

  
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/appLogin.js"></script>
    <script src="../js/imagenes.js"></script>
    
    <?php include '../includes/footer.php';?>

</body>

<script src="../includes/Home.js"></script>

</html>

