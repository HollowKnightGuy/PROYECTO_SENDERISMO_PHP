<?php

    require_once "autoloader.php";
    require_once "./config/config.php";
    require_once "views/layout/header.php";
    session_start();
    use Controllers\FrontController;
    FrontController::main(); 


?>


<?php require_once "views/layout/footer.php" ?>

