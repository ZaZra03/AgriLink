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
                        Verification ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Business Permit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once(__DIR__ . "/../../../helpers/crud.php");
                    include("./components/modal/verify_user_modal.php");
                    include("./components/modal/disapprove_user_modal.php");

                    if (!isset($_GET['search']) || $_GET['search'] == null) {
                        $records = $crud->read_all("user");
                    } else {
                        $records = $crud->search("user", $_GET['search'], ['name']);
                    }

                    function array_sort($array, $on, $order=SORT_ASC) {
                        $new_array = array();
                        $sortable_array = array();

                        if (count($array) > 0) {
                            foreach ($array as $k => $v) {
                                if (is_array($v)) {
                                    foreach ($v as $k2 => $v2) {
                                        if ($k2 == $on) {
                                            $sortable_array[$k] = $v2;
                                        }
                                    }
                                } else {
                                    $sortable_array[$k] = $v;
                                }
                            }

                            switch ($order) {
                                case SORT_ASC:
                                    asort($sortable_array);
                                break;
                                case SORT_DESC:
                                    arsort($sortable_array);
                                break;
                            }

                            foreach ($sortable_array as $k => $v) {
                                array_push($new_array, $array[$k]);
                            }
                        }

                        return $new_array;
                    }

                    $records = array_sort($records, 'is_verified', SORT_ASC);

                    if ($records) {
                        $i = 0;
                        foreach($records as $record) {
                            if ($record['role'] != "admin") {

                                echo '
                                    <!-- TABLE ROW -->
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap :text-white">
                                            <img class="w-10 h-10 rounded-full" src="'.($record['image'] ? '/AgriLink/assets/users/'.$record['image'] : "/AgriLink/assets/images/default_avatar.png").'" alt="Jese image">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">'.$record['name'].'</div>
                                                <div class="font-normal text-gray-500">'.$record['email'].'</div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            '.$record['phone'].'
                                        </td>
                                        <td class="px-6 py-4">
                                            <div>
                                                '.($record['is_verified'] ? '<div class="p-2 rounded-lg text-green-600 font-bold">Verified</div>' : '<div class="p-2 rounded-lg text-red-600 font-bold">Unverified</div>').'
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            '.(
                                                $record['id_image'] ? '<a class="text-center font-bold hover:text-blue-400" href="#" data-modal-target="id-image-modal-id-'.$record['id'].'" data-modal-toggle="id-image-modal-id-'.$record['id'].'">View</a>'
                                                : ''
                                            ).'
                                        </td>
                                        <td class="px-6 py-4">
                                            '.(
                                                $record['business_permit'] ? '<a class="text-center font-bold hover:text-blue-400" href="#" data-modal-target="id-image-modal-bp-'.$record['id'].'" data-modal-toggle="id-image-modal-bp-'.$record['id'].'">View</a>'
                                                : ''
                                            ).'
                                        </td>
                                        '.(
                                            !$record['is_verified'] ? 
                                            '<td class="px-6 py-4 flex space-x-2">
                                                <!-- Approve Button -->
                                                <button type="button" data-modal-target="verify-modal'.$record['id'].'" data-modal-toggle="verify-modal'.$record['id'].'" class="p-1 rounded-lg bg-green-400 hover:bg-green-500">
                                                    <svg class="w-5 h-5 text-green-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>

                                                <!-- Disapprove Button -->
                                                <button type="button" data-modal-target="disapprove-modal'.$record['id'].'" data-modal-toggle="disapprove-modal'.$record['id'].'" class="p-1 rounded-lg bg-red-400 hover:bg-red-500">
                                                    <svg class="w-5 h-5 text-red-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </td>' 
                                            : '<td></td>'
                                        ).'
                                    </tr>
                                <!-- END OF TABLE ROW -->';
                                
                                if(!$record['is_verified']) {
                                    verify_user_modal("user", $record['id'], "users");
                                    disapprove_user_modal("user", $record['id'], "users");
                                }                                

                                if ($record['id_image']) {
                                    echo '<div id="id-image-modal-id-'.$record['id'].'" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-lg max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Verification ID</h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-target="id-image-modal-id-'.$record['id'].'" data-modal-toggle="id-image-modal-id-'.$record['id'].'">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-6">
                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                        <img class="w-44" src="/AgriLink/assets/id/'.$record['id_image'].'" />
                                                    </div>
                                                    <div class="flex justify-end items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-target="id-image-modal-id-'.$record['id'].'" data-modal-toggle="id-image-modal-id-'.$record['id'].'" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                
                                if ($record['business_permit']) {
                                    echo '<div id="id-image-modal-bp-'.$record['id'].'" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-lg max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Business Permit</h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-target="id-image-modal-bp-'.$record['id'].'" data-modal-toggle="id-image-modal-bp-'.$record['id'].'">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-6">
                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                        <img class="w-44" src="/AgriLink/assets/business_permits/'.$record['business_permit'].'" />
                                                    </div>
                                                    <div class="flex justify-end items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-target="id-image-modal-bp-'.$record['id'].'" data-modal-toggle="id-image-modal-bp-'.$record['id'].'" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                
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