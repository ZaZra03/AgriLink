<!DOCTYPE html>
<html lang="en" data-theme="agrilink">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | AgriLink</title>
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
        require_once("../helpers/crud.php");
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== "seller") {
            header("Location: /AgriLink/index.php");
        }
        $user = $crud->read("user", $_SESSION['user_id']);
        include "./components/admin/nav.php";

        if (isset($_GET['page'])) {
            switch($_GET['page']) {
                case 'dashboard':
                    include "./components/admin/dashboard.php";
                    break;
                // case 'settings':
                //     include "./components/admin/settings.php";
                //     break;
                case 'users':
                    include "./components/admin/users.php";
                    break;
                case 'products':
                    include "./components/admin/products.php";
                    break;
                case 'inbox':
                    include "./components/admin/inbox.php";
                    break;
                case 'checkouts':
                    include "./components/admin/checkouts.php";
                    break;
                case 'charts':
                    include "./components/admin/charts.php";
                    break;
                case 'gallery':
                    include "./components/admin/gallery.php";
                    break;
                default:
                    include "./components/admin/users.php";
            }
        } else {
            include "./components/admin/dashboard.php";
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- <script src="../javascript/charts.js" type="module"></script> -->
    <script src="../javascript/flowbite.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            // ...
        }
    </script>
</body>
</html>