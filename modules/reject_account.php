<?php
    include '../helpers/crud.php';
    $id = $_POST['id'];
    $crud->delete("user", $id);
    header("Location: ../admin/admin.php?status=unverified");
