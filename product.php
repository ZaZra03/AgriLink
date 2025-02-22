<?php
    require_once("./helpers/crud.php");
    if (isset($_SESSION['user_id'])) {
        $user = $crud->read("user", $_SESSION['user_id']);
    }
    if (isset($_GET['id'])) {
        $product_view = $crud->read("product", $_GET['id']);
        if (!$product_view) {
            header("Location: /AgriLink/404.php");
        }
        $seller = $crud->read("user", $product_view['seller_id']);
    } else {
        header("Location: /AgriLink/404.php");
    }
    include "./components/navbar.php";
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
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body class="relative">
    <?php
        if(isset($_GET['status']) && $_GET['status'] == "error") {
            echo '
            <div id="error" class="alert alert-error flex fixed mt-20 top-5 left-[50%] w-auto max-w-[400px] translate-x-[-50%] px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Incorrect password.</span>
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
                        display: block;
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        } else if (isset($_GET['status']) && $_GET['status'] == "success") {
            echo '
            <div id="success" class="alert alert-success flex fixed mt-20 top-5 left-[50%] w-auto max-w-[400px] translate-x-[-50%] px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Product added to cart.</span>
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

    <div class="max-w-[965px] mx-auto pb-96 pt-[3em]">
        <!-- PRODUCT DESCRIPTION -->
        <div class="grid grid-cols-3 w-full mt-10 bg-neutral p-5 rounded gap-4">
            <div class="">
                <div class="bg-gray-300 w-full aspect-square overflow-hidden">
                    <img src="/AgriLink/assets/products/<?php echo $product_view['image'] ?>" alt="" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="col-span-2">
                <form action="./modules/add_to_cart.php" method="post">
                    <h1 class="text-xl font-semibold"><?php echo $product_view['name'] ?></h1>
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <!-- <div class="flex items-center text-gray-400">
                                <h1 class="link link-primary mr-1">5.0</h1>
                                <svg class="h-4 w-4" enable-background="new 0 0 15 15" fill="hsl(var(--p))" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon shopee-rating-stars__primary-star icon-rating-solid"><polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                                <svg class="h-4 w-4" enable-background="new 0 0 15 15" fill="hsl(var(--p))" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon shopee-rating-stars__primary-star icon-rating-solid"><polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                                <svg class="h-4 w-4" enable-background="new 0 0 15 15" fill="hsl(var(--p))" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon shopee-rating-stars__primary-star icon-rating-solid"><polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                                <svg class="h-4 w-4" enable-background="new 0 0 15 15" fill="hsl(var(--p))" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon shopee-rating-stars__primary-star icon-rating-solid"><polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                                <svg class="h-4 w-4 mr-2" enable-background="new 0 0 15 15" fill="hsl(var(--p))" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon shopee-rating-stars__primary-star icon-rating-solid"><polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                                |
                            </div>
                            <div class="ml-2 flex gap-1 text-gray-400">
                                <h1 class="link link-primary mr-1"><?php echo $ratings ? count($ratings) : 0 ?></h1>
                                <h2 class="text-gray-500 mr-2">Ratings</h2>
                                |
                            </div> -->
                            <div class="ml-2 flex gap-1 text-gray-400">
                                <h1 class="link link-primary mr-1"><?php echo (int)$product_view['stock'] - (int)$product_view['available'] ?></h1>
                                <h2 class="text-gray-500 mr-2">Sold</h2>
                            </div>
                        </div>
                        <div class="text-gray-500 text-sm cursor-pointer">
                        </div>
                    </div>
                    <div class="px-3 flex flex-col gap-12">
                        <div>
                            <div class="flex gap-4 items-center mt-2">
                                <h1 class="line-through text-gray-500 text-lg">₱<?php echo number_format($product_view['price']) ?>.00</h1>
                                <h1 class="text-primary text-3xl">₱<?php echo number_format(round((int)$product_view['price'] - ((int)$product_view['price'] * ((int)$product_view['discount']/100)))) ?>.00</h1>
                                <span class="bg-primary rounded p-1 text-xs text-primary-content"><?php echo number_format($product_view['discount']) ?>% OFF</span>
                            </div>
                            <div class="grid grid-cols-4 mt-4 gap-y-5">
                                <div class="flex items-center">
                                    <h1 class="text-gray-500 text-sm">Shop Vouchers</h1>
                                </div>
                                <div class="col-span-3 w-full">
                                    <h1 class="rounded-md bg-base-200 text-sm text-primary w-[8em] p-1 text-center text-nowrap">₱<?php echo number_format(round((int)$product_view['price'] * ((int)$product_view['discount']/100))) ?> OFF</h1>
                                </div>
                                <div class="flex items-center">
                                    <h1 class="text-gray-500 text-sm">Seller</h1>
                                </div>
                                <div class="col-span-3 w-full">
                                    <h1 class="text-sm p-1"><?php echo $seller['name'] ?></h1>
                                </div>
                                <div>
                                    <h1 class="text-gray-500 text-sm">Quantity</h1>
                                </div>
                                <div class="col-span-3 flex items-center gap-2">
                                    <div class="flex items-center ">
                                        <button type="button" onclick="document.getElementById('qty').value > 1 ? document.getElementById('qty').value-- : ''; document.getElementById('buy_button').href = './checkout.php?0=<?php echo $_GET['id'] ?>&qty0='+document.getElementById('qty').value" class="w-7 h-7 border border-gray-300 p-2">
                                            <svg class="w-full h-full" enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon"><polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon></svg>
                                        </button>
                                        <input name="qty" id="qty" class="input input-sm border border-gray-300 h-7 max-w-[4em] rounded-none bg-neutral text-center" value="1" type="number" min="1" oninput="this.value <= 0 ? this.value = 1 : Math.abs(this.value); document.getElementById('buy_button').href = './checkout.php?0=<?php echo $_GET['id'] ?>&qty0='+this.value" />
                                        <button type="button" onclick="document.getElementById('qty').value++; document.getElementById('buy_button').href = './checkout.php?0=<?php echo $_GET['id'] ?>&qty0='+document.getElementById('qty').value" class="w-7 h-7 border border-gray-300 p-2">
                                            <svg class="w-full h-full" enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon icon-plus-sign"><polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon></svg>
                                        </button>
                                    </div>
                                    <h1 class="text-gray-400 text-sm"><?php echo $product_view['available'] ?> pieces available</h1>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-4 mt-4">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <input type="hidden" name="buyer_id" value="<?php echo $user['id'] ?>">
                            <?php
                                if (isset($_SESSION['user_id'])) {
                                    echo '
                                        <button type="submit" class="cursor-pointer flex items-center gap-2 bg-base-100 hover:bg-base-200 h-12 px-4 text-primary font-semibold border border-primary rounded">
                                            <svg class="w-5 h-5 " viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="hsl(var(--p))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cart_plus_round [#1158]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-100.000000, -3039.000000)" fill="hsl(var(--p))"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M49.0001956,2883 C49.5521956,2883 50.0001956,2883.448 50.0001956,2884 C50.0001956,2884.552 49.5521956,2885 49.0001956,2885 L48.0001956,2885 L48.0001956,2886 C48.0001956,2886.552 47.5521956,2887 47.0001956,2887 C46.4481956,2887 46.0001956,2886.552 46.0001956,2886 L46.0001956,2885 L45.0001956,2885 C44.4481956,2885 44.0001956,2884.552 44.0001956,2884 C44.0001956,2883.448 44.4481956,2883 45.0001956,2883 L46.0001956,2883 L46.0001956,2882 C46.0001956,2881.448 46.4481956,2881 47.0001956,2881 C47.5521956,2881 48.0001956,2881.448 48.0001956,2882 L48.0001956,2883 L49.0001956,2883 Z M59.0001956,2897 C58.4491956,2897 58.0001956,2896.551 58.0001956,2896 C58.0001956,2895.339 58.4531956,2895.145 59.0001956,2894.951 C59.5471956,2895.145 60.0001956,2895.339 60.0001956,2896 C60.0001956,2896.551 59.5511956,2897 59.0001956,2897 L59.0001956,2897 Z M47.0001956,2897 C46.4491956,2897 46.0001956,2896.551 46.0001956,2896 C46.0001956,2895.339 46.4531956,2895.145 47.0001956,2894.951 C47.5471956,2895.145 48.0001956,2895.339 48.0001956,2896 C48.0001956,2896.551 47.5511956,2897 47.0001956,2897 L47.0001956,2897 Z M60.0001956,2882 C60.0001956,2881.448 60.4481956,2881 61.0001956,2881 L63.0001956,2881 C63.5521956,2881 64.0001956,2880.552 64.0001956,2880 C64.0001956,2879.448 63.5521956,2879 63.0001956,2879 L60.0001956,2879 C58.8951956,2879 58.0001956,2879.895 58.0001956,2881 L58.0001956,2891 L48.0001956,2891 C46.8951956,2891 46.0001956,2891.895 46.0001956,2893 L46.0001956,2893.184 C44.6631956,2893.659 43.7561956,2895.041 44.0581956,2896.6 C44.2871956,2897.777 45.2561956,2898.734 46.4361956,2898.948 C48.3411956,2899.295 50.0001956,2897.842 50.0001956,2896 C50.0001956,2894.696 49.1631956,2893.597 48.0001956,2893.184 L48.0001956,2893 L58.0001956,2893 L58.0001956,2893.184 C56.6631956,2893.659 55.7561956,2895.041 56.0581956,2896.6 C56.2871956,2897.777 57.2561956,2898.734 58.4361956,2898.948 C60.3411956,2899.295 62.0001956,2897.842 62.0001956,2896 C62.0001956,2894.696 61.1631956,2893.597 60.0001956,2893.184 L60.0001956,2882 Z" id="cart_plus_round-[#1158]"> </path> </g> </g> </g> </g></svg>
                                            <h1>Add to cart</h1>
                                        </button>

                                        
                                    ';
                                } else {
                                    echo '
                                        <a href="/AgriLink/login.php" class="cursor-pointer flex items-center gap-2 bg-base-100 hover:bg-base-200 h-12 px-4 text-primary font-semibold border border-primary rounded">
                                            <svg class="w-5 h-5 " viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="hsl(var(--p))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cart_plus_round [#1158]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-100.000000, -3039.000000)" fill="hsl(var(--p))"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M49.0001956,2883 C49.5521956,2883 50.0001956,2883.448 50.0001956,2884 C50.0001956,2884.552 49.5521956,2885 49.0001956,2885 L48.0001956,2885 L48.0001956,2886 C48.0001956,2886.552 47.5521956,2887 47.0001956,2887 C46.4481956,2887 46.0001956,2886.552 46.0001956,2886 L46.0001956,2885 L45.0001956,2885 C44.4481956,2885 44.0001956,2884.552 44.0001956,2884 C44.0001956,2883.448 44.4481956,2883 45.0001956,2883 L46.0001956,2883 L46.0001956,2882 C46.0001956,2881.448 46.4481956,2881 47.0001956,2881 C47.5521956,2881 48.0001956,2881.448 48.0001956,2882 L48.0001956,2883 L49.0001956,2883 Z M59.0001956,2897 C58.4491956,2897 58.0001956,2896.551 58.0001956,2896 C58.0001956,2895.339 58.4531956,2895.145 59.0001956,2894.951 C59.5471956,2895.145 60.0001956,2895.339 60.0001956,2896 C60.0001956,2896.551 59.5511956,2897 59.0001956,2897 L59.0001956,2897 Z M47.0001956,2897 C46.4491956,2897 46.0001956,2896.551 46.0001956,2896 C46.0001956,2895.339 46.4531956,2895.145 47.0001956,2894.951 C47.5471956,2895.145 48.0001956,2895.339 48.0001956,2896 C48.0001956,2896.551 47.5511956,2897 47.0001956,2897 L47.0001956,2897 Z M60.0001956,2882 C60.0001956,2881.448 60.4481956,2881 61.0001956,2881 L63.0001956,2881 C63.5521956,2881 64.0001956,2880.552 64.0001956,2880 C64.0001956,2879.448 63.5521956,2879 63.0001956,2879 L60.0001956,2879 C58.8951956,2879 58.0001956,2879.895 58.0001956,2881 L58.0001956,2891 L48.0001956,2891 C46.8951956,2891 46.0001956,2891.895 46.0001956,2893 L46.0001956,2893.184 C44.6631956,2893.659 43.7561956,2895.041 44.0581956,2896.6 C44.2871956,2897.777 45.2561956,2898.734 46.4361956,2898.948 C48.3411956,2899.295 50.0001956,2897.842 50.0001956,2896 C50.0001956,2894.696 49.1631956,2893.597 48.0001956,2893.184 L48.0001956,2893 L58.0001956,2893 L58.0001956,2893.184 C56.6631956,2893.659 55.7561956,2895.041 56.0581956,2896.6 C56.2871956,2897.777 57.2561956,2898.734 58.4361956,2898.948 C60.3411956,2899.295 62.0001956,2897.842 62.0001956,2896 C62.0001956,2894.696 61.1631956,2893.597 60.0001956,2893.184 L60.0001956,2882 Z" id="cart_plus_round-[#1158]"> </path> </g> </g> </g> </g></svg>
                                            <h1>Add to cart</h1>
                                        </a>
                                    ';
                                }
                            ?>
                            <a href="./checkout.php?0=<?php echo $_GET['id'] ?>&qty0=1" id="buy_button" class="cursor-pointer flex items-center gap-2 bg-primary hover:bg-primary-focus h-12 px-4 text-primary-content text-center font-semibold rounded">
                                <h1>Buy Now</h1>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="pt-20 pl-10 col-span-2">
                <h1 class="font-semibold text-lg">Description</h1>
                <h1><?php
                    echo $product_view["description"];
                ?></h1>
            </div>
        </div>
        <!-- END OF PRODUCT DESCRIPTION -->

        <!-- FEEDBACK -->
        <!-- <div id="feedback" class="p-5 bg-neutral mt-5">
            <h1>Product Ratings</h1>
            <div class="grid grid-cols-5 bg-base-100 border border-base-300 w-full">
                <div class="p-5 flex flex-col items-center">
                    <h1 class="font-semibold text-primary text-4xl">4.5 <span class="font-medium text-xl">out of 5</span></h1>
                    <div class="rating">
                        <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" disabled class="mask mask-star-2 bg-orange-400" checked />
                        <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                    </div>
                </div>
                <div class="col-span-4 p-5 flex flex-wrap gap-2">
                    <a href="?page=1#feedback" class="border-primary text-primary bg-neutral border h-8 rounded px-5 flex items-center justify-center">
                        <h1>All</h1>
                    </a>
                    <a href="?page=1#feedback" class="border-gray-300 bg-neutral border h-8 rounded px-5 flex items-center justify-center">
                        <h1>5 Star (141)</h1>
                    </a>
                    <a href="?page=1#feedback" class="border-gray-300 bg-neutral border h-8 rounded px-5 flex items-center justify-center">
                        <h1>4 Star (141)</h1>
                    </a>
                    <a href="?page=1#feedback" class="border-gray-300 bg-neutral border h-8 rounded px-5 flex items-center justify-center">
                        <h1>3 Star (141)</h1>
                    </a>
                    <a href="?page=1#feedback" class="border-gray-300 bg-neutral border h-8 rounded px-5 flex items-center justify-center">
                        <h1>2 Star (141)</h1>
                    </a>
                    <a href="?page=1#feedback" class="border-gray-300 bg-neutral border h-8 rounded px-5 flex items-center justify-center">
                        <h1>1 Star (141)</h1>
                    </a>
                </div>
            </div>

            <div class="p-5 border-b border-gray-200">
                <div class="flex gap-2">
                    <div>
                        <div class="w-10 aspect-square bg-primary rounded-full"></div>
                    </div>
                    <div>
                        <h1 class="font-semibold">Alexis Eleserio</h1>
                        <div class="rating rating-sm">
                            <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" disabled class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" disabled class="mask mask-star-2 bg-orange-400" />
                        </div>
                        <h1 class="text-xs opacity-80">2022-02-08 17:33</h1>
                    </div>
                </div>
                <div class="flex items-end">
                    <div class="px-12 pt-4">
                        <h1>Wow nice product okay whahhahahha.</h1>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <div class="join pt-3">
                    <button class="join-item btn btn-sm btn-neutral">«</button>
                    <button class="join-item btn btn-sm btn-neutral btn-active">1</button>
                    <button class="join-item btn btn-sm btn-neutral">2</button>
                    <button class="join-item btn btn-sm btn-neutral">3</button>
                    <button class="join-item btn btn-sm btn-neutral">4</button>
                    <button class="join-item btn btn-sm btn-neutral" disabled>...</button>
                    <button class="join-item btn btn-sm btn-neutral">»</button>
                </div>
            </div>
        </div> -->
        <!-- END OF FEEDBACK -->

        <div class="my-10">
            <div class="flex items-center">
                <h1 class="font-bold opacity-80">SIMILAR PRODUCT</h1>
                <!-- <a href="" class="link link-primary flex items-center">See all
                    <svg class="w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="F-Chevron"> <polyline fill="none" id="Right" points="8.5 5 15.5 12 8.5 19" stroke="hsl(var(--p))" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline> </g> </g> </g></svg>
                </a> -->
            </div>
            <div class="w-full grid grid-cols-5 py-4 gap-5">

                    <?php
                        $records = $crud->search("product", $product_view['type'], ['type']);
                        if ($records) {
                            for ($i = 0; $i < count($records) && $i < 20; $i++) {
                                echo '
                                    <div class="flex flex-col justify-center items-center w-full gap-1 bg-neutral">
                                        <div class="w-full aspect-square bg-gray-300 rounded-t-lg overflow-hidden">
                                            <img src="/AgriLink/assets/products/'.$records[$i]['image'].'" class="w-full h-full object-cover" />
                                        </div>
                                        <h1 class="text-sm font-bold text-neutral-content break-words text-center">'.(strlen($records[$i]['name']) <= 17 ? $records[$i]['name'] : substr($records[$i]['name'], 0, 17)."...").'</h1>
                                        <div class="w-full flex justify-between font-semibold items-center px-2">
                                            <p class="text-primary">₱'.number_format(round((int)$records[$i]['price'] - ((int)$records[$i]['price']*((int)$records[$i]['discount'])/100))).'.00</p>
                                            <span class="text-neutral-content opacity-70 text-xs">'.((int)$records[$i]['stock'] - (int)$records[$i]['available']).' sold</span>
                                        </div>
                                        <a href="/AgriLink/product.php?id='.$records[$i]['id'].'" class="rounded-t-none btn btn-primary btn-sm col-span-2 w-full">View Product</a>
                                    </div>
                                ';
                            }
                        }
                    ?>

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