<?php
    include("../helpers/crud.php");
    
    $checkout = $crud->read("checkout", $_POST['id']);
    $product = $crud->read("product", $checkout['product_id']);
    $crud->update("checkout", $_POST['id'], ["status" => "complete"]);
    $crud->create("audit_log",  [
        "product_name" => $product['name'],
        "seller_id" => $product['seller_id'],
        "price" => $product['price'],
        "type" => "complete",
        "datetime" => date('Y-m-d H:i:s')
    ]);
    header("Location: /agrilink/dashboard/admin.php?page=checkouts&tab=receive");
?>