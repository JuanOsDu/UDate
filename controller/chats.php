
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

if (isset($_POST['enviar'])) {
    if ($_POST['mensaje'] != "") {
        enviarMen($_POST['id_usuario1'], $_POST['id_usuario2'], $_POST['mensaje']);
        header("Location: " . VIEWS_PATH  . "explorer.php?count=0");
    } else {
        header("Location: " . VIEWS_PATH  . "explorer.php?count=0");
    }
}




function getChatsByUs($id_usuario1, $id_usuario2)
{
    $db = Conexion::getConnection();
    $query = "select * from chat where (id_usuario1 = '$id_usuario1' and id_usuario2 = '$id_usuario2') or (id_usuario1 = '$id_usuario2' and id_usuario2 = '$id_usuario1') order by id_men asc";
    $result = $db->query($query);

    return $result;
}



function getChats($id_usuario)
{
    $db = Conexion::getConnection();
    $query = "select c.id_usuario2, nombres, count(*) from chat c inner join usuarios u on c.id_usuario2=u.id_usuario where c.id_usuario1 = '$id_usuario' group by id_usuario2;";
    $result = $db->query($query);
    if ($result->num_rows == 0) {
        return null;
    }

    return $result;
}
