<div class="col-span-4 p-4 bg-neutral text-neutral-content mb-28">
    <?php
        if(isset($_GET['status']) && $_GET['status'] == "error") {
            echo '
            <div id="error" class="alert alert-error fixed top-5 left-[50%] w-[30%] translate-x-[-50%]">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Incorrect password.</span>
            </div>
            <style>
                #error {
                    opacity: 0;
                    transition: all;
                    animation-name: error;
                    animation-duration: 4s;
                }
        
                @keyframes error {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        } else if (isset($_GET['status']) && $_GET['status'] == "success") {
            echo '
            <div id="success" class="alert alert-success fixed top-5 left-[50%] w-[30%] translate-x-[-50%]">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Password changed.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        }
    ?>
    <div class="w-full">
        <h1 class="text-lg font-semibold">Profile</h1>
        <p class="text-sm opacity-90">Manage account profile</p>
        <hr class="my-4">
    </div>
    <form action="/AgriLink/modules/update/update_password.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
        <div class="w-full grid px-6">
            <div class="">
                <div class="form-control w-full max-w-xs mb-2">
                    <label class="label">
                        <span class="label-text font-semibold">Old password</span>
                    </label>
                    <input type="password" required name="old" class="input input-bordered input-sm w-full max-w-xs" />
                </div>
                <div class="form-control w-full max-w-xs mb-4">
                    <label class="label">
                        <span class="label-text font-semibold">New password</span>
                    </label>
                    <input type="password" required name="new" class="input input-bordered input-sm w-full max-w-xs" />
                </div>
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>