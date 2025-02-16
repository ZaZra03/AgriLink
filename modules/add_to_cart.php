<?php
    include("../helpers/crud.php");
    
    $data = [
        "product_id" => $_POST['id'],
        "buyer" => $_POST['buyer'],
        "qty" => (int)$_POST['qty'],
    ];

    $cart = $crud->search('cart', $_POST['id'], ["product_id"]);
    $i = 0;
    if ($cart) {
        foreach ($cart as $item) {
            if ($item['buyer'] == $_POST['buyer']) {
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

    header("Location: /agrilink/product.php?id=".$_POST['id']."&status=success");
?>