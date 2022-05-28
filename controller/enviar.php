
<?php
if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");

function enviarMen($id_usuario1, $id_usuario2, $mensaje)
{
    $db = Conexion::getConnection();
    $query = "INSERT INTO chat( id_usuario1, id_usuario2, mensaje, tipo) VALUES ( '$id_usuario1', '$id_usuario2', ' $mensaje', 1);";
    $result = $db->query($query);

    return $result;
}


    if ($_POST['msj'] != "") {
        enviarMen($_POST['id_usuario1'], $_POST['id_usuario2'], $_POST['msj']);
        header("Location: " . VIEWS_PATH  . "explorer.php?count=0");
    } else {
        header("Location: " . VIEWS_PATH  . "explorer.php?count=0");
    }

