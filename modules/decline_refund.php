<?php
    include("../helpers/crud.php");
    
    $crud->update("refund", $_GET['id'], ["status" => "declined"]);
    header("Location: /AgriLink/dashboard/admin.php?page=checkouts&tab=return");
?>