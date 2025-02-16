<?php
    include("../helpers/crud.php");

    $crud->update("checkout", $_GET['id'], ["status" => "cancel"]);
    header("Location: /agrilink/user.php?page=purchase&tab=cancel");

?>