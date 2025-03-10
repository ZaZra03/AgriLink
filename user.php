<!DOCTYPE html>
<html lang="en" data-theme="agrilink">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | AgriLink</title>
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
</head>

<body class="relative">
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        function redirect() {
            header("Location: /AgriLink/index.php");
            die();
        }
        require_once("./helpers/crud.php");
        include "./components/navbar.php";
        if (!isset($_SESSION['role']) || $_SESSION['role'] != "buyer") {
            redirect();
        } else {
            $current_user = $crud->read("user", $_SESSION["user_id"]);
        }
    ?>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-32 pt-24">
        <div class="w-full grid grid-cols-1 md:grid-cols-5 gap-6 p-4">
            <?php 
                include './user/sidebar.php';

                if (!isset($_GET['page']) || $_GET['page'] == "profile") {
                    include './user/profile.php';
                } else if ($_GET['page'] == "purchase") {
                    include './user/purchase.php';
                } else if ($_GET['page'] == "password") {
                    include './user/password.php';
                } else {
                    include './user/profile.php';
                }
            ?>
        </div>
    </div>
    
    <div class="w-full h-28"></div>
    
    <!-- FOOTER -->
    <?php include './components/footer.php'; ?>
    <!-- END OF FOOTER -->

    <script src="./javascript/flowbite.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</body>
</html>