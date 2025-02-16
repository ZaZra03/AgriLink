<?php
    include("../helpers/crud.php");
    
    $crud->update("checkout", $_POST['id'], ["status" => "receive"]);
    header("Location: /agrilink/dashboard/admin.php?page=checkouts&tab=ship");
?>