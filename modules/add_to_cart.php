<?php
    include("../helpers/crud.php");
    
    $data = [
        "product_id" => $_POST['id'],
        "buyer_id" => $_POST['buyer_id'],
        "qty" => (int)$_POST['qty'],
    ];

    $cart = $crud->search('cart', $_POST['id'], ["product_id"]);
    $i = 0;
    if ($cart) {
        foreach ($cart as $item) {
            if ($item['buyer_id'] == $_POST['buyer_id']) {
                $i = (int)$item['qty'];
                $crud->delete("cart", $item['id']);
                $i++;
            }
        } 
    }

    if ($i == 0) {
        $crud->create("cart", $data);
    } else {
        $data['qty']=$i;
        $crud->create("cart", $data);
    }

    header("Location: /AgriLink/product.php?id=".$_POST['id']."&status=success");
?>