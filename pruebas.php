<?php @session_start();
define ("DB_HOST", "localhost");
$con = new mysqli(DB_HOST,'root','SemillIAS','semillias');
echo password_hash("semillias",PASSWORD_BCRYPT);
if ($con->connect_errno) {
    die("La conexion no pudo establecerse");
}
?>