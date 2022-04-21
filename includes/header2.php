<header>
  <div class="navbar-fixed" style = "zoom:88%">
    <nav class="navbar blue darken-1">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo white-text center text-darken-4"> <i class="material-icons">home</i>Home</a>
        
        <ul id="nav-mobile" class="right">
          
          <li  id="admin"><a  class="white-text hide-on-med-and-down" data-target="chat-dropdown" class="dropdown-trigger waves-effect" href="../principal/Admin.php"><i class="material-icons" >person_add</i></a>
          <li id="salir"class="white-text href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><a class="white-text" href="../salir.php"><i class="material-icons">exit_to_app</i></a>

              <div id="chat-dropdown" class="dropdown-content dropdown-tabbed" tabindex="50"></div>
           </li>
        </ul>
        <a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons white-text">menu</i></a>
      </div>
    </nav>
  </div>  
  
  <ul class="sidenav" id = "sidenav-left">
    <li>
      <div class="user-view">
        <div class="background">
          
          <img src="../img/fondo2.png" alt="">
        </div>
        <a href="#"><img id = "Foto" src = "" alt="" class="circle"></a>
        <a href="#"><span id ="Usuario" class="name white-text"></span></a>
        <a href="#"><span id="Email" class="email white-text"></span></a>
      </div>
    </li>

    <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>

    <li><div class="divider"></div></li>
    
    <li><a href="../principal/Admin.php">Administrar Usuarios<i class="material-icons" >person_add</i></a></li>
    <li><a href="mantenimiento.php" class="">Interrupción del sistema<i class="material-icons">alarm_off</i></a></li>

    <li><div class="divider"></div></li>
    <li id="salir"class="black-text href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><a class="black-text" href="../salir.php">Salir<i class="material-icons">exit_to_app</i></a>

  </ul>   
</header>


<script>

function DatosPerfil(foto,usuario,email){  
  
  document.getElementById("Foto").src= foto
  document.getElementById("Email").innerHTML= email
  document.getElementById("Usuario").innerHTML= usuario
    
}

</script>

<script>
  $(function(){
    var current = location.search;
    if (current == "?N=1"){
      $('#equipo1').addClass('active');$('#equipo2').removeClass('active');$('#equipo3').removeClass('active');$('#equipo4').removeClass('active');
      $('#LblEquipo1').addClass('azul');$('#LblEquipo2').removeClass('azul');$('#LblEquipo3').removeClass('azul');$('#LblEquipo4').removeClass('azul');
    }
    else if (current == "?N=2"){
      $('#equipo2').addClass('active');$('#equipo1').removeClass('active');$('#equipo3').removeClass('active');$('#equipo4').removeClass('active');
      $('#LblEquipo2').addClass('azul');$('#LblEquipo1').removeClass('azul');$('#LblEquipo3').removeClass('azul');$('#LblEquipo4').removeClass('azul');
    }
    else if (current == "?N=3"){
      $('#equipo3').addClass('active');$('#equipo1').removeClass('active');$('#equipo2').removeClass('active');$('#equipo4').removeClass('active');
      $('#LblEquipo3').addClass('azul');$('#LblEquipo1').removeClass('azul');$('#LblEquipo2').removeClass('azul');$('#LblEquipo4').removeClass('azul');
    }

})
   </script>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // $foto = $_SESSION['foto'];
    $usuario = $_SESSION['user'];
    $email = $_SESSION['username'];
//   echo("<script>var foto = " . json_encode($foto) . ";var usuario = " . json_encode($usuario) . ";var email = " . json_encode($email) . ";");
//   echo "DatosPerfil(foto,usuario,email);";
//   echo "</script>";
} else {
 header('location:../index.php');
 exit;
}
include '../api/conexion.php';
?>

<script>

  document.addEventListener('DOMContentLoaded',function(){
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
    var elems2 = document.querySelectorAll('select');
    var instances2 = M.FormSelect.init(elems2);
  });
</script>
