<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../helpers/crud.php");
    $crud->update("user", $_SESSION['user_id'], ["status" => "offline"]);
    session_destroy();
    header("Location: /agrilink/login.php");
?>