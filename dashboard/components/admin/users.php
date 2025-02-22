<div class="p-4 pt-20 sm:ml-64">

    <?php include "./components/admin/breadcrumb.php" ?>

    <!-- TABLE -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="admin.php">
            <div class="flex items-center p-4 bg-white">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 :text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="hidden" name="page" value="users">
                    <input name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-blue-500 :focus:border-blue-500" placeholder="Search for users">
                </div>
                <button type="submit" class="text-primary-content bg-primary hover:bg-primary-focus font-medium rounded-lg text-sm px-5 py-2 ml-2">Search</button>
                <a href="?page=users" class="text-neutral-content border border-gray-300 bg-neutral hover:bg-neutral-focus font-medium rounded-lg text-sm px-5 py-2 ml-2">Clear</a>
            </div>
        </form>
        <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 :bg-gray-700 :text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
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
                    include("./components/modal/delete_modal.php");
                    include("./components/modal/view_modal.php");

                    if (!isset($_GET['search']) || $_GET['search'] == null) {
                        $records = $crud->read_all("user");
                    } else {
                        $records = $crud->search("user", $_GET['search'], ['name']);
                    }

                    if ($records) {
                        $i = 0;
                        foreach($records as $record) {
                            if ($record['role'] == "user") {

                                echo '
                                    <!-- TABLE ROW -->
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap :text-white">
                                            <img class="w-10 h-10 rounded-full" src="'.($record['image'] ? $record['image'] : "/AgriLink/assets/images/default_avatar.png").'" alt="Jese image">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">'.$record['name'].'</div>
                                                <div class="font-normal text-gray-500">'.$record['email'].'</div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            '.$record['phone'].'
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                '.($record['status'] == 'online' ? '
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
                                                ' : '<div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Offline').'
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-modal-target="view-modal'.$record['id'].'" data-modal-toggle="view-modal'.$record['id'].'"  class="p-1 rounded-lg bg-blue-400 hover:bg-blue-500">
                                                <svg class="w-5 h-5" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>view_simple [#815]</title> <descurrentc>Created with SketcurrentColorh.</descurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#33363F"> <g id="icurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]"> </path> </g> </g> </g> </g></svg>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- END OF TABLE ROW -->
                                ';
                                // <button type="button" data-modal-target="delete-modal'.$record['id'].'" data-modal-toggle="delete-modal'.$record['id'].'" class="p-1 rounded-lg bg-red-400 hover:bg-red-500">
                                //     <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                // </button>
                                view_modal($record['id'], [
                                    '<div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            '.$record['name'].'
                                        </div>
                                    </div>',
                                    '<div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            '.$record['email'].'
                                        </div>
                                    </div>',
                                    '<div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            '.$record['phone'].'
                                        </div>
                                    </div>',
                                    '<div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        <div class="break-words bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            '.$record['address'].'
                                        </div>
                                    </div>'
                                ]);
                                delete_modal("user", $record['id'], "users");
                                $i++;
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