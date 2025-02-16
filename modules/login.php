<?php
  session_start();
  require_once("../helpers/crud.php");
  $user = $crud->login("user", $_POST['email'], $_POST['password']);
  if ($user) {
    if ($user['is_verified'] == 1) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['role'] = $user['role'];
      if ($user['role'] == "seller") {
        $crud->update("user", $user['id'], ["status" => "online"]);
        header("Location: /agrilink/dashboard/admin.php");
      } else if ($user['role'] == "buyer") {
        $crud->update("user", $user['id'], ["status" => "online"]);
        header("Location: /agrilink/index.php");
      } else if ($user['role'] == "admin") {
        header("Location: /agrilink/admin/admin.php");
      }
    } else {
      header("Location: /agrilink/login.php?status=unverified");
    }
  } else {
    header("Location: /agrilink/login.php?status=error");
  }
?>