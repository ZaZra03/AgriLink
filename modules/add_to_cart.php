<?php
    include("../helpers/crud.php");
    
    // Collecting input data
    $data = [
        "product_id" => $_POST['id'],
        "buyer_id" => $_POST['buyer_id'],
        "qty" => (int)$_POST['qty'],
    ];

    if ((int)$_POST['qty'] <= (int)$_POST['current_stock']) {
        // Search for the item in the cart
        $cart = $crud->search('cart', $_POST['id'], ["product_id"]);
        if ($cart) {
            foreach ($cart as $item) {
                if ($item['buyer_id'] == $_POST['buyer_id']) {
                    $i = (int)$item['qty'];
                    $crud->delete("cart", $item['id']);
                    $i += (int)$_POST['qty']; // Add the new quantity
                }
            }
        }
    
        $crud->create("cart", $data);
    
        header("Location: /AgriLink/product.php?id=" . $_POST['id'] . "&status=success");
    } else {
        header("Location: /AgriLink/product.php?id=" . $_POST['id'] . "&status=checkout-error");
    }
?>
