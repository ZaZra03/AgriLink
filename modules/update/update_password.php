<?php
    include("../../helpers/crud.php");

    if ($crud->read("user", $_POST['id'])['password'] == $_POST['old']) {
        $crud->update("user", $_POST['id'], ["password" => $_POST['new']]);
        header("Location: /AgriLink/user.php?page=password&status=success");
    } else {
        header("Location: /AgriLink/user.php?page=password&status=error");
    }

?>