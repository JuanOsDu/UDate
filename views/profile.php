<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../Controller/');
define('JS_PATH', "../js/");
include(VIEWS_PATH . 'header.php');
if (isset($_GET["status"])) {
    if ($_GET["status"] == 1) {
?>

        <body style="background-color: rgba(209,250,255,255);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="">
                        <img src="../media/profile.jpg" class="responsive-img">
                        <div class="profile-text" >
                            <h2>
                                <?php
                                session_start();
                                echo $_SESSION['nombres'];
                                ?>
                            </h2>
                            <h3>
                                <?php

                                echo $_SESSION['pais'];
                                ?>
                            </h3>
                        </div>

                        <img alt="banner del perfil" src="../media/banner.png" class="img-banner" style="height: 350px; width: 100%; ">
                    </div>
                </div>
                <div class="row container-img" style="margin-top:50px; ">
                    <div class="col-md-5">
                        <img class="imgfeed" src="../media/feed1.jpg">
                        <img class="imgfeed" src="../media/feed2.jpg">
                        <img class="imgfeed" src="../media/feed3.jpg">


                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="font-size:2vw;">
                                    <?php

                                    echo $_SESSION['descripcion'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 170px;">
                            <div class="col-md-4">
                                <img src="../media/map1.png" class="profileMap">
                            </div>
                            <div class="col-md-8">
                                <div class="btn-group-vertical" style="margin-right: 120px;">
                                    <ul>
                                        <li> <button type="button" class="btn btn-primary">Ir al Explorer</button>
                                        </li>
                                        <li> <button type="button" class="btn btn-primary">Editar Perfil</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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