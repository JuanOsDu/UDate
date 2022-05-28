<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../Controller/');
define('JS_PATH', "../js/");
include(VIEWS_PATH . 'header.php');
require(CONTROLLER_PATH . "explorer.php");
require(CONTROLLER_PATH . "chats.php");
session_start();
if(!$_SESSION['id_usuario']){
  header("Location:" . VIEWS_PATH . "login.php");
}
?>

<body class="body-explorer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <?php
        $explorer = getExplorerData($_SESSION['id_usuario']);
        $array = array();
        $count = 0;
        if (isset($_GET['count'])) {
          $count = $_GET['count'];
        }

        $count++;
        while ($row = mysqli_fetch_assoc($explorer)) {

          // add each row returned into an array
          $array[] = $row;

          // OR just echo the data:

        }
        if ($count == count($array)) {
          $count = 0;
        }
        function iterData()
        {
          global $count;
          global $array;
          $obj = $array[$count];
          $count++;
          return $obj;
        }
        function incrementCount()
        {

          global $count;
          echo $count;
          return $count++;
        }
        $nombres = $array[$count]['nombres'];
        $apellidos = $array[$count]['apellidos'];
        $edad = $array[$count]['edad'];
        $pais = $array[$count]['pais'];
        $descripcion = $array[$count]['descripcion'];
        $id_usuario = $array[$count]['id_usuario'];
        $img = $array[$count]['img'];


        ?>
        <div class="card" style="height: auto">

          <div class="card-body">
            <h3><?php echo $nombres; ?></h3>
            <h3><?php echo $pais; ?></h3>
            <h3><?php echo $edad; ?></h3>
            <div class="card-img" style="background-image:url('../media/<?php echo $img; ?>')"></div>

            <p class="card-text"><?php echo $descripcion; ?></p>
            <span style="margin-left: 30%;">
              <a href="../controller/follow.php?id_usuario1=<?php echo $_SESSION['id_usuario']; ?>&id_usuario2=<?php echo $id_usuario; ?>&follow=-1" style="text-decoration: none; color: inherit;"><i class="fa-solid fa-3x fa-heart-crack"></i></a>
              <a href="../controller/follow.php?id_usuario1=<?php echo $_SESSION['id_usuario']; ?>&id_usuario2=<?php echo $id_usuario; ?>&follow=1" style="text-decoration: none; color: inherit;"><i class="fa-solid fa-3x fa-heart"></i></a>
              <a href="./explorer.php?count=<?php echo $count; ?>" style="text-decoration: none;color: inherit;"><i class="fa-solid fa-3x fa-circle-chevron-right"></i></a>
            </span>
          </div>
        </div>


      </div>
      <div class="col-md-6">
        <div class="card " style="text-align:center; background-color:rgb(124, 16, 110) !important; color: white">
          <div class="card-header">
           <span style="font-size: large !important;">Chats
            <a href="./profile.php?status=1"><i class="fa-solid fa-house-user fa-2x icon2 noEffect"></i></a></span>
          </div>


        </div>
        <?php
        $chats = getChats($_SESSION['id_usuario']);
        if ($chats == null) {
        ?>
          <p>Todavia no has chateado con alguien, que esperas?</p>
          <?php

        } else {
          while ($row = mysqli_fetch_assoc($chats)) {
          ?>
            <div class="card " style="max-height:400px ; min-height:250px">
              <div class="card-header">
                <?php echo $row['nombres']; ?>
              </div>
              <div class="card-body scroll">
                <blockquote class="blockquote mb-0">
                  <div class="overflow-auto">
                    <?php
                    $mens = getChatsByUs($_SESSION['id_usuario'], $row['id_usuario2']);
                    while ($row2 = mysqli_fetch_assoc($mens)) {
                    ?>

                      <p>
                        <?php
                        if ($row2['id_usuario1'] == $_SESSION['id_usuario']) {
                        ?>
                          <i class="fa-solid fa-arrow-right"></i>
                        <?php
                        } else {
                        ?>
                          <i class="fa-solid fa-arrow-left"></i>
                        <?php
                        }
                        ?>
                        <?php echo $row2['mensaje']; ?>



                      </p>

                    <?php
                    }
                    ?>
                  </div>

                </blockquote>
              </div>
              <div class="card-footer">
                <form role="form" method="POST" action="<?php echo CONTROLLER_PATH; ?>enviar.php">
                  <input type="text" style="width:85%" name="msj">
                  <input type="hidden" name="id_usuario1" value="<?php echo $_SESSION['id_usuario']; ?>">
                  <input type="hidden" name="id_usuario2" value="<?php echo $row['id_usuario2']; ?>">
                  <button class="btn btn-link noEffect" type="submit"><i class="fa-solid fa-2x fa-reply"></i></button>
                </form>
              </div>
            </div>
        <?php
          }
        }
        ?>



      </div>
    </div>

  </div>


</body>
<?php
include(VIEWS_PATH . 'footer.php');
?>