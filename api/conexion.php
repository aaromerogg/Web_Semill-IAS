<?php @session_start();
#define ("DB_HOST", "localhost");
$con = new mysqli('localhost','root','SemillIAS','semillias');
if ($con->connect_errno) {
    die("La conexion no pudo establecerse");
}
 ?>