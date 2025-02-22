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
        if(isset($_GET['status']) && $_GET['status'] == "success") {
            echo '
            <div id="success" class="alert alert-success absolute top-10 left-[50%] w-[30%] translate-x-[-50%] z-[99999]">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <span>Signed up successfully! Awaiting verification.</span>
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
    ?>
    
    <main class="bg-base-100 :bg-gray-900">
        <div class="flex flex-col items-center justify-center">
            <!-- Card -->
            <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow :bg-gray-800">
                <h2 class="text-2xl font-bold text-base-content :text-white">
                    Create an account as <span class="text-primary">Seller</span>
                </h2>
                <form class="space-y-6" action="/AgriLink/modules/signup.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="role" value="seller" />
                    <div>
                        <label for="name" class="block mb-1 text-sm font-medium text-base-content :text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-white h-10 border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-1 text-sm font-medium text-base-content :text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-white h-10 border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="number" class="block mb-1 text-sm font-medium text-base-content :text-white">Phone Number</label>
                        <input type="phone" name="number" id="number" class="bg-white h-10 border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="address" class="block mb-1 text-sm font-medium text-base-content :text-white">Address</label>
                        <input type="text" name="address" id="address" class="bg-white h-10 border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-base-content :text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-white h-10 border border-gray-300 text-base-content sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="image" class="block mb-1 text-sm font-medium text-base-content :text-white">Verification ID</label>
                        <input id="image" name="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 :text-gray-400 focus:outline-none :bg-gray-700 :border-gray-600 :placeholder-gray-400" required>
                    </div>
                    <div>
                        <label for="business_permit" class="block mb-1 text-sm font-medium text-base-content :text-white">
                            Business Permit (PDF or Image)
                        </label>
                        <input id="business_permit" name="business_permit" type="file" 
                            accept=".pdf, .jpg, .jpeg, .png" 
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 :text-gray-400 focus:outline-none :bg-gray-700 :border-gray-600 :placeholder-gray-400" 
                            required>
                    </div>
                    <div class="flex justify-center gap-3">
                        <input type="checkbox" required class="checkbox checkbox-xs checkbox-primary" />
                        <p class="text-sm">By clicking this you agree to our <span class="text-blue-600 cursor-pointer"><button onclick="terms_conditions.showModal()" style="all:unset">Terms and Conditions</button></span></p>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="btn btn-primary">Create account</button>
                    </div>
                    <div class="flex justify-center text-sm font-medium text-gray-500 :text-gray-400">
                        Already have an account? <a href="/AgriLink/login.php" class="text-primary hover:underline :text-primary-500 ml-1">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <dialog id="terms_conditions" class="modal">
        <div class="modal-box bg-white max-w-2xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-base-content">✕</button>
            </form>
            <h3 class="text-lg font-bold text-base-content">Terms and Conditions</h3>
            <p class="py-4 text-base-content">
                By registering, you agree to follow these Terms and Conditions and all applicable laws in the Philippines. If you disagree, do not proceed with registration.
                <br />You must provide accurate and current information. You are responsible for safeguarding your account details and password. Accounts cannot be transferred or shared.
                <br />You must be at least 18 years old or have a legal guardian's consent to register.
                <br />Your personal data is protected under the Philippine Data Privacy Act of 2012 (RA No. 10173) and will only be shared with third parties as required by law.
                <br />Accounts must be used lawfully. Illegal activities, such as fraud, may lead to account termination.
                <br />All content on the platform is owned by the Company or its licensors. You cannot use any content without permission.
                <br />We may update these Terms, and your continued use of the platform implies acceptance of any changes.
                <br />We may terminate accounts for violations of these Terms or suspicious activity.
                <br />These Terms are governed by the laws of the Republic of the Philippines.
            </p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

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