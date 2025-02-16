<?php
    require_once("../helpers/crud.php");
    $items = $_POST['foo'];
    if( isset($_POST['foo']) && is_array($_POST['foo']) ) {
        foreach($items as $item) {
            echo $item;
            $crud->delete("cart", $item);
        }
    }
    header('Location: /agrilink/cart.php');
?>