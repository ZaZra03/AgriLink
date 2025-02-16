<?php
    include("../../helpers/crud.php");

    if ($crud->read("user", $_POST['id'])['password'] == $_POST['old']) {
        $crud->update("user", $_POST['id'], ["password" => $_POST['new']]);
        header("Location: /agrilink/user.php?page=password&status=success");
    } else {
        header("Location: /agrilink/user.php?page=password&status=error");
    }

?>