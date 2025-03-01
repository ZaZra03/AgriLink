<!DOCTYPE html>
<html lang="en" data-theme="agrilink">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AgriLink</title>
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
</head>

<body class="relative">
    <?php
        if(isset($_GET['status']) && $_GET['status'] == "error") {
            echo '
            <div id="error" class="alert alert-error absolute top-12 left-[50%] w-[90%] sm:w-[30%] translate-x-[-50%] z-100">
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
            <div id="unverified" class="alert alert-error absolute top-12 left-[50%] w-[90%] sm:w-[30%] translate-x-[-50%] z-100">
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
    <main class="bg-base-100 min-h-screen flex flex-col md:grid md:grid-cols-2">
        <!-- Left Side - Image & Welcome Text -->
        <div class="hidden md:flex items-center justify-center relative">
            <img src="./assets/images/login_bg.png" class="absolute inset-0 w-full h-full object-cover z-10 mix-blend-multiply" alt="">
            <div class="bg-primary opacity-10 absolute inset-0 z-20"></div>
            <h1 class="font-bold text-4xl md:text-6xl lg:text-8xl text-white relative z-40 text-center">Welcome to AgriLink</h1>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full flex items-center justify-center p-6">
            <div class="w-full max-w-lg space-y-8 bg-white p-6 sm:p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold text-gray-900">Login</h2>
                <form class="space-y-6" action="/AgriLink/modules/login.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-base-content :text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-white border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-base-content :text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-white border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div class="flex justify-start">
                        <button type="submit" class="btn btn-primary w-full">Login</button>
                    </div>
                    <div class="text-sm font-medium text-gray-500">
                        New user? <a href="/AgriLink/account_type.php" class="text-primary hover:underline">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </main>


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