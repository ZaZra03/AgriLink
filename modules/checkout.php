<?php
    include("../helpers/crud.php");
    $product_id = $_POST['product_id'];
    for ($i=0; $i<count($product_id); $i++) {
        $data = [
            "product_id" => $product_id[$i],
            "buyer" => $_POST['buyer'],
            "qty" => $_POST['qty'][$i],
            "payment" => $_POST['payment'],
            "total" => $_POST['total'][$i]+38,
            "message" => $_POST['message'][$i],
            "status" => "pay",
            "datetime" => date('Y-m-d H:i:s')
        ];
        $crud->create("checkout", $data);
        $crud->delete("cart", $_POST['cart_id'][$i]);
    }
    header("Location: /AgriLink/user.php?page=purchase");
?>