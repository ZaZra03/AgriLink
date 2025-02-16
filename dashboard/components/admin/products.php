<div class="p-4 pt-20 sm:ml-64">
    <?php include "./components/admin/breadcrumb.php" ?>

    <!-- TABLE -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="admin.php">
            <input type="hidden" name="page" value="products">
            <div class="flex w-full items-center justify-between p-4 bg-white">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 :text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-56 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-blue-500 :focus:border-blue-500" placeholder="Search for products">
                    </div>
                    <button  type="submit" class="px-3 py-2 text-xs font-medium text-center text-primary-content bg-primary rounded-lg hover:bg-primary-focus focus:outline-none focus:ring-blue-300 :bg-primary :hover:bg-primary">Search</button>
                    <a href="?page=products" type="button" class="px-3 py-2 text-xs font-medium border border-gray-300 text-center text-neutral-content bg-neutral rounded-lg hover:bg-neutral-focus focus:outline-none focus:ring-blue-300 :bg-primary :hover:bg-primary">Clear</a>
                </div>
                <div class="flex gap-2">
                    <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-blue-300 :bg-green-600 :hover:bg-green-700 ">+ Add</button>
                    <button data-modal-target="import-modal" data-modal-toggle="import-modal" type="button" class="flex items-center px-3 py-2 text-xs font-medium text-center text-gray-600 border border-gray-600 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-blue-300 :bg-green-600 :hover:bg-green-700 ">
                        <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
                        <h1>Import</h1>
                    </button>
                </div>
            </div>
        </form>
        
        <?php
            include("./components/modal/add_modal.php");
            add_modal([
                '<div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>',
                '<div>
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                    <input type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>',
                '<div>
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <input type="text" id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>',
                '<div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>',
                '<div>
                    <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                    <input type="number" id="discount" name="discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>',
                '<div>
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Stock</label>
                    <input type="number" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>',
                '<div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input name="image" id="image" required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                </div>',
                '<div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea name="description" id="description" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>',
                '
                <input type="hidden" name="table" value="product">
                <input type="hidden" name="location" value="'.http_build_query($_GET).'">
                ',
            ], "add/add_product.php");

            include("./components/modal/import_modal.php");
            import_modal();
        ?>

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
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
    
                <?php

                require_once(__DIR__ . "/../../../helpers/crud.php");
                include("./components/modal/delete_product_modal.php");
                include("./components/modal/update_modal.php");

                if (!isset($_GET['search']) || $_GET['search'] == null) {
                    $records = $crud->read_all("product");
                } else {
                    $records = $crud->search("product", $_GET['search'], ['name', 'type']);
                }

                if ($records) {
                    $i = 0;
                    foreach($records as $record) {
                        if ($user['id'] == $record['seller_id']) {
                            if ((isset($_GET['type']) && ($_GET['type'] == $record['type']))) {
                                echo '
                                <tr id="'.$record['id'].'" class="bg-white border-b :bg-gray-800 :border-gray-700 hover:bg-gray-50 :hover:bg-gray-600">
                                    <td>
                                        <img class="w-32 object-cover py-4 pl-4 aspect-square" src="/agrilink/assets/products/'.$record['image'].'" alt="'.$record['name'].'">
                                    </td>
                                    <td class="pr-6 py-4 font-semibold text-gray-900 :text-white">
                                        '.$record['name'].'
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                        '.$record['stock'].'
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                        ₱'.$record['price'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="update-modal'.$record['id'].'" data-modal-toggle="update-modal'.$record['id'].'" class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Edit_Pencil_Line_02"> <path id="Vector" d="M4 20.0001H20M4 20.0001V16.0001L14.8686 5.13146L14.8704 5.12976C15.2652 4.73488 15.463 4.53709 15.691 4.46301C15.8919 4.39775 16.1082 4.39775 16.3091 4.46301C16.5369 4.53704 16.7345 4.7346 17.1288 5.12892L18.8686 6.86872C19.2646 7.26474 19.4627 7.46284 19.5369 7.69117C19.6022 7.89201 19.6021 8.10835 19.5369 8.3092C19.4628 8.53736 19.265 8.73516 18.8695 9.13061L18.8686 9.13146L8 20.0001L4 20.0001Z" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                                        </button>
                                        <button  data-modal-target="delete-modal'.$record['id'].'" data-modal-toggle="delete-modal'.$record['id'].'" class="p-1 rounded-lg bg-red-400 hover:bg-red-500">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        </button>
                                    </td>
                                </tr>
                                ';
                                update_modal($record['id'], [
                                    '<div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                                        <input type="text" name="name" value="'.$record['name'].'" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                        <input type="text" value="'.$record['type'].'" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                        <input type="text" value="'.$record['location'].'" id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <input type="text" value="'.$record['price'].'" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                                        <input type="text" value="'.$record['discount'].'" id="discount" name="discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Stock</label>
                                        <input type="text" value="'.$record['stock'].'" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                        <input name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                                    </div>',
                                    '<div>
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea name="description" id="description" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.str_replace('<br />', " ", $record['description']).'</textarea>
                                    </div>',
                                    '
                                    <input type="hidden" name="table" value="product">
                                    <input type="hidden" name="location" value="'.http_build_query($_GET).'">
                                    ',
                                ], "update/update_product.php");
                                $i++;
                            }
    
                            if ((!isset($_GET['type']) || $_GET['type'] == null)) {
                                echo '
                                <tr id="'.$record['id'].'" class="bg-white border-b :bg-gray-800 :border-gray-700 hover:bg-gray-50 :hover:bg-gray-600">
                                    <td>
                                        <img class="w-32 object-cover py-4 pl-4 aspect-square" src="/agrilink/assets/products/'.$record['image'].'" alt="'.$record['name'].'">
                                    </td>
                                    <td class="pr-6 py-4 font-semibold text-gray-900 :text-white">
                                        '.$record['name'].'
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                        '.$record['stock'].'
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 :text-white">
                                        ₱'.$record['price'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="update-modal'.$record['id'].'" data-modal-toggle="update-modal'.$record['id'].'" class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Edit_Pencil_Line_02"> <path id="Vector" d="M4 20.0001H20M4 20.0001V16.0001L14.8686 5.13146L14.8704 5.12976C15.2652 4.73488 15.463 4.53709 15.691 4.46301C15.8919 4.39775 16.1082 4.39775 16.3091 4.46301C16.5369 4.53704 16.7345 4.7346 17.1288 5.12892L18.8686 6.86872C19.2646 7.26474 19.4627 7.46284 19.5369 7.69117C19.6022 7.89201 19.6021 8.10835 19.5369 8.3092C19.4628 8.53736 19.265 8.73516 18.8695 9.13061L18.8686 9.13146L8 20.0001L4 20.0001Z" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                                        </button>
                                        <button  data-modal-target="delete-modal'.$record['id'].'" data-modal-toggle="delete-modal'.$record['id'].'" class="p-1 rounded-lg bg-red-400 hover:bg-red-500">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        </button>
                                    </td>
                                </tr>
                                ';
                                update_modal($record['id'], [
                                    '<div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                                        <input type="text" name="name" value="'.$record['name'].'" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                        <input type="text" value="'.$record['type'].'" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                        <input type="text" value="'.$record['location'].'" id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <input type="text" value="'.$record['price'].'" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                                        <input type="text" value="'.$record['discount'].'" id="discount" name="discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Stock</label>
                                        <input type="text" value="'.$record['stock'].'" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>',
                                    '<div>
                                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                        <input name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                                    </div>',
                                    '<div>
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea name="description" id="description" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.str_replace('<br />', " ", $record['description']).'</textarea>
                                    </div>',
                                    '
                                    <input type="hidden" name="table" value="product">
                                    <input type="hidden" name="location" value="'.http_build_query($_GET).'">
                                    ',
                                ], "update/update_product.php");
                                $i++;
                            }
                            delete_product_modal("product", $record['id'], "products");
                        }
                    }
                    if ($i == 0) {
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