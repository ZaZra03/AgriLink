<?php
    require_once("./helpers/crud.php");
    $productCount = 0;
    if(!isset($_GET['q']) || $_GET['q'] == null) {
        header("Location: /AgriLink/index.php");
    }
    $records = $crud->search("product", $_GET['q'], ["location"]);
    $productCount = $records ? count($records) : 0;
    echo $productCount;
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
<body class="relative">
    <?php 
    
    include "./components/navbar.php";
    include "./components/sidebar.php";
    
    ?>
    <div class="relative max-w-[1080px] mx-auto pt-10 pb-10 px-5">
        <div class="sm:ml-64">
            <div class="rounded-lg dark:border-gray-700">
                <div class="w-full gap-4 <?php echo $records && count($records) <= 5 ? "min-h-[50vh]" : "" ?>">            
                    <div class="w-full flex flex-col gap-3 py-4 rounded">
                        <div class="flex items-center gap-2 mt-5">
                            <h1 class="font-semibold text-2xl"><?php echo ucwords($_GET['q']) ?></h1>
                        </div>
                        <!-- <div class="bg-base-200 flex justify-between items-center p-4 py-3">
                            <div class="flex items-center gap-2">
                                <h1 class="font-semibold">Sort by</h1>
                                <button class="btn btn-sm btn-primary">Relevance</button>
                                <button class="btn btn-sm btn-neutral">Latest</button>
                                <button class="btn btn-sm btn-neutral">Top Sales</button>
                            </div>
                            <div class="flex items-center gap-2">
                                <h1 class="font-semibold">1/17</h1>
                                <div class="flex gap-1">
                                    <button class="btn btn-disabled btn-sm">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="F-Chevron"> <polyline fill="none" id="Left" points="15.5 5 8.5 12 15.5 19" stroke="hsl(var(--nc))" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline> </g> </g> </g></svg>
                                    </button>
                                    <button class="btn btn-neutral btn-sm">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="F-Chevron"> <polyline fill="none" id="Right" points="8.5 5 15.5 12 8.5 19" stroke="hsl(var(--nc))" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline> </g> </g> </g></svg>
                                    </button>
                                </div>
                            </div>
                        </div> -->
                        <div class="w-full grid grid-cols-2 lg:grid-cols-4 md:grid-cols-5 py-4 gap-5 gap-x-10">
                            <?php
                                if ($records) {
                                    for ($i = 0; $i < 20 && $i < count($records); $i++) {
                                        echo '
                                            <div class="flex flex-col justify-center items-center w-full gap-1 bg-neutral">
                                                <div class="w-full aspect-square bg-gray-300 rounded-t-lg overflow-hidden">
                                                    <img src="/AgriLink/assets/products/'.$records[$i]['image'].'" class="w-full h-full object-cover" />
                                                </div>
                                                <h1 class="text-sm font-bold text-neutral-content break-words text-center">'.(strlen($records[$i]['name']) <= 17 ? $records[$i]['name'] : substr($records[$i]['name'], 0, 17)."...").'</h1>
                                                <div class="w-full flex justify-between font-semibold items-center px-2">
                                                    <p class="text-primary">₱'.number_format(round((int)$records[$i]['price'] - ((int)$records[$i]['price'] * ((int)$records[$i]['discount']/100)))).'.00</p>
                                                    <span class="text-neutral-content opacity-70 text-xs">'.((int)$records[$i]['current_stock'] - (int)$records[$i]['available']).' sold</span>
                                                </div>
                                                <a href="/AgriLink/product.php?id='.$records[$i]['id'].'" class="rounded-t-none btn btn-primary btn-sm col-span-2 w-full">Buy</a>
                                            </div>
                                        ';
                                    }
                                } else {
                                    echo '
                                    <div class="w-full h-[50em] col-span-5 bg-neutral my-4 flex flex-col justify-center gap-3 items-center">
                                        <svg class="w-24 h-24" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .cubies_zeventien{fill:#EC9B5A;} .cubies_achtien{fill:#EDB57E;} .cubies_zevenentwintig{fill:#98D3BC;} .cubies_achtentwintig{fill:#CCE2CD;} .cubies_drie{fill:#837F79;} .cubies_elf{fill:#E3D4C0;} .cubies_twaalf{fill:#FFF2DF;} .st0{fill:#C9483A;} .st1{fill:#D97360;} .st2{fill:#F9E0BD;} .st3{fill:#F2C99E;} .st4{fill:#65C3AB;} .st5{fill:#4C4842;} .st6{fill:#67625D;} .st7{fill:#EDEAE5;} .st8{fill:#C9C6C0;} .st9{fill:#E69D8A;} .st10{fill:#2EB39A;} .st11{fill:#BCD269;} .st12{fill:#D1DE8B;} .st13{fill:#A5A29C;} .st14{fill:#8E7866;} .st15{fill:#725A48;} .st16{fill:#F2C7B5;} .st17{fill:#A4C83F;} </style> <g> <path class="cubies_zeventien" d="M29,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v26 C32,30.657,30.657,32,29,32z"></path> <path class="cubies_achtien" d="M27,32H3c-1.657,0-3-1.343-3-3V3c0-1.657,1.343-3,3-3h24c1.657,0,3,1.343,3,3v26 C30,30.657,28.657,32,27,32z"></path> <path class="cubies_elf" d="M25,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h20c0.552,0,1,0.448,1,1v22 C26,27.552,25.552,28,25,28z"></path> <path class="cubies_twaalf" d="M24,28H5c-0.552,0-1-0.448-1-1V5c0-0.552,0.448-1,1-1h19c0.552,0,1,0.448,1,1v22 C25,27.552,24.552,28,24,28z"></path> <path class="cubies_zevenentwintig" d="M20,6H10C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h4.764c0.379,0,0.725,0.214,0.894,0.553L19,2h1c0.552,0,1,0.448,1,1v2C21,5.552,20.552,6,20,6z"></path> <path class="cubies_achtentwintig" d="M19,6h-9C9.448,6,9,5.552,9,5V3c0-0.552,0.448-1,1-1h1l0.724-1.447 C11.893,0.214,12.239,0,12.618,0h3.764c0.379,0,0.725,0.214,0.894,0.553L18,2h1c0.552,0,1,0.448,1,1v2C20,5.552,19.552,6,19,6z"></path> <path class="cubies_drie" d="M19.5,12h-10C9.224,12,9,11.776,9,11.5S9.224,11,9.5,11h10c0.276,0,0.5,0.224,0.5,0.5 S19.776,12,19.5,12z M20,13.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,13,9,13.224,9,13.5S9.224,14,9.5,14h10 C19.776,14,20,13.776,20,13.5z M20,15.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,15,9,15.224,9,15.5S9.224,16,9.5,16h10 C19.776,16,20,15.776,20,15.5z M20,17.5c0-0.276-0.224-0.5-0.5-0.5h-10C9.224,17,9,17.224,9,17.5S9.224,18,9.5,18h10 C19.776,18,20,17.776,20,17.5z M17,19.5c0-0.276-0.224-0.5-0.5-0.5h-7C9.224,19,9,19.224,9,19.5S9.224,20,9.5,20h7 C16.776,20,17,19.776,17,19.5z"></path> </g> </g></svg>
                                        <h1>Sorry, we couldn'."'".'t find any results</h1>
                                    </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
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