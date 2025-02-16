<?php
    include '../helpers/crud.php';
    $id = $_POST['id'];
    $crud->update("user", $id, ['is_verified' => 1]);
    header("Location: ../admin/admin.php?status=verified");
