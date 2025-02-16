<div class="col-span-4 p-4 bg-neutral text-neutral-content">
    <div class="w-full">
        <h1 class="text-lg font-semibold">Profile</h1>
        <p class="text-sm opacity-90">Manage account profile</p>
        <hr class="my-4">
    </div>
    <form action="/agrilink/modules/update/update_profile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">   
    <div class="w-full grid grid-cols-3 px-6">
        <div class="col-span-2">
            <div class="form-control w-full max-w-xs mb-2">
                <label class="label">
                    <span class="label-text font-semibold">Name</span>
                </label>
                <input type="text" name="name" value="<?php echo $user['name'] ?>" required class="input input-bordered input-sm w-full max-w-xs" />
            </div>
            <div class="form-control w-full max-w-xs mb-2">
                <label class="label">
                    <span class="label-text font-semibold">Email</span>
                </label>
                <input type="email" name="email" value="<?php echo $user['email'] ?>" class="input input-bordered input-sm w-full max-w-xs" />
            </div>
            <div class="form-control w-full max-w-xs mb-2">
                <label class="label">
                    <span class="label-text font-semibold">Phone Number</span>
                </label>
                <input type="phone" name="phone" value="<?php echo $user['phone'] ?>" required class="input input-bordered input-sm w-full max-w-xs" />
            </div>
            <div class="form-control w-full max-w-xs mb-2">
                <label class="label">
                    <span class="label-text font-semibold">Address</span>
                </label>
                <textarea name="address" required class="textarea textarea-bordered textarea-sm w-full max-w-xs"><?php echo $user['address'] ?></textarea>
            </div>
            <div class="form-control w-full max-w-xs mb-2">
                <label class="label">
                    <span class="label-text font-semibold">Gender</span>
                </label>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-1">
                        <input type="radio" id="male" value="male" name="gender" class="radio radio-primary" <?php echo $user['gender'] == "male" || !$user['gender'] ? "checked" : "" ?> />
                        <label for="male">Male</label>
                    </div>
                    <div class="flex items-center gap-1">
                        <input type="radio" id="female" value="female" name="gender" class="radio radio-primary" <?php echo $user['gender'] == "female" ? "checked" : "" ?> />
                        <label for="female">Female</label>
                    </div>
                    <div class="flex items-center gap-1">
                        <input type="radio" id="other" value="other" name="gender" class="radio radio-primary" <?php echo $user['gender'] == "other" ? "checked" : "" ?> />
                        <label for="other">Other</label>
                    </div>
                </div>
            </div>
            <div class="form-control w-full max-w-xs mb-4">
                <label class="label">
                    <span class="label-text font-semibold">Date of Birth</span>
                </label>
                <input type="date" name="birthdate" value="<?php echo $user['birthdate'] ?>" class="input input-bordered input-sm w-full max-w-xs" />
            </div>
            <button class="btn btn-primary">Save</button>
        </div>
        <div class="w-full aspect-square border-l-2 mt-6 flex flex-col items-center justify-center">
            <div class="bg-primary w-32 h-32 rounded-full mb-6">
                <img src="<?php echo $user['image'] ? '/agrilink/assets/users/'.$user['image'] : '/agrilink/assets/images/default_avatar.png' ?>" alt="" id="profile-image" class="w-full h-full object-cover rounded-full">
            </div>
            <div class="btn btn-neutral border-gray-400 border-1 btn-sm cursor-pointer relative">
                <label for="image" class="cursor-pointer">Select image</label>
                <input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg" class="opacity-0 w-full h-full absolute -z-10 cursor-pointer" onchange="document.getElementById('profile-image').src = window.URL.createObjectURL(this.files[0])">
            </div>
        </div>
    </div>
    </form>
</div>