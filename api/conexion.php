<?php @session_start();
$con = new mysqli('34.203.1.178','neverasiot2','neverasiot','neveracvd');
if ($con->connect_errno) {
    die("La conexion no pudo establecerse");
}
 ?>