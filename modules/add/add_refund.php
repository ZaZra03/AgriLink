<?php
    include("../../helpers/crud.php");

    if (($_FILES['image']['name']!="")){
        // Where the file is going to be stored
        $target_dir = "../../assets/refund/";
        $file = $_FILES['image']['name'];
        $path = pathinfo($file);
        $filename = strtotime("now");
        $ext = $path['extension'];
        $temp_name = $_FILES['image']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        if (file_exists($path_filename_ext)) {
            echo "File already exists.";
        }else{
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "File Uploaded Successfully.";
        }
    } 
    
    $data = [
        "buyer_name" => $_POST['buyer_name'],
        "order_id" => $_POST['order_id'],
        "reason" => $_POST['reason'],
        "image" => ($_FILES['image']['name']!="") ? $filename.".".$ext : "",
    ];

    $crud->create('refund', $data);
    $crud->update('checkout', $_POST['order_id'], ["status" => "return"]);
    header("Location: /AgriLink/user.php?page=purchase&tab=return");
?>