<?php
session_start();
require_once("../helpers/crud.php");

// Ensure directory exists
function ensure_directory_exists($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Handle Verification ID upload
$image = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "../assets/id/";
    ensure_directory_exists($target_dir);

    $file = $_FILES['image']['name'];
    $path = pathinfo($file);
    $filename = $_POST['name'] . $_POST['role'];
    $ext = $path['extension'];
    $temp_name = $_FILES['image']['tmp_name'];
    $path_filename_ext = $target_dir . $filename . "." . $ext;

    move_uploaded_file($temp_name, $path_filename_ext);
    $image = $filename . "." . $ext;
}

// Handle Business Permit upload
$business_permit = null;
if (isset($_FILES['business_permit']) && $_FILES['business_permit']['error'] === UPLOAD_ERR_OK) {
    $permit_dir = "../assets/business_permits/";
    ensure_directory_exists($permit_dir);

    $permit_file = $_FILES['business_permit']['name'];
    $permit_path = pathinfo($permit_file);
    $permit_filename = $_POST['name'] . "_business_permit";
    $permit_ext = $permit_path['extension'];
    $permit_temp_name = $_FILES['business_permit']['tmp_name'];
    $permit_path_filename_ext = $permit_dir . $permit_filename . "." . $permit_ext;

    move_uploaded_file($permit_temp_name, $permit_path_filename_ext);
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
    header("Location: /AgriLink/signup_" . $_POST['role'] . ".php?status=success");
    exit();
} else {
    header("Location: /AgriLink/signup_" . $_POST['role'] . ".php?status=error");
    exit();
}
?>
