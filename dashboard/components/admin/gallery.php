<div class="p-4 pt-20 sm:ml-64">
    <?php $page = ucfirst($_GET['page']) ?>

    <?php 
    require_once(__DIR__ . "/../../../helpers/crud.php");
    include("./components/modal/delete_modal.php");
    if (!isset($_GET['album'])) {
        echo '
        <div class="mb-4 col-span-full xl:mb-2">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="?page=dashboard" class="inline-flex items-center text-gray-700 hover:text-primary-600">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2 :text-gray-500" aria-current="page">'.$page.'</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">'.$page.'</h1>
        </div>

        <div class="rounded-lg :border-neutral-content">
            <div class="grid grid-cols-2 gap-5 mb-4">
                <div class="flex flex-col items-center bg-neutral border border-gray-200 rounded-lg relative shadow hover:bg-neutral-focus :border-neutral-content :bg-gray-800 :hover:bg-neutral-content">
                    <a href="?page=gallery&album=sale" class="flex flex-col items-center w-full">
                        <img class="object-cover w-full rounded-t-lg h-56" src="'.($crud->search("gallery", "sale", ["album"]) ? $crud->search("gallery", "sale", ["album"])[0]['image'] : "/AgriLink/assets/images/default.jpg").'" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 :text-white">Sale</h5>
                            <p class="mb-3 font-normal text-neutral-content :text-gray-400">Description</p>
                        </div>
                    </a>
                </div>
                <div class="flex flex-col items-center bg-neutral border border-gray-200 rounded-lg relative shadow hover:bg-neutral-focus :border-neutral-content :bg-gray-800 :hover:bg-neutral-content">
                    <a href="?page=gallery&album=carousel" class="flex flex-col items-center w-full">
                        <img class="object-cover w-full rounded-t-lg h-56" src="'.($crud->search("gallery", "carousel", ["album"]) ? $crud->search("gallery", "carousel", ["album"])[0]['image'] : "/AgriLink/assets/images/default.jpg").'" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 :text-white">Carousel</h5>
                            <p class="mb-3 font-normal text-neutral-content :text-gray-400">Description</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        ';
    } else {
        echo '
            <div class="mb-4 col-span-full xl:mb-2">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="?page=dashboard" class="inline-flex items-center text-gray-700 hover:text-primary-600">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="?page=gallery" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 :text-gray-400 :hover:text-white">
                                '.$page.'
                            </a>
                            </div>
                        </li>                  
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 :text-gray-500" aria-current="page">'.ucfirst($_GET['album']).'</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-3xl font-semibold text-base-content py-4 text-center">'.ucfirst($_GET['album']).'</h1>
            </div>

            <div class="grid w-full gap-3">
        ';
                

                $records = $crud->search("gallery", $_GET['album'], ['album']);

                if ($records) {
                    if (isset($_GET['album']) && $_GET['album'] == "sale") {

                        foreach(array_reverse($records) as $record) {
                            echo '
                            <div class="rounded-lg bg-neutral">
                                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg relative shadow :border-gray-700 :bg-gray-800 :hover:bg-gray-700">
                                    <button data-modal-target="delete-modal'.$record['id'].'" data-modal-toggle="delete-modal'.$record['id'].'" class="absolute top-1 right-1 z-100 rounded-full bg-gray-200 p-2 flex justify-center items-center">
                                        <svg class="h-4 w-4" fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel2</title> <path d="M19.587 16.001l6.096 6.096c0.396 0.396 0.396 1.039 0 1.435l-2.151 2.151c-0.396 0.396-1.038 0.396-1.435 0l-6.097-6.096-6.097 6.096c-0.396 0.396-1.038 0.396-1.434 0l-2.152-2.151c-0.396-0.396-0.396-1.038 0-1.435l6.097-6.096-6.097-6.097c-0.396-0.396-0.396-1.039 0-1.435l2.153-2.151c0.396-0.396 1.038-0.396 1.434 0l6.096 6.097 6.097-6.097c0.396-0.396 1.038-0.396 1.435 0l2.151 2.152c0.396 0.396 0.396 1.038 0 1.435l-6.096 6.096z"></path> </g></svg>
                                    </button>
                                    <img class="h-full w-full rounded-t-lg h-96" src="'.$record['image'].'" alt="">
                                </div>
                            </div>
                            ';
                            if (count($records)<2) {
                                echo '
                                <button class="relative" type="button">
                                    <form action="/AgriLink/modules/add/add_gallery.php" method="post" enctype="multipart/form-data">
                                        <input onchange="this.form.submit()" type="file" name="image" class="w-full h-full absolute top-0 left-0 opacity-0 cursor-pointer" />
                                        <input type="hidden" name="table" value="gallery">
                                        <input type="hidden" name="album" value="'.$_GET['album'].'">
                                        <input type="hidden" name="location" value="gallery&album='.$_GET['album'].'">
                                        <div class="flex items-center justify-center h-64 rounded bg-neutral :bg-gray-800">
                                            <p class="text-2xl text-gray-400 :text-gray-500">+</p>
                                        </div>
                                    </form>
                                </button>
                                ';
                            }
                            delete_modal("gallery", $record['id'], "gallery&album=".$_GET['album']."");
                        }
                    } else {
                        $i=1;
                        foreach(array_reverse($records) as $record) {
                            echo '
                            <div class="rounded-lg bg-neutral">
                                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg relative shadow :border-gray-700 :bg-gray-800 :hover:bg-gray-700">
                                    <button data-modal-target="delete-modal'.$record['id'].'" data-modal-toggle="delete-modal'.$record['id'].'" class="absolute top-1 right-1 z-100 rounded-full bg-gray-200 p-2 flex justify-center items-center">
                                        <svg class="h-4 w-4" fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel2</title> <path d="M19.587 16.001l6.096 6.096c0.396 0.396 0.396 1.039 0 1.435l-2.151 2.151c-0.396 0.396-1.038 0.396-1.435 0l-6.097-6.096-6.097 6.096c-0.396 0.396-1.038 0.396-1.434 0l-2.152-2.151c-0.396-0.396-0.396-1.038 0-1.435l6.097-6.096-6.097-6.097c-0.396-0.396-0.396-1.039 0-1.435l2.153-2.151c0.396-0.396 1.038-0.396 1.434 0l6.096 6.097 6.097-6.097c0.396-0.396 1.038-0.396 1.435 0l2.151 2.152c0.396 0.396 0.396 1.038 0 1.435l-6.096 6.096z"></path> </g></svg>
                                    </button>
                                    <img class="h-full w-full rounded-t-lg h-96" src="'.$record['image'].'" alt="">
                                </div>
                            </div>
                            ';

                            if ($i == 1 && count($records)<2) {
                                echo '
                                <button class="relative" type="button">
                                    <form action="/AgriLink/modules/add/add_gallery.php" method="post" enctype="multipart/form-data">
                                        <input onchange="this.form.submit()" type="file" name="image" class="w-full h-full absolute top-0 left-0 opacity-0 cursor-pointer" />
                                        <input type="hidden" name="table" value="gallery">
                                        <input type="hidden" name="album" value="'.$_GET['album'].'">
                                        <input type="hidden" name="location" value="gallery&album='.$_GET['album'].'">
                                        <div class="flex items-center justify-center h-64 rounded bg-neutral :bg-gray-800">
                                            <p class="text-2xl text-gray-400 :text-gray-500">+</p>
                                        </div>
                                    </form>
                                </button>
                                ';
                            } else if (count($records)<3 && $i == 2) {
                                echo '
                                <button class="relative" type="button">
                                    <form action="/AgriLink/modules/add/add_gallery.php" method="post" enctype="multipart/form-data">
                                        <input onchange="this.form.submit()" type="file" name="image" class="w-full h-full absolute top-0 left-0 opacity-0 cursor-pointer" />
                                        <input type="hidden" name="table" value="gallery">
                                        <input type="hidden" name="album" value="'.$_GET['album'].'">
                                        <input type="hidden" name="location" value="gallery&album='.$_GET['album'].'">
                                        <div class="flex items-center justify-center h-64 rounded bg-neutral :bg-gray-800">
                                            <p class="text-2xl text-gray-400 :text-gray-500">+</p>
                                        </div>
                                    </form>
                                </button>
                                ';
                            }
                            delete_modal("gallery", $record['id'], "gallery&album=".$_GET['album']."");
                            $i++;
                        }
                    }
                } else {
                    echo '
                        <button class="relative" type="button">
                            <form action="/AgriLink/modules/add/add_gallery.php" method="post" enctype="multipart/form-data">
                                <input onchange="this.form.submit()" type="file" name="image" class="w-full h-full absolute top-0 left-0 opacity-0 cursor-pointer" />
                                <input type="hidden" name="table" value="gallery">
                                <input type="hidden" name="album" value="'.$_GET['album'].'">
                                <input type="hidden" name="location" value="gallery&album='.$_GET['album'].'">
                                <div class="flex items-center justify-center h-64 rounded bg-neutral :bg-gray-800">
                                <p class="text-2xl text-gray-400 :text-gray-500">+</p>
                                </div>
                            </form>
                        </button>
                    ';
                }
            echo '</div>';
    }
    
    
    ?>

</div>