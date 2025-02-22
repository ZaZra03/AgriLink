<?php
    session_start();

    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
            header("Location: /AgriLink/admin/admin.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en" data-theme="agrilink">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriLink</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
</head>
<body class="relative">

    <?php
        require_once("./helpers/crud.php");
        include "./components/navbar.php";
        include "./components/sidebar.php";
    ?>

    <div class="relative max-w-[1080px] mx-auto pt-10 pb-96 px-5">
        <div class="sm:ml-64">
            <div class="rounded-lg dark:border-gray-700">
                <!-- HERO SECTION -->
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden mt-20 rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="./assets/images/BANNER1.png" class="absolute block w-full" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="./assets/images/BANNER1.png" class="absolute block w-full" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="./assets/images/BANNER1.png" class="absolute block w-full" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="./assets/images/BANNER1.png" class="absolute block w-full" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="./assets/images/BANNER1.png" class="absolute block w-full" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex bottom-5 left-1/2 transform -translate-x-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                <!-- END OF HERO SECTION -->

                <!-- SALE -->
                <div class="bg-neutral w-full mt-10 rounded-md py-6 px-8">
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold text-xl text-neutral-content">SALE</h1>
                        <a href="./sale.php" class="text-neutral-content text-xs font-bold flex items-center w-28 justify-end gap-1">
                            <span>See all</span>    
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Arrow / Chevron_Right_MD"> <path id="Vector" d="M10 8L14 12L10 16" stroke="hsl(var(--nc))" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                        </a>
                    </div>

                    <div class="w-full grid grid-cols-2 lg:grid-cols-4 md:grid-cols-5 py-4 gap-5 gap-x-10">
                        <?php
                            $sale_prod = $crud->read_all("product") ?? [];
                            $length = count($sale_prod);

                            // Comparison-based sorting algorithm
                            for ($outer = 0; $outer < $length; $outer++) {
                                for ($inner = 0; $inner < $length; $inner++) {
                                    if (($sale_prod[$outer]['price'] * ((int)$sale_prod[$outer]['discount']/100)) > ($sale_prod[$inner]['price'] * ((int)$sale_prod[$inner]['discount']/100))) {
                                        $tmp = $sale_prod[$outer];
                                        $sale_prod[$outer] = $sale_prod[$inner] ;
                                        $sale_prod[$inner]  = $tmp;
                                    }
                                }
                            }
                            // var_dump($sale_prod);
                            if ($sale_prod != null) {
                                for ($i = 0; $i < $length; $i++) {
                                    if ($i < 4) {
                                        echo '
                                            <div class="flex flex-col justify-center items-center w-40 gap-1">
                                                <div class="w-40 h-40 rounded-lg">
                                                    <img class="w-full h-full object-cover rounded-t-lg" src="/AgriLink/assets/products/'.$sale_prod[$i]['image'].'" />
                                                </div>
                                                <h1 class="text-sm font-bold text-neutral-content text-center">'.(strlen($sale_prod[$i]['name']) <= 17 ? $sale_prod[$i]['name'] : substr($sale_prod[$i]['name'], 0, 17)."...").'</h1>
                                                <div class="w-full flex justify-between px-3 font-semibold items-start">
                                                    <span class="line-through text-neutral-content opacity-70 text-sm">₱'.number_format($sale_prod[$i]['price']).'.00</span>
                                                    <p class="text-primary">₱'.number_format(round((int)$sale_prod[$i]['price'] - ((int)$sale_prod[$i]['price'] * ((int)$sale_prod[$i]['discount']/100)))).'.00</p>
                                                </div>
                                                <a href="./product.php?id='.$sale_prod[$i]['id'].'" class="rounded-t-none btn btn-primary btn-sm col-span-2 w-full">View Product</a>
                                            </div>
                                        ';
                                    }
                                }
                            } else {
                                echo '
                                    <div class="w-full h-40 flex items-center justify-center">
                                        <h1 class="font-semibold text-xl">No product</h1>
                                    </div>
                                ';
                            }
                        ?>

                        
                    </div>
                </div>
                <!-- END OF SALE SECTION -->

                <!-- TOP PRODUCTS -->
                <div class="bg-neutral w-full mt-10 rounded-md py-6 px-8">
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold text-xl text-neutral-content">TOP PRODUCTS</h1>
                        <a href="./top_product.php" class="text-neutral-content text-xs font-bold flex items-center w-28 justify-end gap-1">
                            <span>See all</span>    
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Arrow / Chevron_Right_MD"> <path id="Vector" d="M10 8L14 12L10 16" stroke="hsl(var(--nc))" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                        </a>
                    </div>
                    <div class="w-full grid grid-cols-2 lg:grid-cols-4 md:grid-cols-5 py-4 gap-5 gap-x-10">
                        <?php
                            for ($outer = 0; $outer < $length; $outer++) {
                                for ($inner = 0; $inner < $length; $inner++) {
                                    if (((int)$sale_prod[$outer]['stock'] - (int)$sale_prod[$outer]['available']) > ((int)$sale_prod[$inner]['stock'] - (int)$sale_prod[$inner]['available'])) {
                                        $tmp = $sale_prod[$outer];
                                        $sale_prod[$outer] = $sale_prod[$inner] ;
                                        $sale_prod[$inner]  = $tmp;
                                    }
                                }
                            }
                            if ($sale_prod) {
                                for ($i = 0; $i < count($sale_prod); $i++) {
                                    if ($i < 4) {
                                        echo '
                                            <a href="./product.php?id='.$sale_prod[$i]['id'].'" class="flex flex-col justify-center items-center w-40 gap-1">
                                                <div class="w-40 h-40 bg-gray-300 rounded-lg relative overflow-hidden">
                                                    <img src="/AgriLink/assets/products/'.$sale_prod[$i]['image'].'" class="w-full h-full object-cover rounded-t-lg z-0 hover:scale-125 transition" />
                                                    <h1 class="absolute bottom-3 z-30 font-bold text-primary-content text-sm text-center w-full">Monthly Sales '.((int)$sale_prod[$i]['stock'] - (int)$sale_prod[$i]['available']).'</h1>
                                                    <div class="absolute bottom-0 w-full h-12 bg-primary rounded-b-lg opacity-80"></div>
                                                </div>
                                                <h1 class="text-sm font-bold text-neutral-content break-words text-center">'.(strlen($sale_prod[$i]['name']) <= 17 ? $sale_prod[$i]['name'] : substr($sale_prod[$i]['name'], 0, 17)."...").'</h1>
                                                <div class="w-full flex justify-between font-semibold items-center">
                                                    <p class="text-primary">₱'.number_format(round((int)$sale_prod[$i]['price'])).'.00</p>
                                                    <span class="text-neutral-content opacity-70 text-xs">'.((int)$sale_prod[$i]['stock'] - (int)$sale_prod[$i]['available']).' sold</span>
                                                </div>
                                            </a>
                                        ';
                                    }
                                }
                            } else {
                                echo '
                                    <div class="w-full h-40 flex items-center justify-center">
                                        <h1 class="font-semibold text-xl">No product</h1>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
                <!-- END OF TOP PRODUCTS SECTION -->

                <!-- DISCOVER -->
                <div class="bg-neutral w-full mt-10 rounded-md py-6 px-8">
                    <h1 class="font-bold text-xl text-neutral-content">DAILY DISCOVER</h1>
                    <div class="w-full grid grid-cols-2 lg:grid-cols-4 md:grid-cols-5 py-4 gap-5 gap-x-10">
                            <?php
                                $sale_prod = $crud->read_all("product");
                                $i = 0;
                                if ($i <= 10 && $sale_prod) {
                                    shuffle($sale_prod);
                                    foreach ($sale_prod as $product) {
                                        echo '
                                            <div class="flex flex-col justify-center items-center w-40 gap-1">
                                                <div class="w-40 h-40 rounded-t-lg">
                                                    <img src="/AgriLink/assets/products/'.$product['image'].'" class="w-full h-full object-cover rounded-t-lg" >
                                                </div>
                                                <h1 class="text-sm font-bold text-neutral-content break-words text-center">'.(strlen($product['name']) <= 17 ? $product['name'] : substr($product['name'], 0, 17)."...").'</h1>
                                                <div class="w-full flex justify-between font-semibold items-center">
                                                    <p class="text-primary">₱'.number_format(round((int)$product['price'] - ((int)$product['price'] * ((int)$product['discount']/100)))).'.00</p>
                                                    <span class="text-neutral-content opacity-70 text-xs">'.((int)$product['stock'] - (int)$product['available']).' sold</span>
                                                </div>
                                                <a href="./product.php?id='.$product['id'].'" class="rounded-t-none btn btn-primary btn-sm col-span-2 w-full">View Product</a>
                                            </div>
                                        ';
                                        $i++;
                                    }
                                } else {
                                    echo '
                                    <div class="w-full h-40 flex items-center justify-center col-span-5">
                                        <h1 class="font-semibold text-xl">No product</h1>
                                    </div>
                                ';
                                }
                            ?>

                    </div>
                </div>
                <!-- END OF DISCOVER SECTION -->
            </div>
        </div>
    </div> 


    <!-- FOOTER -->
    <?php
        include './components/footer.php';
    ?>
    <!-- END OF FOOTER -->
    

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>