<!DOCTYPE html>
<html lang="en" data-theme="agrilink">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | AgriLink</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
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
            header("Location: /agrilink/index.php");
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

    <div class="max-w-[965px] mx-auto pb-96 pt-[6em]">
        <div class="w-full grid grid-cols-5 gap-6 p-6">
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
    <div class="w-24 h-28">

    </div>
    <!-- FOOTER -->
    <?php
    include './components/footer.php';
    ?>
    <!-- END OF FOOTER -->

    <!-- <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script> -->
    <script src="./javascript/flowbite.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            // ...
        }
        this._indicators.map(function(indicator) {
            indicator.el.setAttribute('aria-current', 'false');
            indicator.el.classList.remove('bg-[#FFFFFF]', 'bg-[#FFFFFF]');
            indicator.el.classList.add('bg-[#FFFFFF]/50', 'bg-[#FFFFFF]/50');

            if (indicator.id === id) {
                indicator.el.classList.add('bg-[#FFFFFF]', 'bg-[#FFFFFF]');
                indicator.el.classList.remove('bg-[#FFFFFF]/50', 'bg-[#FFFFFF]/50');
                indicator.el.setAttribute('aria-current', 'true');
            }
        })
    </script>
</body>

</html>