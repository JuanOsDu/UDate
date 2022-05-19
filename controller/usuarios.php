<?php
if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function getUser($id_usuario){
    $db = Conexion::getConnection();
    $query = "SELECT * FROM usuarios where id_usuario=".$id_usuario;
    $result = $db->query($query);
    return $result;

}



if(($_POST['login'])){
    
    getUser($id_usuario);
    header("Location:".VIEWS_PATH."profile.php?status=1");
}
