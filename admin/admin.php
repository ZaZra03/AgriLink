<!DOCTYPE html>
<html lang="en" data-theme="agrilink">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | AgriLink</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="../javascript/tailwind.js"></script>
    <link rel="stylesheet" href="../assets/css/daisyui.css">
    <link rel="stylesheet" href="../assets/css/config.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@3"></script>
</head>
<body class="relative">
    <?php
        if(isset($_GET['status']) && $_GET['status'] == "verified") {
            echo '
            <div id="success" class="alert alert-success absolute top-10 left-[50%] w-[30%] translate-x-[-50%] z-[99999]">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <span>Account verified.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }

                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        }

        require_once("../helpers/crud.php");
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
            header("Location: /AgriLink/index.php");
        }
        $user = $crud->read("user", $_SESSION['user_id']);
        include "./components/admin/nav.php";

        if (isset($_GET['page'])) {
            switch($_GET['page']) {
                case 'users':
                    include "./components/admin/users.php";
                default:
                    include "./components/admin/users.php";
            }
        } else {
            include "./components/admin/users.php";
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- <script src="../javascript/charts.js" type="module"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            // ...
        }
    </script>
</body>
</html>