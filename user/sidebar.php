<aside class="w-full h-full">
    <div class="py-4 flex gap-3 items-center text-base-content border-primary border-b">
        <div class="w-12 h-12 rounded-full bg-primary overflow-hidden">
            <img src="<?php echo $user['image'] ? '/AgriLink/assets/users/'.$user['image'] : '/AgriLink/assets/images/default_avatar.png' ?>" class="w-full h-full object-cover" alt="">
        </div>
        <div>
            <h1 class="font-semibold"><?php echo $user['name'] ?></h1>
            <a href="/AgriLink/user.php" class="opacity-80 text-sm">Edit Profile</a>
        </div>
    </div>
    <div class="py-3 flex flex-col gap-2 text-base-content">
        <div class="flex gap-2 items-center">
            <svg class="w-4 h-4" fill="hsl(var(--p))" viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"><title></title><path d="M69.3677,51.0059a30,30,0,1,0-42.7354,0A41.9971,41.9971,0,0,0,0,90a5.9966,5.9966,0,0,0,6,6H90a5.9966,5.9966,0,0,0,6-6A41.9971,41.9971,0,0,0,69.3677,51.0059ZM48,12A18,18,0,1,1,30,30,18.02,18.02,0,0,1,48,12ZM12.5977,84A30.0624,30.0624,0,0,1,42,60H54A30.0624,30.0624,0,0,1,83.4023,84Z"></path></g></svg>
            <a href="?page=account" class="">My Account</a>
        </div>
        <div class="flex gap-2 items-center">
            <svg class="w-4 h-4" fill="hsl(var(--p))" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="hsl(var(--p))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z"></path><circle cx="8.353" cy="8.353" r="1.647"></circle></g></svg>
            <a href="?page=purchase" class="">My Purchase</a>
        </div>
        <div class="flex gap-2 items-center">
            <svg class="w-4 h-4" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="hsl(var(--p))"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> </g> <g id="Layer_7" data-name="Layer 7"> <path d="M39,18H35V13A11,11,0,0,0,24,2H22A11,11,0,0,0,11,13v5H7a2,2,0,0,0-2,2V44a2,2,0,0,0,2,2H39a2,2,0,0,0,2-2V20A2,2,0,0,0,39,18ZM15,13a7,7,0,0,1,7-7h2a7,7,0,0,1,7,7v5H15ZM14,35a3,3,0,1,1,3-3A2.9,2.9,0,0,1,14,35Zm9,0a3,3,0,1,1,3-3A2.9,2.9,0,0,1,23,35Zm9,0a3,3,0,1,1,3-3A2.9,2.9,0,0,1,32,35Z"></path> </g> </g> </g></svg>
            <a href="?page=password" class="">Change Password</a>
        </div>
    </div>
</aside>