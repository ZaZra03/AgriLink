<div class="p-4 pt-20 sm:ml-64">
    <?php include "./components/admin/breadcrumb.php" ?>

    <!-- TABLE -->
    <div class="flex justify-between">
        <div class="bg-neutral rounded-lg pt-2 px-2 mb-2">
            <div class="tabs">
                <a href="?page=checkouts&tab=all" class="tab tab-md tab-lifted <?php echo !isset($_GET['tab']) || $_GET['tab'] == "all" ? "tab-active" : "" ?>">All</a> 
                <a href="?page=checkouts&tab=pay" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "pay" ? "tab-active" : "" ?>">To Process</a> 
                <a href="?page=checkouts&tab=ship" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "ship" ? "tab-active" : "" ?>">To Ship</a> 
                <a href="?page=checkouts&tab=receive" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "receive" ? "tab-active" : "" ?>">To Receive</a>
                <a href="?page=checkouts&tab=complete" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "complete" ? "tab-active" : "" ?>">Completed</a>
                <a href="?page=checkouts&tab=cancel" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "cancel" ? "tab-active" : "" ?>">Cancelled</a>
                <a href="?page=checkouts&tab=return" class="tab tab-md tab-lifted <?php echo isset($_GET['tab']) && $_GET['tab'] == "return" ? "tab-active" : "" ?>">Return Refund</a>
            </div>
        </div>
        <div></div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex w-full items-center justify-between p-4 bg-white">
            <div class="relative flex items-center">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 :text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="hidden" name="page" value="users">
                <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-56 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-blue-500 :focus:border-blue-500" placeholder="Search">
                <button type="submit" class="text-primary-content bg-primary hover:bg-primary-focus font-medium rounded-lg text-sm px-5 py-2 ml-2">Search</button>
                <a href="?page=checkouts" class="text-neutral-content border border-gray-300 bg-neutral hover:bg-neutral-focus font-medium rounded-lg text-sm px-5 py-2 ml-2">Clear</a>
            </div>
            <div></div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 :bg-gray-700 :text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Buyer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php

                require_once(__DIR__ . "/../../../helpers/crud.php");
                include("./components/modal/view_modal.php");

                if (!isset($_GET['search']) || $_GET['search'] == null) {
                    $records = $crud->read_all("checkout");
                } else {
                    $records = $crud->search("checkout", $_GET['search'], ['product', 'buyer']);
                }
                
                if ($records) {
                    $i = 0;
                    if (isset($_GET['tab'])) {
                        switch($_GET['tab']) {
                            case "pay":
                                $records = array_filter($records, function($k, $v) {
                                    return $k["status"] == 'pay';
                                }, ARRAY_FILTER_USE_BOTH);
                                break;
                            case "ship":
                                $records = array_filter($records, function($k, $v) {
                                    return $k["status"] == 'ship';
                                }, ARRAY_FILTER_USE_BOTH);
                                break;
                            case "receive":
                                $records = array_filter($records, function($k, $v) {
                                    return $k["status"] == 'receive';
                                }, ARRAY_FILTER_USE_BOTH);
                                break;
                            case "complete":
                                $records = array_filter($records, function($k, $v) {
                                    return $k["status"] == 'complete';
                                }, ARRAY_FILTER_USE_BOTH);
                                break;
                            case "cancel":
                                $records = array_filter($records, function($k, $v) {
                                    return $k["status"] == 'cancel';
                                }, ARRAY_FILTER_USE_BOTH);
                                break;
                            case "return":
                                $records = array_filter($records, function($k, $v) {
                                    return $k["status"] == 'return';
                                }, ARRAY_FILTER_USE_BOTH);
                                break;
                        }
                    }
                    foreach($records as $record) {
                        $prod = $crud->read("product", (int)$record['product_id']);
                        $buyer = $crud->search("user", $record['buyer'], ['name'])[0];
                        $refund = $crud->search("refund", $record['id'], ["order_id"]);
                        if ($prod['seller_id'] == $user['id']) {
                            echo '
                            <tr class="bg-white border-b :bg-gray-800 :border-gray-700 hover:bg-gray-50 :hover:bg-gray-600">
                                <td class="w-32 p-4">
                                    <img src="/agrilink/assets/products/'.$crud->read("product", (int)$record['product_id'])['image'].'" alt="'.$crud->read("product", (int)$record['product_id'])['name'].'">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                    '.$prod['name'].'
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                    '.$record['buyer'].'
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                    '.$record['qty'].'
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                    ₱'.$record['total'].'
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                    '.(isset($_GET['tab']) && $_GET['tab'] == "return" ? ($refund && $refund[0]["status"] == "" ? "Pending" : ucfirst($refund[0]['status'])) : "To ".$record['status']).'
                                </td>
                                <td class="px-6 py-4">';
    
                                if (isset($_GET['tab'])) {
                                    switch($_GET['tab']) {
                                        case "pay":
                                            echo '
                                                <button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                    <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                                </button>
                                                <button type="button" data-modal-target="confirm-modal'.$record['id'].'" data-modal-toggle="confirm-modal'.$record['id'].'"  class="p-1 rounded-lg bg-green-400 hover:bg-green-500">
                                                    <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <g id="InterfacurrentColore / ChecurrentColork_Big"> <path id="VecurrentColortor" d="M4 12L8.94975 16.9497L19.5572 6.34326" stroke="currentColor" stroke-width="2" stroke-linecurrentcap="round" stroke-linejoin="round"></path> </g> </g></svg>
                                                </button>
                                            ';
                                            include "./components/modal/confirm_modal.php";
                                            break;
                                        case "ship":
                                            echo '
                                                <button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                    <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                                </button>
                                                <button type="button" data-modal-target="ship-modal'.$record['id'].'" data-modal-toggle="ship-modal'.$record['id'].'"  class="p-1 rounded-lg bg-green-400 hover:bg-green-500">
                                                    <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <path d="M13 3H12C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21H13M17 8L21 12M21 12L17 16M21 12H9" stroke="currentColor" stroke-width="2" stroke-linecurrentcap="round" stroke-linejoin="round"></path> </g></svg>
                                                </button>
                                            ';
                                            include "./components/modal/ship_modal.php";
                                            break;
                                        case "receive":
                                            case "ship":
                                                echo '
                                                    <button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                        <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                                    </button>
                                                    <button type="button" data-modal-target="receive-modal'.$record['id'].'" data-modal-toggle="receive-modal'.$record['id'].'"  class="p-1 rounded-lg bg-green-400 hover:bg-green-500">
                                                        <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <path d="M13 3H12C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21H13M17 8L21 12M21 12L17 16M21 12H9" stroke="currentColor" stroke-width="2" stroke-linecurrentcap="round" stroke-linejoin="round"></path> </g></svg>
                                                    </button>
                                                ';
                                                include "./components/modal/receive_modal.php";
                                            break;
                                        case "complete":
                                            echo '
                                                <button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                    <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                                </button>
                                            ';
                                            break;
                                        case "cancel":
                                            echo '<button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                            </button>';
                                            break;
                                        case "return":
                                            echo '
                                                <button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                    <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                                </button>
                                                '.
                                                ($refund && $refund[0]["status"] == "" ? '
                                                <button type="button" data-modal-target="pay-modal'.$record['id'].'" data-modal-toggle="pay-modal'.$record['id'].'"  class="p-1 rounded-lg bg-green-400 hover:bg-green-500">
                                                    <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <path d="M14 14H17M14 10H17M9 9.5V8.5M9 9.5H11.0001M9 9.5C7.20116 9.49996 7.00185 9.93222 7.0001 10.8325C6.99834 11.7328 7.00009 12 9.00009 12C11.0001 12 11.0001 12.2055 11.0001 13.1667C11.0001 13.889 11.0001 14.5 9.00009 14.5M9.00009 14.5L9 15.5M9.00009 14.5H7.0001M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z" stroke="currentColor" stroke-width="2" stroke-linecurrentcap="round" stroke-linejoin="round"></path> </g></svg>
                                                </button>' : "");
                                            if ($refund) {
                                                echo '<div id="pay-modal'.$record['id'].'" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-lg max-h-full">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                                    Request Refund
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"data-modal-target="pay-modal'.$record['id'].'" data-modal-toggle="pay-modal'.$record['id'].'">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" addBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                    <span class="sr-only">Close modal</span> 
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <form action="/agrilink/modules/add/add_refund.php" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="" value="" />
                                                                <div class="grid gap-3">
                                                                    <div class="p-6">
                                                                        <div class="pb-4">
                                                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                                                                            <h1>'.$refund[0]["reason"].'</h1>
                                                                        </div>
                                                                        <div class="flex gap-2 items-center justify-between"><div>
                                                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                                            <img class="w-44" src="/agrilink/assets/refund/'.$refund[0]["image"].'" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex justify-end items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <a href="/agrilink/modules/decline_refund.php?id='.$refund[0]['id'].'" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-200 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 hover:text-red-900 focus:z-10 dark:bg-red-700 dark:text-red-300 dark:border-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-600">
                                                                        Decline
                                                                    </a>
                                                                    <a href="/agrilink/modules/approve_refund.php?id='.$refund[0]['id'].'" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-400 dark:focus:ring-green font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                        Approve
                                                                    </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            break;
                                        default:
                                            echo '<button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                            </button>';
                                    }
                                }
                                echo '</td>
                            </tr>';
                            
                            view_modal($record['id'], [
                                '<div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        '.$crud->read("product", $record['product_id'])['name'].'
                                    </div>
                                </div>',
                                '<div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buyer</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        '.$record['buyer'].'
                                    </div>
                                </div>',
                                '<div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        '.$record['qty'].'
                                    </div>
                                </div>',
                                '<div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                                    <div class="break-words bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        '.$record['total'].'
                                    </div>
                                </div>',
                                '<div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <div class="break-words bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        To '.$record['status'].'
                                    </div>
                                </div>',
                                '<div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <div class="break-words bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        '.$crud->search("user", $record['buyer'], ['name'])[0]['address'].'
                                    </div>
                                </div>',
                            ]);
                            $i++;
                        }
                    }
                    if (sizeof($records) == 0 || $i == 0) {
                        echo '
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td colspan="100%" class="px-6 py-4 text-center">
                                No records found.
                            </td>
                        </tr>
                    ';
                    }
                } else {
                    echo '
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td colspan="100%" class="px-6 py-4 text-center">
                                No records found.
                            </td>
                        </tr>
                    ';
                }

                ?>
            </tbody>
        </table>
    </div>

    <!-- END OF TABLE -->

</div>