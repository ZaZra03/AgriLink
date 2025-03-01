<?php
    include("../helpers/crud.php");
    
    $refund = $crud->read("refund", $_GET['id']);
    $checkout = $crud->read("checkout", $refund['order_id']);
    $product = $crud->read("product", $checkout['product_id']);
    $crud->update("refund", $_GET['id'], ["status" => "approved"]);
    $crud->update("product", $checkout['product_id'], ["stock" => (int)$product['current_stock']+1]);
    $crud->create("audit_log",  [
        "product_name" => $product['name'],
        "seller_id" => $product['seller_id'],
        "price" => $product['price'],
        "type" => "refund",
        "datetime" => date('Y-m-d H:i:s')
    ]);
    header("Location: /AgriLink/dashboard/admin.php?page=checkouts&tab=return");
?>