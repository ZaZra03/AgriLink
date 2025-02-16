<?php
    include("../helpers/crud.php");
    
    $checkout = $crud->read("checkout", $_POST['id']);
    $product = $crud->read("product", $checkout['product_id']);
    $crud->update("checkout", $_POST['id'], ["status" => "ship"]);
    $crud->update("product", $checkout['product_id'], ["stock" => (int)$product['stock']-1]);
    header("Location: /agrilink/dashboard/admin.php?page=checkouts&tab=pay");
?>