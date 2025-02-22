<?php
    include("../helpers/crud.php");

    $crud->update("checkout", $_GET['id'], ["status" => "cancel"]);
    header("Location: /AgriLink/user.php?page=purchase&tab=cancel");

?>