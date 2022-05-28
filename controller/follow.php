<?php
if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function follow($id_usuario1, $id_usuario2)
{
    $db = Conexion::getConnection();
    $query = "select * from amigos where id_usuario1= '$id_usuario1' and id_usuario2= '$id_usuario2'";
    $result = $db->query($query);
    if ($result->num_rows == 0) {
        $query = "insert into amigos(id_usuario1, id_usuario2) values('$id_usuario1','$id_usuario2')";
        $result = $db->query($query);
    }
    return $result;
}
function unFollow($id_usuario1, $id_usuario2)
{
    $db = Conexion::getConnection();
    $query = "delete from amigos where id_usuario1= '$id_usuario1' and id_usuario2= '$id_usuario2'";
    $result = $db->query($query);
}
if (isset($_GET['follow'])) {
    if ($_GET['follow'] == 1) {
        follow($_GET['id_usuario1'], $_GET['id_usuario2']);
        header("Location:".VIEWS_PATH."explorer.php?count=0");
    } else {
        unFollow($_GET['id_usuario1'], $_GET['id_usuario2']);
        header("Location:".VIEWS_PATH."explorer.php?count=0");
    }
}
