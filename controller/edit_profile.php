

<?php


if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");




function updateUser($id_usuario, $nombres, $apellidos, $pais, $edad, $contraseña, $descripcion)
{
    $db = Conexion::getConnection();
    $query = "update USUARIOS set nombres='$nombres', apellidos='$apellidos', pais='$pais', edad='$edad', contraseña='$contraseña', descripcion='$descripcion' where id_usuario='$id_usuario'";
    $result = $db->query($query);
    return $result;
}




if (isset($_POST['editar'])) {

    if ($_POST['id_usuario'] != "" && $_POST['nombres'] != "" && $_POST['apellidos'] != "" && $_POST['pais'] != "" && $_POST['edad'] != "" && $_POST['contraseña'] != "" && $_POST['descripcion'] != "") {
        updateUser($_POST['id_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['pais'], $_POST['edad'], $_POST['contraseña'], $_POST['descripcion']);
        $db = Conexion::getConnection();

        $query = "SELECT * FROM usuarios WHERE id_usuario = '" . $_POST["id_usuario"] . "' ";


        $result = $db->query($query);

        if ($result->num_rows > 0) {
            //echo "Datos Correctos";
            while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION["id_usuario"] = $row["id_usuario"];
                $_SESSION["nombres"] = $row["nombres"];
                $_SESSION["apellidos"] = $row["apellidos"];
                $_SESSION["pais"] = $row["pais"];
                $_SESSION["descripcion"] = $row["descripcion"];
                $_SESSION["profileimg"] = $row["img"];
                $_SESSION["correo"] = $row["correo"];
                $_SESSION["edad"] = $row["edad"];
                $_SESSION["contraseña"] = $row["contraseña"];

                //Usuario con menos privilegios
                header("Location: " . VIEWS_PATH  . "editProfile.php?status=1");
            }
        } else {
            header("Location: " . VIEWS_PATH  . "editProfile.php?status=-1");
        }
        //header("Location:".VIEWS_PATH."home_user.php");


    } else {
        header("Location:" . VIEWS_PATH . "editProfile.php?status=-1");
    }
}
