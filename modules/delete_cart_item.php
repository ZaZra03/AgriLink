<?php
    include("../helpers/crud.php");
    
    $crud->delete("cart", $_GET['id']);
    header("Location: /AgriLink/cart.php");
?>