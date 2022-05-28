
<?php
if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function getExplorerData($id_usuario){
    $db = Conexion::getConnection();
    $query = "select * from usuarios u WHERE u.id_usuario not in (select id_usuario2 from amigos where id_usuario1 ='$id_usuario') and u.id_usuario <> " . $id_usuario;
    $result = $db->query($query);
    if ($result->num_rows == 0) {
        return null;
    }
    
    return $result;

}


