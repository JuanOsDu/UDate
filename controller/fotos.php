

<?php


if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function getFotos($id_usuario)
{
    $db = Conexion::getConnection();
    $query = "select * from fotos where id_usuario=". $id_usuario;
    $result = $db->query($query);
    return $result;
}
