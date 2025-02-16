<?php
    include("../../helpers/crud.php");

    // Retrieve the uploaded file information
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];

    // Check if the file was uploaded successfully
    if($fileError === UPLOAD_ERR_OK){
        // Read the contents of the uploaded file
        $fileContents = file_get_contents($fileTmpName);
        // Encode the file contents into base64
        $base64 = base64_encode($fileContents);
        // Display the base64 encoded image
        $image = "data:$fileType;base64,$base64";
    } else {
        echo "Error uploading file.";
    }
    
    $data = [
        "image" => $image,
        "album" => $_POST['album'],
    ];
    $crud->create($_POST['table'], $data);
    header("Location: /agrilink/dashboard/admin.php?page=".$_POST['location']."");
?>