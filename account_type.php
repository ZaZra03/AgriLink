<!DOCTYPE html>
<html lang="en" data-theme="agrilink">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriLink</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
</head>

<body class="relative">
    <?php
        if(isset($_GET['status']) && $_GET['status'] == "error") {
            echo '
            <div id="error" class="alert alert-error absolute top-10 left-[50%] w-[30%] translate-x-[-50%] z-[99999]">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>User already exists.</span>
            </div>
            <style>
                #error {
                    opacity: 0;
                    transition: all;
                    animation-name: error;
                    animation-duration: 4s;
                }
        
                @keyframes error {
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
    ?>
    
    <main class="bg-base-100 :bg-gray-900">
        <div class="flex flex-col items-center px-6 pt-20 mx-auto md:h-screen pt:mt-0 :bg-gray-900">
            <a href="/AgriLink/index.php" class="normal-case text-xl mb-10">
                <img src="./assets/images/logo.png" class="w-44 h-44" alt="">
            </a>
            <!-- Card -->
            <div class="w-full max-w-xl p-6 h-[20em] space-y-8 sm:p-8 bg-white rounded-2xl shadow :bg-gray-800 flex flex-col items-center justify-center">
                <h2 class="text-3xl font-bold text-base-content :text-white">
                    Create Your Account
                </h2>
                <div class="flex flex-col gap-6 w-full max-w-sm">
                    <a href="./signup_seller.php" type="submit" class="text-center border-2 border-primary p-4 text-2xl hover:bg-primary hover:text-white transition-all duration-200 text-primary font-bold rounded-full">Seller</a>
                    <a href="./signup_buyer.php" type="submit" class="text-center border-2 border-primary p-4 text-2xl hover:bg-primary hover:text-white transition-all duration-200 text-primary font-bold rounded-full">Buyer</a>
                </div>
            </div>
        </div>
    </main>


    <!-- <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script> -->
    <script src="./javascript/flowbite.js"></script>
    <script>
        tailwind.config = {
            Mode: 'class',
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