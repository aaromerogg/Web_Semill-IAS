<script>
  function MiFuncionJS(){  
    window.acceso = "No";
  }
</script>

<?php
session_start();
if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'admin') {

} else {
  echo "<script>";
  echo "MiFuncionJS();";
  echo "</script>";
  
}

include '../api/conexion.php';

$result = mysqli_query($con, "SELECT * FROM usuarios"); // using mysqli_query instead

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NeverasIoT</title>
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
    <br>
    <main id='app' style = "zoom:88%">


        <div class="container center">
        <h6 style="color:rgb(26, 35, 126)" ><b>USUARIOS REGISTRADOS</b></h6>
            <table id="example" class="responsive-table display" style="width:100%">
            <thead>   
            <tr>
                    <td>ID</td>
                    <td>Usuario</td>
                    <td>Correo Electrónico</td>
                    <td>Estado</td>
                    <td>Acciones</td>
            </tr>
            </thead>
            <tbody>
    <?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)){

        if ($res['estado']== 1){$res['estado']='Activo';};
        if ($res['estado']== 0){$res['estado']='Inactivo';};
        if ($res['tipousuario'] != 'admin'){
            echo "<tr>";
		echo "<td>".$res['id']."</td>";
		echo "<td>".$res['user']."</td>";
        echo "<td>".$res['email']."</td>";	
        echo "<td>".$res['estado']."</td>";
        echo "<td>
                <a id = 'habilitar' class='edit modal-trigger'  data-idh='" .$res['id']."' href='javascript:;'>Habilitar</a>
                <label>&nbsp/&nbsp</label>
                <a id = 'deshabilitar' class='edit modal-trigger'  data-idh='" .$res['id']."' href='javascript:;'>Deshabilitar</a>
                </td>";
        echo "</tr>";
        }
		
	}
	
    ?>
            
            
            </tbody>
            </table>
    <br><br>
        </div>



    </main>
  
    <script src="../includes/AdministrarUsuarios.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  
    <script src="../js/materialize.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/appLogin.js"></script>
    <script src="../js/imagenes.js"></script>
    <?php include '../includes/footer.php';?>

</body>

</html>