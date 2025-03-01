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

    </style>
</head>
<body class="relative">

    <?php
        require_once("./helpers/crud.php");
        if (!isset($_SESSION['user_id'])) {
            header("Location: /AgriLink/login.php");
        }
        include "./components/navbar.php";
    ?>

    <div class="max-w-[965px] mx-auto mt-[5%] pb-[30%]">
        <h1 class="font-bold text-3xl text-center text-neutral-content py-5">CART</h1>
        <form action="/AgriLink/modules/remove_cart.php" method="post" onkeydown="return event.key != 'Enter';">
        <?php
            $records = $crud->search("cart", $user['id'], ["buyer_id"]);
            $i = 0;
            if ($records) {
                foreach ($records as $record) {
                    $product = $crud->read("product", $record['product_id']);
                    echo '
                        <!-- CARD -->
                        <input type="hidden" name="id" value="'.$record['id'].'" />
                        <div class="bg-neutral w-full p-4 rounded-lg mb-5 shadow">
                            <div class="flex items-center border-b border-gray-200 pb-3">
                                <div class="flex items-center gap-2">
                                    <h1 class="font-bold text-xs">Product</h1>
                                    <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3">
                                <div class="flex items-center gap-4">
                                    <input type="checkbox" name="foo[]" value="'.$record['id'].'" '.($i == 0 ? "checked" : "").' class="checkbox checkbox-sm" />
                                    <div class="w-24 h-24 bg-primary rounded overflow-hidden">
                                        <img src="/AgriLink/assets/products/'.$product['image'].'" class="w-full h-full object-cover" />
                                    </div>
                                    <div>
                                        <div class="font-semibold mb-1 w-36">'.$product['name'].'</div>
                                        
                                    </div>
                                </div>
                                <div class="opacity-70 text-sm font-semibold">
                                    <h2 class="text-xs">Product type:</h2>
                                    <h1>'.$product['type'].'</h1>
                                </div>
                                <div class="flex items-center gap-3">
                                    <h1 class="line-through opacity-70 '.($product['discount'] > 0 ? "" : "hidden").'" id="'.$product['price'].'">₱'.$product['price'].'.00</h1>
                                    <h1 class="font-semibold text-primary total" id="total'.$record['id'].'">₱'.round(((int)$product['price'] - ((int)$product['price'] * (int)$product['discount'] / 100)) * (int)$record['qty']).'.00</h1>
                                    <h1>'.round(((int)$product['price'] - ((int)$product['price'] * (int)$product['discount'] / 100)) * (int)$record['qty']).'</h1>
                                </div>
                                <div class="flex items-center ">
                                    <button type="button" name="decrement" class="w-7 h-7 border border-gray-300 p-2">
                                        <svg class="w-full h-full" enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon"><polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon></svg>
                                    </button>
                                    <input id="'.'qty'.$i.'" class="input input-sm border border-gray-300 h-7 max-w-[4em] rounded-none bg-neutral text-center" value="'.$record['qty'].'" min="1" oninput="this.value <= 0 ? this.value = 1 : Math.abs(this.value)" />
                                    <button type="button" name="increment" class="w-7 h-7 border border-gray-300 p-2">
                                        <svg class="w-full h-full" enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon icon-plus-sign"><polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon></svg>
                                    </button>
                                </div>
                                <a href="/AgriLink/modules/delete_cart_item.php?id='.$record['id'].'" class="hover:text-primary cursor-pointer text-sm pr-3">Delete</a>
                            </div>
                        </div>
                        <!-- END OF CARD -->
                    ';
                    $i++;
                }
            } else {
                echo '
                    <div class="w-full h-[25em] bg-neutral my-4 flex flex-col justify-center gap-3 items-center">
                        <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                        <h1 class="font-semibold text-lg">No products found</h1>
                    </div>
                ';
            }
        ?>
        
        <div class="sticky bottom-0 left-0 w-full bg-neutral flex justify-between mt-5 p-5 z-[10000] rounded shadow-lg border-2 border-gray-100">
            <div class="flex items-center gap-4">
                <input type="checkbox" onclick="toggle(this)" id="select_all" class="checkbox checkbox-sm" />
                <label for="select_all" class="hover:text-primary cursor-pointer">Select all</label>
                <button type="<?php echo !$records ? "button" : "submit" ?>" class="hover:text-primary cursor-pointer">Delete</button>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <h1 class="" id="items">Total item (<?php echo $records ? 1 : 0 ?>):</h1>
                    <span class="text-xl text-primary font-semibold" id="price">₱0.00</span>
                </div>
                <a href="" class="btn btn-primary w-36" id="check_out" disabled>Check out</a>
            </div>
        </div>
        <div class="my-10">
            <div class="flex items-center">
                <h1 class="font-bold opacity-80 px-5">YOU MAY ALSO LIKE</h1>
            </div>
            <div class="w-full grid grid-cols-3 lg:grid-cols-5 px-5 py-4 gap-5">

                    <?php
                        $suggest  = $crud->read_all("product");
                        shuffle($suggest);
                        for ($i = 0; $i < 20 && $i < count($suggest); $i++) {
                            echo '
                                <div class="flex flex-col justify-center items-center w-full gap-1 bg-neutral">
                                    <div class="w-full aspect-square bg-gray-300 rounded-t-lg overflow-hidden">
                                        <img src="/AgriLink/assets/products/'.$suggest[$i]['image'].'" class="w-full h-full object-cover" />
                                    </div>
                                    <h1 class="text-sm font-bold text-neutral-content break-words text-center">'.(strlen($suggest[$i]['name']) <= 17 ? $suggest[$i]['name'] : substr($suggest[$i]['name'], 0, 17)."...").'</h1>
                                    <div class="w-full flex justify-between font-semibold items-center px-2">
                                        <p class="text-primary">₱'.number_format(round((int)$suggest[$i]['price'] - ((int)$suggest[$i]['price'] * ((int)$suggest[$i]['discount']/100)))).'.00</p>
                                        <span class="text-neutral-content opacity-70 text-xs">'.((int)$suggest[$i]['current_stock'] - (int)$suggest[$i]['available']).' sold</span>
                                    </div>
                                    <a href="./product.php?id='.$suggest[$i]['id'].'" class="rounded-t-none btn btn-primary btn-sm col-span-2 w-full">View Details</a>
                                </div>
                            ';
                        }
                    ?>

            </div>
        </div>
    </form>
    </div> 
    <!-- foo[]TER -->
    <?php
        include './components/footer.php';
    ?>
    <!-- END OF foo[]TER -->
    
    <script>

        <?php
        if ($records) {
            $i = 0;
            foreach ($records as $record) {
                $product = $crud->read("product", $record['product_id']);
                echo '
                document.getElementById('."'"."total".$record['id']."'".').innerHTML = '."'₱"."'+(".(((int)$product['price'] - (round((int)$product['price'] * ((int)$product['discount'])/100))*(int)$record['qty'])).'*document.getElementById('."'qty".$i.''."'".').value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'."'".".00'".';
                const totalPrice'.$product['id'].' = document.getElementsByClassName("total");
                let overall'.$product['id'].' = 0;
                checkboxes = document.getElementsByName("foo[]");
                for (let l=0; l<checkboxes.length; l++) {
                    if (checkboxes[l].checked) {
                        let total = totalPrice'.$product['id'].'[l].innerHTML.replace("₱", "");
                        total = parseInt(total.replace(",", ""));
                        overall'.$product['id'].' += total;
                    }
                }
                const discount'.$product['id'].' = document.getElementById("'.$product['price'].'");
                let totalDiscount'.$product['id'].' = discount'.$product['id'].'.innerHTML.replace("₱", "");
                totalDiscount'.$product['id'].' = parseInt(totalDiscount'.$product['id'].'.replace(",", ""));
                discount'.$product['id'].'.innerHTML = "₱" + overall'.$product['id'].'.toLocaleString() + ".00";
                document.getElementsByName("increment")['.$i.'].addEventListener("click", () => {
                    document.getElementById('."'".'qty'.$i."'".').value++; 
                    document.getElementById('."'"."total".$record['id']."'".').innerHTML = '."'₱"."'+(".(((int)$product['price'] - (round((int)$product['price'] * ((int)$product['discount'])/100))*(int)$record['qty'])).'*document.getElementById('."'qty".$i.''."'".').value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'."'".".00'".';
                    const totalProd = document.getElementsByClassName("total");
                    let overall = 0;
                    checkboxes = document.getElementsByName("foo[]");
                    for (let l=0; l<checkboxes.length; l++) {
                        if (checkboxes[l].checked) {
                            let total = totalProd[l].innerHTML.replace("₱", "");
                            total = parseInt(total.replace(",", ""));
                            overall += total;
                        }
                    }
                    document.getElementById("price").innerHTML = "₱" + overall.toLocaleString() + ".00";
                });
                
                
                document.getElementsByName("decrement")['.$i.'].addEventListener("click", () => {
                    document.getElementById('."'".'qty'.$i."'".').value > 1 ? document.getElementById('."'".'qty'.$i."'".').value-- : '."''".'; 
                    document.getElementById('."'"."total".$record['id']."'".').innerHTML = '."'₱"."'+(".(((int)$product['price'] - (round((int)$product['price'] * ((int)$product['discount'])/100))*(int)$record['qty'])).'*document.getElementById('."'qty".$i.''."'".').value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'."'".".00'".'
                    const totalProdDec = document.getElementsByClassName("total");
                    let overall = 0;
                    checkboxes = document.getElementsByName("foo[]");
                    for (let l=0; l<checkboxes.length; l++) {
                        if (checkboxes[l].checked) {
                            let total = totalProdDec[l].innerHTML.replace("₱", "");
                            total = parseInt(total.replace(",", ""));
                            overall += total;
                        }
                    }
                    document.getElementById("price").innerHTML = "₱" + overall.toLocaleString() + ".00";
                })
                
                document.getElementById("'.'qty'.$i.'").addEventListener("change", () => {
                    document.getElementById('."'"."total".$record['id']."'".').innerHTML = '."'₱"."'+(".(round((int)$product['price'] - ((int)$product['price'] * ((int)$product['discount'])/100))).'*document.getElementById("'.'qty'.$i.'").value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'."'".".00'".';
                    const totalProdInc = document.getElementsByClassName("total");
                    let overall = 0;
                    checkboxes = document.getElementsByName("foo[]");
                    for (let l=0; l<checkboxes.length; l++) {
                        if (checkboxes[l].checked) {
                            let total = totalProdInc[l].innerHTML.replace("₱", "");
                            total = parseInt(total.replace(",", ""));
                            overall += total;
                        }
                    }
                    document.getElementById("price").innerHTML = "₱" + overall.toLocaleString() + ".00";
                })
                ';
                $i++;
            }
        }
                    
        ?>

        let initialPrice = document.getElementsByClassName("total")[0].innerHTML.replace("₱", "");
            initialPrice = parseInt(initialPrice.replace(",", ""));
        document.getElementById("price").innerHTML = "₱" + initialPrice.toLocaleString() + ".00";
        document.getElementById("check_out").href = "/AgriLink/checkout.php?" + 0 + "=" + document.getElementsByName("foo[]")[0].value + "&qty0=" + document.getElementById("qty0").value;
        function toggle(source) {
            checkboxes = document.getElementsByName('foo[]');
            for(var i = 0 ; i < checkboxes.length; i++) {
                checkboxes[i].checked = source.checked;
                let k = 0;
                for (let j = 0; j < checkboxes.length; j++) {
                    if (checkboxes[j].checked) {
                            k++;
                    }
                } 
                document.getElementById("items").innerHTML = "Total item ("+k+"):";
                if(k < 3) {
                    document.getElementById("check_out").setAttribute("disabled", "");
                    
                } else {
                    document.getElementById("check_out").removeAttribute("disabled");
                }
            }


            const totalProd = document.getElementsByClassName("total");
            let overall = 0;
            for (let l=0; l<checkboxes.length; l++) {
                if (checkboxes[l].checked) {
                    let total = totalProd[l].innerHTML.replace("₱", "");
                        total = parseInt(total.replace(",", ""));
                    overall += total;
                }
            }
            document.getElementById("price").innerHTML = "₱" + overall.toLocaleString() + ".00";
            
            let param = "";
            let paramIndex = 0;
            for (let l=0; l<checkboxes.length; l++) {
                if (checkboxes[l].checked) {
                    let total = totalProd[l].innerHTML.replace("₱", "");
                    total = parseInt(total.replace(",", ""));
                    overall += total;
                    let qty = document.getElementById("qty"+l);
                    param+= (paramIndex > 0 ? "&" : "") + paramIndex + "=" + checkboxes[l].value+"&qty"+ paramIndex + "=" + qty.value;
                    paramIndex++;
                }
            }
            document.getElementById("check_out").href = "/AgriLink/checkout.php?" + param;
        }

        document.addEventListener("DOMContentLoaded", () => {
            const items = document.getElementsByName('foo[]');
            const totalProd = document.getElementsByClassName("total");
            const checkOutButton = document.getElementById("check_out");
            const priceElement = document.getElementById("price");
            const itemsElement = document.getElementById("items");

            // Event delegation for click events
            document.addEventListener("click", (event) => {
                if (event.target && event.target.name === 'foo[]') {
                    let k = 0; // Count of checked items
                    let overall = 0; // Total price
                    let param = ""; // Query parameters for checkout
                    let paramIndex = 0; // Index for query parameters

                    for (let j = 0; j < items.length; j++) {
                        if (items[j].checked) {
                            k++;
                            // Extract the price and convert it to a number
                            const priceText = totalProd[j].innerHTML.replace("₱", "").replace(/,/g, "");
                            const price = parseInt(priceText, 10);
                            overall += price;

                            // Add item value and quantity to the query parameters
                            const qty = document.getElementById("qty" + j).value;
                            param += `${paramIndex > 0 ? "&" : ""}${paramIndex}=${items[j].value}&qty${paramIndex}=${qty}`;
                            paramIndex++;
                        }
                    }

                    // Update the checkout button's href
                    checkOutButton.href = `/AgriLink/checkout.php?${param}`;

                    // Update the total price display
                    priceElement.innerHTML = `₱${overall.toLocaleString()}.00`;

                    // Update the total items count
                    itemsElement.innerHTML = `Total item (${k}):`;

                    // Enable or disable the checkout button based on the number of selected items
                    if (k < 3) {
                        checkOutButton.setAttribute("disabled", "");
                    } else {
                        checkOutButton.removeAttribute("disabled");
                    }
                }
            });
        });

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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>