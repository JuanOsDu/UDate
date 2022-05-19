<?php

define('CONTROLLER_PATH', '../Controllers/');
define('VIEWS_PATH', '../Views/');
define('MODELS_PATH', '../Models/');
define('LIBRARIES_PATH', '../libraries/');

require_once(LIBRARIES_PATH."Conexion.php");
$db = Conexion::getConnection();

$query = "SELECT * FROM usuarios WHERE correo = '" . $_POST["correo"] . "' AND contraseña = '" . $_POST["contraseña"] . "' ";
echo $query;

$result = $db->query($query);

if ($result->num_rows > 0) {
    //echo "Datos Correctos";
    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["usuario_id"] = $row["usuario_id"];
        $_SESSION["nombres"] = $row["nombres"];
        $_SESSION["apellidos"] = $row["apellidos"];
        $_SESSION["pais"] = $row["pais"];
        $_SESSION["descripcion"] = $row["descripcion"];
         //Usuario con menos privilegios
        header("Location: " . VIEWS_PATH  . "profile.php?status=1");
    }}
    //header("Location:".VIEWS_PATH."home_user.php");
