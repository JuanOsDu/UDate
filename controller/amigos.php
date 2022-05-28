<?php
if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function getAmigos($id_usuario){
    $db = Conexion::getConnection();
    $query = 'select us.id_usuario, us.img, us.nombres, us.apellidos, us.pais, us.descripcion from amigos a inner join usuarios u on a.id_usuario1=u.id_usuario inner join usuarios us on us.id_usuario=a.id_usuario2 where id_usuario1=' . $id_usuario;
    $result = $db->query($query);
    if ($result->num_rows == 0) {
        return null;
    }
    return $result;

}


