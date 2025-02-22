<?php
  session_start();
  require_once("../helpers/crud.php");
  $user = $crud->login("user", $_POST['email'], $_POST['password']);
  if ($user) {
    if ($user['is_verified'] == 1) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      if ($user['role'] == "seller") {
        $crud->update("user", $user['id'], ["status" => "online"]);
        header("Location: /AgriLink/dashboard/admin.php");
      } else if ($user['role'] == "buyer") {
        $crud->update("user", $user['id'], ["status" => "online"]);
        header("Location: /AgriLink/index.php");
      } else if ($user['role'] == "admin") {
        header("Location: /AgriLink/admin/admin.php");
      }
    } else {
      header("Location: /AgriLink/login.php?status=unverified");
    }
  } else {
    header("Location: /AgriLink/login.php?status=error");
  }
?>