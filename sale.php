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

    <div class="max-w-[965px] mx-auto pb-96 pt-[6em]">


        <h1 class="font-bold text-3xl text-center text-neutral-content">SALE</h1>

        <div class="flex justify-center items-center mt-10">
            
            <!-- <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                            Top Picks
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 text-primary border-b-2 border-primary rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">
                            Selling Out
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                            Best Selllers
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                            Featured Deals
                        </a>
                    </li>
                </ul>
            </div> -->

        </div>
        
        <!-- DISCOVER -->
        <div class="bg-neutral w-full mt-5 rounded-md py-6 px-8">
            <div class="w-full grid grid-cols-5 py-4 gap-5">

            <?php
                    $sale_prod = $crud->read_all("product") ? $crud->read_all("product") : [];
                    $length = count($sale_prod);
                    for ($outer = 0; $outer < $length; $outer++) {
                        for ($inner = 0; $inner < $length; $inner++) {
                            if (($sale_prod[$outer]['price'] * ((int)$sale_prod[$outer]['discount']/100)) > ($sale_prod[$inner]['price'] * ((int)$sale_prod[$inner]['discount']/100))) {
                                $tmp = $sale_prod[$outer];
                                $sale_prod[$outer] = $sale_prod[$inner] ;
                                $sale_prod[$inner]  = $tmp;
                            }
                        }
                    }
                    if ($sale_prod != null && count($sale_prod) >= 5) {
                        for ($i = 0; $i < 20; $i++) {
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
        <!-- END OF DISCOVER SECTION -->
    </div> 
    
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