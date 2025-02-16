<?php
    include("../helpers/crud.php");
    $image = $crud->read('product', $_POST['id'])['image'];
    if (unlink('../assets/products/'.$image)) {
        echo "hi";
    }

    $cart = $crud->search('cart', $_POST['id'], ['product_id']);
    if ($cart) {
        foreach($cart as $item) {
            $crud->delete('cart', $item['id']);
        }
    }

    $checkout = $crud->search('checkout', $_POST['id'], ['product_id']);
    if ($checkout) {
        foreach($checkout as $item) {
            $crud->delete('checkout', $item['id']);
        }
    }

    $crud->delete('product', $_POST['id']);
    header("Location: /agrilink/dashboard/admin.php?".$_POST['location']);
?>