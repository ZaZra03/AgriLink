<?php
    include("../../helpers/crud.php");

    if (($_FILES['image']['name']!="")){
        // Where the file is going to be stored
        $target_dir = "../../assets/products/";
        $file = $_FILES['image']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['image']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        if (file_exists($path_filename_ext)) {
            rename($temp_name, $path_filename_ext);
            echo "File already exists.";
        }else{
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "File Uploaded Successfully.";
        }
        echo "File Uploaded Successfully.";
    } 
    
    $data = [
        "name" => $_POST['name'],
        "type" => $_POST['type'], 
        "location" => $_POST['location'],
        "price" => strval($_POST['price']),
        "discount" => strval($_POST['discount']),
        "current_stock" => strval($_POST['current_stock']),
        "next_month_stock" => strval($_POST['next_month_stock']),
        "available" => 1,
        "sold" => 0,
        "description" => nl2br($_POST['description']),
        "image" => ($_FILES['image']['name']!="") ? $filename.".".$ext : $crud->read($_POST['table'], $_POST['id'])['image'],
    ];
    $crud->update($_POST['table'], $_POST['id'], $data);
    header("Location: /AgriLink/dashboard/admin.php?".$_POST['location']."#".$_POST['id']);
?>