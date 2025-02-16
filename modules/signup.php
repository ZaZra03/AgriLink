<?php
session_start();
require_once("../helpers/crud.php");

// Handle Verification ID upload
if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $target_dir = "../assets/id/";
    $file = $_FILES['image']['name'];
    $path = pathinfo($file);
    $filename = $_POST['name'] . $_POST['role'];
    $ext = $path['extension'];
    $temp_name = $_FILES['image']['tmp_name'];
    $path_filename_ext = $target_dir . $filename . "." . $ext;

    if (file_exists($path_filename_ext)) {
        rename($temp_name, $path_filename_ext);
    } else {
        move_uploaded_file($temp_name, $path_filename_ext);
    }
    $image = $filename . "." . $ext;
}

// Handle Business Permit upload
$business_permit = null;
if (isset($_FILES['business_permit']) && $_FILES['business_permit']['name'] != "") {
    $permit_dir = "../assets/business_permits/";
    $permit_file = $_FILES['business_permit']['name'];
    $permit_path = pathinfo($permit_file);
    $permit_filename = $_POST['name'] . "_business_permit";
    $permit_ext = $permit_path['extension'];
    $permit_temp_name = $_FILES['business_permit']['tmp_name'];
    $permit_path_filename_ext = $permit_dir . $permit_filename . "." . $permit_ext;

    if (file_exists($permit_path_filename_ext)) {
        rename($permit_temp_name, $permit_path_filename_ext);
    } else {
        move_uploaded_file($permit_temp_name, $permit_path_filename_ext);
    }
    $business_permit = $permit_filename . "." . $permit_ext;
}

// Prepare data for database insertion
$data = [
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "phone" => $_POST['number'],
    "address" => $_POST['address'],
    "password" => $_POST['password'],
    "role" => $_POST['role'],
    "id_image" => $image,
    "business_permit" => $business_permit // Store permit file name
];

$user_count = $crud->search("user", $_POST['email'], ['email']);
$user_name = $crud->search("user", $_POST['name'], ['name']);

if (!$user_count && !$user_name) {
    $crud->create("user", $data);
    header("Location: /agrilink/signup_" . $_POST['role'] . ".php?status=success");
} else {
    header("Location: /agrilink/signup_" . $_POST['role'] . ".php?status=error");
}
?>
