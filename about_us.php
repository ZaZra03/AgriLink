<?php
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
            header("Location: /AgriLink/admin/admin.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en" data-theme="agrilink" class="min-h-full">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriLink</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>
</head>
<?php
    include "./components/navbar.php";
?>
<body class="relative min-h-full h-<?php echo $productCount <= 5 ? "screen" : "full" ?>">
    <div class="max-w-[965px] mx-auto pt-[6em]">
        <div class="w-full gap-4">            
            <div class="w-full flex flex-col gap-10 py-4 rounded">
                <div class="flex items-center justify-center">
                    <img src="assets/images/logo.png" class="w-[12em]" alt="">
                </div>
                <div class="text-center">
                    <h1 class="text-2xl font-bold mb-2">About Us</h1>
                    <p class="text-lg">
                        Welcome to AgriLink, your trusted partner in delivering high-quality agricultural products with efficiency and reliability.<br />
                        At AgriLink, we bridge the gap between farmers, suppliers, and customers by providing a seamless platform for sourcing, selling, and delivering agricultural goods. Our mission is to empower local sellers while ensuring our customers receive fresh, top-grade products directly from the source.
                    </p>
                </div>
                <div class="text-center">
                    <h1 class="text-2xl font-bold mb-2">Our Vision</h1>
                    <p class="text-lg">
                        To revolutionize the agricultural supply chain by creating a sustainable and mutually beneficial ecosystem for buyers and sellers, fostering growth and trust in every transaction.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-[20em] mt-10">
        <div class="bg-[#577a29] py-20 flex flex-col gap-[10em]">
            <div class="flex flex-col gap-5">
                <h1 class="text-2xl font-bold mb-2 text-center text-primary-content">What We Offer</h1>
                <div class="flex justify-center gap-5">
                    <img src="assets/images/product1.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <img src="assets/images/product2.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <img src="assets/images/product3.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <img src="assets/images/product4.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <img src="assets/images/product5.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="text-2xl font-bold mb-2 text-center text-primary-content">Why Choose Us?</h1>
                <div class="flex justify-center gap-[6em]">
                    <div>
                        <img src="assets/images/icon1.png" class="h-[9em] mb-5" alt="">
                        <h2 class="text-xl font-semibold text-primary-content text-center">Customer-Centric<br />Approach</h2>
                    </div>
                    <div>
                        <img src="assets/images/icon2.png" class="h-[9em] mb-5" alt="">
                        <h2 class="text-xl font-semibold text-primary-content text-center">Seamless<br />Operations</h2>
                    </div>
                    <div>
                        <img src="assets/images/icon3.png" class="h-[9em] mb-5" alt="">
                        <h2 class="text-xl font-semibold text-primary-content text-center">Commitment to<br />Excellence</h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="text-2xl font-bold mb-2 text-center text-primary-content">Meet the Team</h1>
                <div class="flex justify-center gap-5">
                    <img src="assets/images/team1.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <img src="assets/images/team2.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <img src="assets/images/team3.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                    <div class="relative rounded-full aspect-square h-[12em] overflow-hidden">
                        <div class="w-full h-full bg-white absolute top-0 left-0"></div>
                        <img src="assets/images/team4.png" class="rounded-full object-cover h-full w-full relative z-20" alt="">
                    </div>
                    <img src="assets/images/team5.png" class="rounded-full object-cover aspect-square h-[12em]" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php
        include "./components/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>