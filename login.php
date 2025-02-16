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
            <div id="error" class="alert alert-error absolute top-12 left-[50%] w-[30%] translate-x-[-50%] z-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Incorrect email or password.</span>
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
        if(isset($_GET['status']) && $_GET['status'] == "unverified") {
            echo '
            <div id="unverified" class="alert alert-error absolute top-12 left-[50%] w-[30%] translate-x-[-50%] z-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Your account is not verified yet.</span>
            </div>
            <style>
                #unverified {
                    opacity: 0;
                    transition: all;
                    animation-name: unverified;
                    animation-duration: 4s;
                }
        
                @keyframes unverified {
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
    <main class="bg-base-100 :bg-gray-900 w-full h-screen">
        <div class="grid grid-cols-2 w-full h-full">
            <div class="flex items-center pl-24 relative">
                <img src="./assets/images/login_bg.png" class="h-full object-cover absolute top-0 left-0 z-10 mix-blend-multiply" alt="">
                <div class="bg-primary opacity-10 absolute top-0 left-0 z-20 w-full h-full"></div>
                <h1 class="font-bold text-8xl text-white relative z-40">Welcome<br/>to</br>AgriLink</h1>
                <!-- <img src="./assets/images/login_bg.png" class="h-full object-cover absolute top-0 left-0 z-50 mix-blend-screen" alt=""> -->
            </div>
            <div class="w-full h-full bg-white flex items-center justify-center">
                <div class="w-full max-w-lg space-y-8 sm:p-8 :bg-gray-800">
                    <h2 class="text-2xl font-bold text-base-content :text-white">
                        Login
                    </h2>
                    <form class="mt-8 space-y-6" action="/agrilink/modules/login.php" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-base-content :text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-white border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-base-content :text-white">Password</label>
                            <input type="password" name="password" id="password" class="bg-white border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary w-28">Login</button>
                        </div>
                        <div class="text-sm font-medium text-gray-500 :text-gray-400">
                            New user? <a href="/agrilink/account_type.php" class="text-primary hover:underline :text-primary-500">Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="flex flex-col items-center px-6 mx-auto mt-36 :bg-gray-900">
            <a href="/agrilink/index.php" class="normal-case text-xl mb-10">
                <img src="./assets/images/logo.png" class="w-44 h-44" alt="">
            </a>
            <div class="w-full max-w-md p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow :bg-gray-800">
                <h2 class="text-2xl font-bold text-base-content :text-white">
                    Login
                </h2>
                <form class="mt-8 space-y-6" action="/agrilink/modules/login.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-base-content :text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-white border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-base-content :text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-white border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary w-28">Login</button>
                    </div>
                    <div class="text-sm font-medium text-gray-500 :text-gray-400">
                        Doesn't have an account? <a href="/agrilink/signup.php" class="text-primary hover:underline :text-primary-500">Sign up</a>
                    </div>
                </form>
            </div>
        </div> -->
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