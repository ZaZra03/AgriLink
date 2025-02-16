<?php
    include("../helpers/crud.php");
    
    $crud->delete("cart", $_GET['id']);
    header("Location: /agrilink/cart.php");
?>