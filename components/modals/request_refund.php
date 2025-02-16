<?php
        echo '
        <div id="refund-modal'.$record['id'].'" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-lg max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Request Refund
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"data-modal-target="refund-modal'.$record['id'].'" data-modal-toggle="refund-modal'.$record['id'].'">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" addBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span> 
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="/agrilink/modules/add/add_refund.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="order_id" value="'.$record['id'].'" />
                        <input type="hidden" name="buyer_name" value="'.$current_user["name"].'" />
                        <div class="p-6 grid gap-3">
                            <div>
                                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                                <textarea name="reason" id="reason" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                            </div>
                            <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                <input name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-end items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</button>
                            <button type="submit" class="text-white bg-primary hover:bg-primary-focus focus:ring-4 focus:outline-none focus:ring-primary dark:focus:ring-primary font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        ';
?>