<!DOCTYPE html>
<html lang="en" data-theme="agrilink">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale | AgriLink</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
</head>
<body class="relative">

    <?php
        include "./components/navbar.php";
    ?>

    <!-- component -->
    <div class="flex items-center justify-center min-h-screen overflow-hidden bg-neutral  bg-fixed bg-cover bg-bottom error-bg"
        style="background-image: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 900'%3E%3Cpolygon fill='%23f0b608' points='957 450 539 900 1396 900'/%3E%3Cpolygon fill='%23e6d710' points='957 450 872.9 900 1396 900'/%3E%3Cpolygon fill='%23e7af05' points='-60 900 398 662 816 900'/%3E%3Cpolygon fill='%23e7d808' points='337 900 398 662 816 900'/%3E%3Cpolygon fill='%23d8a408' points='1203 546 1552 900 876 900'/%3E%3Cpolygon fill='%23f1e213' points='1203 546 1552 900 1162 900'/%3E%3Cpolygon fill='%23f0b607' points='641 695 886 900 367 900'/%3E%3Cpolygon fill='%23e4d506' points='587 900 641 695 886 900'/%3E%3Cpolygon fill='%23eab822' points='1710 900 1401 632 1096 900'/%3E%3Cpolygon fill='%23e8da14' points='1710 900 1401 632 1365 900'/%3E%3Cpolygon fill='%23e8b008' points='1210 900 971 687 725 900'/%3E%3Cpolygon fill='%23edde14' points='943 900 1210 900 971 687'/%3E%3C/svg%3E);">

        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-primary text-center -mt-52">
                    <div class="relative ">
                    <h1 class="relative text-9xl tracking-tighter-less text-shadow font-sans font-bold">
                        <span>4</span><span>0</span><span>4</span></h1>
                        <span class="absolute  top-0   -ml-12  text-neutral-content font-semibold">Oops!</span>
                        </div>
                    <h5 class="text-neutral-content font-semibold -mr-10 -mt-3">Page not found</h5>
                    <p class="text-neutral-content opacity-90 mt-2 mb-6">we are sorry, but the page you requested was not found</p>
                    <a href="/agrilink/index.php"
                        class="bg-primary cursor-pointer px-5 py-3 text-sm shadow-sm font-medium tracking-wider text-primary-content rounded-full hover:shadow-lg">
                        Got to Home
                    </a>
                </div>
            </div>
        </div>
    </div>


    <style>
        .error-bg {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 900'%3E%3Cpolygon fill='%23f0b608' points='957 450 539 900 1396 900'/%3E%3Cpolygon fill='%23e6d710' points='957 450 872.9 900 1396 900'/%3E%3Cpolygon fill='%23e7af05' points='-60 900 398 662 816 900'/%3E%3Cpolygon fill='%23e7d808' points='337 900 398 662 816 900'/%3E%3Cpolygon fill='%23d8a408' points='1203 546 1552 900 876 900'/%3E%3Cpolygon fill='%23f1e213' points='1203 546 1552 900 1162 900'/%3E%3Cpolygon fill='%23f0b607' points='641 695 886 900 367 900'/%3E%3Cpolygon fill='%23e4d506' points='587 900 641 695 886 900'/%3E%3Cpolygon fill='%23eab822' points='1710 900 1401 632 1096 900'/%3E%3Cpolygon fill='%23e8da14' points='1710 900 1401 632 1365 900'/%3E%3Cpolygon fill='%23e8b008' points='1210 900 971 687 725 900'/%3E%3Cpolygon fill='%23edde14' points='943 900 1210 900 971 687'/%3E%3C/svg%3E");
        }
        .tracking-tighter-less {
            letter-spacing: -0.75rem;
        }
        .text-shadow {
            text-shadow: -8px 0 0 hsl(var(--b3));
        }
    </style>
    
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
        this._indicators.map(function (indicator) {
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