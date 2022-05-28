<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../Controller/');
define('JS_PATH', "../js/");
include(VIEWS_PATH . 'header.php');
require(CONTROLLER_PATH . "amigos.php");
if (isset($_GET["status"])) {
    if ($_GET["status"] == 1) {
        session_start();
        if(!$_SESSION['id_usuario']){
            header("Location:" . VIEWS_PATH . "login.php");
        }
?>

        <body style="background-color: rgb(255, 112, 248) ;" class="body-amigos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <img src="../media/<?php echo $_SESSION["profileimg"]; ?>" class="responsive-img ">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>


                        <img alt="banner del perfil" src="../media/banner.png" class="img-banner" style="height: 350px; width: 100%; ">
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li style="color: white; margin-left: 40px; padding:20px; border-right: 1px solid white">

                                    <h2>
                                        <?php

                                        echo $_SESSION['nombres'];
                                        ?>
                                    </h2>
                                    <h3>
                                        <?php

                                        echo $_SESSION['pais'];
                                        ?>
                                    </h3>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" style="text-decoration: none;" href="./profile.php?status=1">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="text-decoration: none;" href="./amigos.php?status=1">Amigos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="text-decoration: none;" href="./fotos.php?status=1">Fotos</a>
                                </li>
                                <li style="margin-left: 85%;">

                                </li>

                            </ul>
                            <span style="margin-left: 30px !important">
                                <a href="./editProfile.php">
                                    <i class="icon fa-solid fa-3x fa-user-pen"></i>
                                </a>


                                <a href="./explorer.php">
                                    <i class="icon fa-solid fa-3x fa-people-arrows-left-right"></i>
                                </a>
                                <a href="./login.php?exit=1">
                                <i class="icon fa-solid fa-door-open fa-3x"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </nav>
                <div class="row " style="margin-top:50px; ">

                    <div class="col-md-6">
                        <?php

                        $amigos = getAmigos($_SESSION['id_usuario']);
                        if ($amigos == null) {
                        ?>
                            <h3>Todavia no tienes amigos, que esperas?</h3>
                            <?php
                        } else {
                            while ($row = mysqli_fetch_assoc($amigos)) {
                            ?>
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['nombres']; ?> - <?php echo $row['pais']; ?></h5>
                                        <p class="card-text"><?php echo $row['descripcion'] ?>.</p>
                                        <a href="./extProfile.php?id_usuario=<?php echo $row["id_usuario"]; ?>" class="btn btn-primary">Ver perfil</a>
                                    </div>
                                </div>

                        <?php
                            }
                        }

                        ?>

                    </div>

                </div>
            </div>
            </div>
        </body>

<?php
    }
} else {
    header("Location:" . VIEWS_PATH . "login.php");
}
include(VIEWS_PATH . 'footer.php');
?>