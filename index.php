<?php
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
            header("Location: admin/admin.php");
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
    ?>

    <div class="relative max-w-[1080px] mx-auto pt-10 pb-96 px-5">
        <aside id="logo-sidebar" class="fixed top-0 left-0 w-64 z-40 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                            <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">Pro</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                                <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>


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
                            $sale_prod = $crud->read_all("product") ? $crud->read_all("product") : [];
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

                            if ($sale_prod != null) {
                                for ($i = 0; $i < $length; $i++) {
                                    if ($i < 4) {
                                        echo '
                                            <div class="flex flex-col justify-center items-center w-40 gap-1">
                                                <div class="w-40 h-40 rounded-lg">
                                                    <img class="w-full h-full object-cover rounded-t-lg" src="/agrilink/assets/products/'.$sale_prod[$i]['image'].'" />
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
                                                    <img src="/agrilink/assets/products/'.$sale_prod[$i]['image'].'" class="w-full h-full object-cover rounded-t-lg z-0 hover:scale-125 transition" />
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
                                                    <img src="/agrilink/assets/products/'.$product['image'].'" class="w-full h-full object-cover rounded-t-lg" >
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