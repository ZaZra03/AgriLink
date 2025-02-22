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
        require "./helpers/crud.php";
        if (!isset($_SESSION['user_id'])) {
            header("Location: /AgriLink/login.php");
        }
        include "./components/navbar.php";
    ?>

    <form action="/AgriLink/modules/checkout.php" method="post">
    <div class="max-w-[965px] mx-auto pt-5 pb-96">
        <h1 class="font-bold text-3xl text-center text-neutral-content py-5">Checkout</h1>
        <div class="w-full relative bg-neutral px-5 py-8 rounded mb-5">
            <style>
                .address-top {
                    background: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);
                }
            </style>
            <div class="w-full h-[3px] absolute top-0 left-0 address-top rounded"></div>
            <div class="flex items-center gap-2 pb-5">
                <svg height="16" viewBox="0 0 12 16" width="12" class="shopee-svg-icon icon-location-marker"><path fill="hsl(var(--p))" d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path></svg>
                <h1 class="text-xl font-semibold text-primary">Delivery Address</h1>
            </div>
            <div class="flex items-center gap-5">
                <h1 class="font-bold"><?php echo $user['name'] . " " . $user['phone'] ?></h1>
                <h1><?php echo $user['address'] ?></h1>
                <a href="/AgriLink/user.php?page=account" class="text-blue-500 text-sm cursor-pointer">Change</a>
            </div>
        </div>

        <?php
            $product_total = 0;
            parse_str(http_build_query($_GET), $records);
            for($i=0; $i<(count($records)/2); $i++) {
                $checkout_product = $crud->read("product", $records[$i]) ? $crud->read("product", $records[$i]) : $crud->read("product", $crud->read("cart", $records[$i])['product_id']);
                echo '<input type="hidden" name="product_id[]" value="'.$checkout_product['id'].'">
                <input type="hidden" name="cart_id[]" value="'.$records[$i].'">
                <div class="bg-neutral w-full p-4 rounded-lg mb-5">
                    <div class="flex items-center border-b border-gray-200 pb-3">
                        <div class="flex items-center gap-2">
                            <h1 class="font-bold text-xs">'.$checkout_product['type'].'</h1>
                            <a href="/AgriLink/product.php?id='.$records[$i].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-4">
                        <div class="flex items-center gap-4">
                            <img src="/AgriLink/assets/products/'.$checkout_product['image'].'" class="w-24 h-24 rounded">
                            <div>
                                <div class="font-semibold mb-1">'.$checkout_product['name'].'</div>
                            </div>
                        </div>
                        <h1>Qty: <span class="font-semibold">'.$records['qty'.$i].'</span></h1>
                        <input type="hidden" name="qty[]" value="'.$records['qty'.$i].'">
                        <h1>Price: <span class="font-semibold">₱'.number_format(round((int)$checkout_product['price'] - ((int)$checkout_product['price'] * ((int)$checkout_product['discount']/100)))*(int)$records['qty'.$i]).'.00</span></h1>
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="w-full h-full p-5 flex items-center gap-2 border-y border-r border-gray-300 border-dashed">
                            <h1>Message:</h1>
                            <input type="text" name="message[]" placeholder="Leave a message..." class="input bg-white input-sm border-gray-300">
                        </div>
                        <div class="text-sm col-span-2 flex justify-between py-4 px-5 gap-4 border-y border-gray-300 border-dashed">
                            <h1 class="text-green-500 font-semibold">Shipping details:</h1>
                            <div>
                                <h1 class="font-semibold">Standard Local</h1>
                                <h1 class="opacity-80">Receive by '.date("j M", strtotime("+5 days")).' - '.date("j M", strtotime("+8 days")).'</h1>
                            </div>
                            <h1>₱38</h1>
                        </div>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                            Order Total: <span class="text-primary text-2xl">₱'.number_format((round((int)$checkout_product['price'] - ((int)$checkout_product['price'] * ((int)$checkout_product['discount']/100)))*(int)$records['qty'.$i])+38).'.00</span>
                        </h1>
                    </div>
                </div>
                <input type="hidden" name="total[]" value="'.round((int)$checkout_product['price'] - ((int)$checkout_product['price'] * ((int)$checkout_product['discount']/100)))*(int)$records['qty'.$i].'">';
                $product_total += round((int)$checkout_product['price'] - ((int)$checkout_product['price'] * ((int)$checkout_product['discount']/100)))*(int)$records['qty'.$i];
            }
        ?>
        <input type="hidden" name="buyer" value="<?php echo $user['name'] ?>">

        <div class="grid grid-cols-3 w-full bg-neutral px-5 py-8 rounded mb-5">
            <div class="col-span-3 flex items-center justify-between pb-8 border-b border-gray-300">
                <h1 class="text-xl font-semibold">Payment Method</h1>
                <!-- <h1 class="font-semibold">Cash on Delivery</h1> -->
                <select name="payment" class="select select-sm bg-white border border-gray-200 w-full max-w-[14em]">
                    <option value="Cash on Delivery" selected>Cash on Delivery</option>
                    <option value="Online Payment">Online Payment</option>
                </select>
            </div>
            <div class="col-span-2 border-b border-gray-300"></div>
            <div class="grid grid-cols-2 gap-2 py-5 border-b border-gray-300">
                <h1>Product Total:</h1>
                <h1 class=" text-right">₱<?php echo number_format($product_total) ?>.00</h1>
                <h1>Shipping Total:</h1>
                <h1 class=" text-right">₱<?php echo number_format((count($records)/2)*38) ?>.00</h1>
                <h1>Total Payment:</h1>
                <h1 class="text-3xl text-right text-primary font-semibold">₱<?php echo number_format($product_total + ((count($records)/2)*38)) ?>.00</h1>
            </div>
            <div class="col-span-2"></div>
            <button class="btn btn-primary w-36 ml-auto mt-5">Place Order</button>
        </div>
    </div>
    </form>
    <!-- FOOTER -->
    <?php
        include './components/footer.php';
    ?>
    <!-- END OF FOOTER -->
    
</body>
</html>