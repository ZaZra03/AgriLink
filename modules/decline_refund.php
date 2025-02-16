<?php
    include("../helpers/crud.php");
    
    $crud->update("refund", $_GET['id'], ["status" => "declined"]);
    header("Location: /agrilink/dashboard/admin.php?page=checkouts&tab=return");
?>