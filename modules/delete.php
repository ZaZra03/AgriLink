<?php
    include("../helpers/crud.php");
    
    $crud->delete($_POST['table'], $_POST['id']);
    header("Location: /agrilink/dashboard/admin.php?page=".$_POST['location']."");
?>