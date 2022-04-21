
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $usuario = $_SESSION['user'];
    $email = $_SESSION['username'];

  #echo("<script>var foto = " . json_encode($foto) . ";var usuario = " . json_encode($usuario) . ";var email = " . json_encode($email) . ";");
  #echo "console.log(foto,usuario,email);";
  #echo "</script>";
  

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

<?php include '../includes/header.php';?>

<body onload="M.AutoInit()" background="../img/bkt.jpg">

<main id='app' style = "zoom:88%">
<br><br>

<div class="container center" style="">
  <div class="row">
    <div class="col m4 s12 l4">
      <div class="row">        
        <div class="col s12 m12">
          <div class="card">
            <div class="card-image">
              <a href="VisualizarActas.php"><img src="../img/actas.jpg" style="width: 60%; margin:auto;padding-top: 10px;"></a>
            </div>
            <div class="card-content">
              <div class="row">
                <div class = "col s12 m12"><label style="font-size:25px;color:black;text-align: justify">Actas</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col m4 s12 l4">
      <div class="row">        
        <div class="col s12 m12">
          <div class="card">
            <div class="card-image">
            <a href="calendario.php"><img src="../img/calendario.jpg" style="width: 60%; margin:auto;padding-top: 10px;"></a>
            </div>
            <div class="card-content">
              <div class="row">
                <div class = "col s12 m12"><label style="font-size:25px;color:black;text-align: justify">Calendario</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col m4 s12 l4">
      <div class="row">        
        <div class="col s12 m12">
          <div class="card">
            <div class="card-image">
            <a href="perfil.php"><img src="../img/img_perfil.jpg" style="width: 60%; margin:auto;padding-top: 10px;"></a>
            </div>
            <div class="card-content">
              <div class="row">
                <div class = "col s12 m12"><label style="font-size:25px;color:black;text-align: justify">Perfil</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class = "container center">
    
      <div class="row center">        
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content">
            <span class="card-title" style = "#616161"><b>ENLACES DE INTERÉS</b></span>
              <div class="row">
                  <a style="color:#c51162" href="https://drive.google.com/drive/folders/1yVuUepArWFjree5WYXeIdfrfbxk7KFrj?usp=sharing">Carpeta Semillero - Drive</a>
                  
                  <br>
                  <a style="color:#c51162" href="https://urosario.zoom.us/j/4739836906?pwd=dE5HTmI0d3Z5UXR6Z2owazFjbXlYdz09">Sala Reuniones - Zoom</a>
              </div>
            </div>
          </div>
        </div>
      </div>
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