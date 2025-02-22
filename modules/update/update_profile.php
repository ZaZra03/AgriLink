<?php
    include("../../helpers/crud.php");

    if (($_FILES['image']['name']!="")){
        // Where the file is going to be stored
        $target_dir = "../../assets/users/";
        $file = $_FILES['image']['name'];
        $path = pathinfo($file);
        $filename = $_POST['name'].$_POST['id'];
        $ext = $path['extension'];
        $temp_name = $_FILES['image']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            rename($temp_name, $path_filename_ext);
            echo "File already exists.";
        }else{
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "File Uploaded Successfully.";
        }
        $image = $filename.".".$ext;
    } else {
        echo "Error uploading file.";
        $image = $crud->read("user", $_POST['id'])['image'];
    }
    
    $data = [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "gender" => $_POST['gender'],
        "birthdate" => $_POST['birthdate'],
        "address" => $_POST['address'],
        "image" => $image,
    ];
    $crud->update("user", $_POST['id'], $data);
    header("Location: /AgriLink/user.php?page=account");
?>