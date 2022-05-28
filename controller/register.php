<?php
if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function registerUser($correo, $nombres, $edad, $descripcion, $contraseña){
    $db = Conexion::getConnection();
    $query = "INSERT INTO USUARIOS(correo, contraseña, nombres, descripcion, edad) VALUES('$correo','$contraseña','$nombres','$descripcion','$edad')";
    $result = $db->query($query);
    return $result;
    
}





if(isset($_POST['reg'])){
    
    registerUser($_POST["correo"],$_POST["nombres"],$_POST["edad"],$_POST["descripcion"],$_POST["contraseña"],$_POST["edad"]);
    
    header("Location:".VIEWS_PATH."login.php?status=1");
}

