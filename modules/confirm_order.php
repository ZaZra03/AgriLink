<?php
    include("../helpers/crud.php");
    
    $checkout = $crud->read("checkout", $_POST['id']);
    $product = $crud->read("product", $checkout['product_id']);
    $crud->update("checkout", $_POST['id'], ["status" => "ship"]);
    $crud->update("product", $checkout['product_id'], ['current_stock' => (int)$product['current_stock']-1]);
    header("Location: /AgriLink/dashboard/admin.php?page=checkouts&tab=pay");
?>