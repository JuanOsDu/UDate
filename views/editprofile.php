<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../Controller/');
define('JS_PATH', "../js/");
include(VIEWS_PATH . 'header.php');
session_start();
if(!$_SESSION['id_usuario']){
    header("Location:" . VIEWS_PATH . "login.php");
}
?>

<body style="background-color: rgb(255, 112, 248) ;">
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
                            <a class="nav-link active" aria-current="page" href="./profile.php?status=1">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./amigos.php?status=1">Amigos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-decoration: none;" href="./fotos.php?status=1">Fotos</a>
                        </li>
                        <li style="margin-left: 85%;">

                        </li>

                    </ul>
                    <span style="margin-left: 30px !important">
                        <a href="./profile.php?status=1">
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

    </div>
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-2"> </div>

            <div class="col-md-8 formulario">

                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 1) {
                ?>
                        <div class="alert alert-warning alert-dismissible fade show" style="background-color: rgb(255, 191, 252) !important; color:black !important; margin-top: 15px" role="alert">
                            Tus datos han sido actualizados.<br> Continua navegando...
                            <button type="button" class="close btn btn-light" data-dismiss="alert" aria-label="Close" style="margin-left: 95%; background-color: rgba(0, 0, 0, 0 )">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } elseif ($_GET['status'] == -1) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" style="background-color: rgb(255, 191, 252) !important; color:black !important; margin-top: 15px" role="alert">
                            No pudimos actualizar los datos. Revisa los campos...
                            <button type="button" class="close btn btn-light" data-dismiss="alert" aria-label="Close" style="margin-left: 95%; background-color: rgba(0, 0, 0, 0 )">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>

                <h3 style="text-align: center; margin-top:50px">Edita tu perfil</h3>
                <form role="form" method="POST" action="<?php echo CONTROLLER_PATH; ?>edit_profile.php">
                    <div class="mb-3 row">

                        <label for="disabledTextInput" class="form-label"><?php echo $_SESSION['correo']; ?></label>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="<?php echo $_SESSION['nombres']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $_SESSION['apellidos']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="pais" placeholder="Pais" value="<?php echo $_SESSION['pais']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="edad" value="<?php echo $_SESSION['edad']; ?>" placeholder="Edad">

                        </div>
                        <div class="mb-3">

                            <input type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $_SESSION['contraseña']; ?>" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">

                            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"><?php echo $_SESSION['descripcion']; ?></textarea>
                            <input type="hidden" name="editar" value="ok">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                </form>



            </div>
            <div class="col-md-2"> </div>

        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

<?php


include(VIEWS_PATH . 'footer.php');
?>