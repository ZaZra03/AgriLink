<?php
    require '../helpers/crud.php';

    $file = $_FILES['product_file']['tmp_name'];

    // Import the grades from the file
    $crud->importProducts($file);
    header("Location: ../dashboard/admin.php?page=products");
?>