<div class="col-span-4 p-4 text-neutral-content">
    <div class="bg-neutral pt-2 w-full flex justify-center items-center rounded-lg">
        <div class="tabs">
            <a href="?page=purchase&tab=all" class="tab tab-md tab-lifted <?php echo !isset($_GET['tab']) || $_GET['tab'] == "all" ? "tab-active" : "" ?>">All</a> 
            <a href="?page=purchase&tab=pay" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "pay" ? "tab-active" : "" ?>">To Process</a> 
            <a href="?page=purchase&tab=ship" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "ship" ? "tab-active" : "" ?>">To Ship</a> 
            <a href="?page=purchase&tab=receive" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "receive" ? "tab-active" : "" ?>">To Receive</a>
            <a href="?page=purchase&tab=complete" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "complete" ? "tab-active" : "" ?>">Completed</a>
            <a href="?page=purchase&tab=cancel" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "cancel" ? "tab-active" : "" ?>">Cancelled</a>
            <a href="?page=purchase&tab=return" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "return" ? "tab-active" : "" ?>">Return Refund</a>
        </div>
    </div>
    <?php
        $tab = isset($_GET['tab']) ? $_GET['tab'] : "";

        switch ($tab) {
            case "all":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '
                    <div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                    <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                        <div class="flex items-center gap-2">
                                            <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                            <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                        </div>';

                                        switch($record['status']) {
                                            case "pay":
                                                echo '<div class="flex items-center">
                                                    <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                        <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                        <h1>Order processing</h1>
                                                    </div>
                                                    <h1 class="text-primary text-sm font-semibold">PENDING</h1>
                                                </div>';
                                                break;
                                            case "ship":
                                                echo '<div class="flex items-center">
                                                    <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                        <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                        <h1>The seller is preparing your order</h1>
                                                    </div>
                                                    <h1 class="text-primary text-sm font-semibold">PREPARING</h1>
                                                </div>';
                                                break;
                                            case "receive":
                                                echo '<div class="flex items-center">
                                                    <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                        <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                        <h1>Out for delivery</h1>
                                                    </div>
                                                    <h1 class="text-primary text-sm font-semibold">ARRIVING</h1>
                                                </div>';
                                                break;
                                            case "complete":
                                                echo '<div class="flex items-center">
                                                    <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                        <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                        <h1>Parcel has been delivered</h1>
                                                    </div>
                                                    <h1 class="text-primary text-sm font-semibold">COMPLETED</h1>
                                                </div>';
                                                break;
                                            case "cancel":
                                                echo '<div class="flex items-center">
                                                    <h1 class="text-primary text-sm font-semibold">CANCELLED</h1>
                                                </div>';
                                                break;
                                            case "return":
                                                echo '<div class="flex items-center">
                                                    <h1 class="text-primary text-sm font-semibold">RETURN REQUEST</h1>
                                                </div>';
                                                break;
                                        }

                                echo '</div>
                                    <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                        <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                        <div>
                                            <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                            <span class="text-sm">x'.$record['qty'].'</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end gap-2">
                                        <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                            Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                        </h1>
                                        <!-- <div class="flex items-center gap-2">
                                            <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-sm btn-primary w-32 h-10">Buy Again</a>
                                        </div> -->
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                break;
            case "pay":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '<div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        $i = 0;
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            if ($record['status'] == "pay") {
                                echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                            <div class="flex items-center gap-2">
                                                <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                                <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Payment processing</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">PENDING</h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                            <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                            <div>
                                                <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                                <span class="text-sm">x'.$record['qty'].'</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-2">
                                            <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                                Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                            </h1>
                                            <div class="flex items-center gap-2">
                                                <a href="/AgriLink/modules/cancel_order.php?id='.$record['id'].'" class="btn btn-sm btn-neutral border border-gray-200 w-32 h-10">Cancel order</a>
                                            </div>
                                        </div>
                                    </div>';
                                    $i++;
                            }
                        }
                        if ($i==0) {
                            echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                    break;
            case "ship":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '
                    
                    <div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        $i = 0;
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            if ($record['status'] == "ship") {
                                echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                            <div class="flex items-center gap-2">
                                                <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                                <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Payment processing</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">PENDING</h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                            <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                            <div>
                                                <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                                <span class="text-sm">x'.$record['qty'].'</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-2">
                                            <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                                Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                            </h1>
                                            <!-- <div class="flex items-center gap-2">
                                                <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-sm btn-primary w-32 h-10">Buy Again</a>
                                            </div> -->
                                        </div>
                                    </div>';
                                    $i++;
                            }
                        }
                        if ($i==0) {
                            echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                    break;
            case "receive":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '
                    
                    <div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        $i = 0;
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            if ($record['status'] == "receive") {
                                echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                            <div class="flex items-center gap-2">
                                                <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                                <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Payment processing</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">PENDING</h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                            <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                            <div>
                                                <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                                <span class="text-sm">x'.$record['qty'].'</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-2">
                                            <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                                Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                            </h1>
                                            <!-- <div class="flex items-center gap-2">
                                                <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-sm btn-primary w-32 h-10">Buy Again</a>
                                            </div> -->
                                        </div>
                                    </div>';
                                    $i++;
                            }
                        }
                        if ($i==0) {
                            echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                    break;
            case "complete":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '<div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        $i = 0;
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            if ($record['status'] == "complete") {
                                echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                            <div class="flex items-center gap-2">
                                                <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                                <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Parcel has been delivered</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">COMPLETED</h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                            <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                            <div>
                                                <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                                <span class="text-sm">x'.$record['qty'].'</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-2">
                                            <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                                Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                            </h1>
                                            <div class="flex items-center gap-2">
                                                <div class="flex items-center gap-2">
                                                    <a data-modal-target="refund-modal'.$record['id'].'" data-modal-toggle="refund-modal'.$record['id'].'" class="btn btn-sm w-32 h-10">Request Refund</a>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-sm btn-primary w-32 h-10">Buy Again</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    include './components/modals/request_refund.php';
                                    $i++;
                            }
                        }
                        if ($i==0) {
                            echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                    break;
            case "cancel":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '
                    
                    <div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        $i = 0;
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            if ($record['status'] == "cancel") {
                                echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                            <div class="flex items-center gap-2">
                                                <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                                <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                            </div>
                                            <div class="flex items-center">
                                                <h1 class="text-primary text-sm font-semibold">CANCELLED</h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                            <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                            <div>
                                                <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                                <span class="text-sm">x'.$record['qty'].'</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-2">
                                            <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                                Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                            </h1>
                                            <!-- <div class="flex items-center gap-2">
                                                <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-sm btn-primary w-32 h-10">Buy Again</a>
                                            </div> -->
                                        </div>
                                    </div>';
                                    $i++;
                            }
                        }
                        if ($i==0) {
                            echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                    break;
            case "return":
                $records = $crud->search("checkout", $user['name'], ['buyer']);

                echo '
                    
                    <div class="my-4 flex flex-col gap-4 w-full">';

                    if ($records) {
                        $i = 0;
                        foreach ($records as $record) {
                            $checkout_prod = $crud->read("product", $record['product_id']);
                            $refund = $crud->search("refund", $record["id"], ["order_id"]);
                            if ($record['status'] == "return") {
                                echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                            <div class="flex items-center gap-2">
                                                <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                                <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Request refund</h1>
                                                </div>
                                                '.($refund && $refund[0]['status'] != "" ? ($refund[0]["status"] == "declined" ? "<h1 class='text-red-700 text-sm font-semibold'>".strtoupper($refund[0]["status"])."</h1>" : "<h1 class='text-green-700 text-sm font-semibold'>".strtoupper($refund[0]["status"])."</h1>") : "<h1 class='text-primary text-sm font-semibold'>PROCESSING</h1>").'</h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                            <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                            <div>
                                                <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                                <span class="text-sm">x'.$record['qty'].'</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-2">
                                            <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                                Refund Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                            </h1>
                                        </div>
                                    </div>';
                                    $i++;
                            }
                        }
                        if ($i==0) {
                            echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>';
                        }
                    } else {
                        echo '
                            <div class="w-full h-[25em] bg-neutral flex flex-col justify-center gap-3 items-center">
                                <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                <h1 class="font-semibold text-lg">No orders yet</h1>
                            </div>
                        ';
                    }
                    echo '</div>';
                    break;
            default:
            $records = $crud->search("checkout", $user['name'], ['buyer']);

            echo '
                <div class="my-4 flex flex-col gap-4 w-full">';

                if ($records) {
                    foreach ($records as $record) {
                        $checkout_prod = $crud->read("product", $record['product_id']);
                        echo '<div class="bg-neutral w-full p-4 rounded-lg">
                                <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                                    <div class="flex items-center gap-2">
                                        <h1 class="font-bold text-xs">'.$checkout_prod['type'].'</h1>
                                        <a href="/AgriLink/product.php?id='.$checkout_prod['id'].'" class="btn btn-xs btn-neutral border border-gray-300">View Product</a>
                                    </div>';

                                    switch($record['status']) {
                                        case "pay":
                                            echo '<div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Payment processing</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">PENDING</h1>
                                            </div>';
                                            break;
                                        case "ship":
                                            echo '<div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>The seller is preparing your order</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">PREPARING</h1>
                                            </div>';
                                            break;
                                        case "receive":
                                            echo '<div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Out for delivery</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">ARRIVING</h1>
                                            </div>';
                                            break;
                                        case "complete":
                                            echo '<div class="flex items-center">
                                                <div class="flex items-center text-success font-semibold text-sm pr-2 mr-2 border-r border-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="hsl(var(--su))" height="200px" width="200px" version="1.1" id="XMLID_229_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" stroke="hsl(var(--su))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="deliver"> <g> <path d="M17.6,22c-1.8,0-3.2-1.3-3.5-3H9c-0.2,1.7-1.7,3-3.5,3S2.3,20.7,2,19H0V3h16v4h3.4l4.6,4.6V19h-3 C20.8,20.7,19.3,22,17.6,22z M16.1,18.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5S18.4,17,17.6,17 C16.8,17,16.1,17.7,16.1,18.5z M5.6,17c-0.8,0-1.5,0.7-1.5,1.5S4.8,20,5.6,20s1.5-0.7,1.5-1.5S6.4,17,5.6,17z M20.7,17H22v-4.6 L18.7,9h-2.6v6.3c0.5-0.2,1-0.3,1.5-0.3C19,15,20.2,15.8,20.7,17z M8.7,17H14V5H2v12h0.3c0.6-1.2,1.8-2,3.2-2S8.2,15.8,8.7,17z"></path> </g> </g> </g></svg>
                                                    <h1>Parcel has been delivered</h1>
                                                </div>
                                                <h1 class="text-primary text-sm font-semibold">COMPLETED</h1>
                                            </div>';
                                            break;
                                        case "cancel":
                                            echo '<div class="flex items-center">
                                                <h1 class="text-primary text-sm font-semibold">CANCELLED</h1>
                                            </div>';
                                            break;
                                        case "return":
                                            echo '<div class="flex items-center">
                                                <h1 class="text-primary text-sm font-semibold">RETURN REQUEST</h1>
                                            </div>';
                                            break;
                                    }

                            echo '</div>
                                <div class="flex items-center py-4 gap-4 border-b border-gray-200">
                                    <img src="/AgriLink/assets/products/'.$checkout_prod['image'].'" class="w-24 h-24 rounded object-cover">
                                    <div>
                                        <div class="font-semibold mb-1">'.$checkout_prod['name'].'</div>
                                        <span class="text-sm">x'.$record['qty'].'</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-2">
                                    <h1 class="my-2 font-semibold text-sm flex items-center gap-2">
                                        Order Total: <span class="text-primary text-2xl">₱'.number_format((int)$record['total']).'.00</span>
                                    </h1>
                                    <div class="flex items-center gap-2">
                                        <a href="/AgriLink/product.php?id='.$record['product_id'].'" class="btn btn-sm btn-primary w-32 h-10">Buy Again</a>
                                    </div>
                                </div>
                            </div>';
                    }
                } else {
                    echo '
                        <div class="w-full h-[25em] bg-neutral my-4 flex flex-col justify-center gap-3 items-center">
                            <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                            <h1 class="font-semibold text-lg">No orders yet</h1>
                        </div>
                    ';
                }
                echo '</div>';
        }
    ?>
</div>