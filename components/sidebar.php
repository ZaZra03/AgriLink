<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100" aria-controls="dropdown-category" data-collapse-toggle="dropdown-category">
                    <!-- <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                    </svg> -->
                    <svg class="shrink-0 w-5 h-5 text-gray-700 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="flex-1 ms-3 text-gray-900 text-left rtl:text-right whitespace-nowrap">Categories</span>
                    <svg class="w-3 h-3 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-category" class="hidden py-2 space-y-2">
                <li>
                <a href="./category.php?q=Crops" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Crops</a>
                </li>
                <li>
                <a href="./category.php?q=Fruits" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Fruit</a>
                </li>
                <li>
                <a href="./category.php?q=Meats" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Meat</a>
                </li>
                <li>
                <a href="./category.php?q=Eggs" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Egg</a>
                </li>
                <li>
                <a href="./category.php?q=Fishes" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Fish</a>
                </li>
                <li>
                <a href="./category.php?q=Seafoods" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Seafood</a>
                </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200" aria-controls="dropdown-price" data-collapse-toggle="dropdown-price">
                    <svg class="shrink-0 w-5 h-5 text-gray-700 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5.05 3C3.291 3 2.352 5.024 3.51 6.317l5.422 6.059v4.874c0 .472.227.917.613 1.2l3.069 2.25c1.01.742 2.454.036 2.454-1.2v-7.124l5.422-6.059C21.647 5.024 20.708 3 18.95 3H5.05Z"/>
                    </svg>
                    <span class="flex-1 ms-3 text-gray-900 text-left rtl:text-right whitespace-nowrap">Price Filter</span>
                    <svg class="w-3 h-3 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-price" class="hidden py-2 space-y-2">
                    <li class="p-4 bg-white border border-gray-300 rounded-lg shadow sm:p-6">
                        <form action="./price_range.php">
                            <div class="space-y-4">
                                <div>
                                    <label for="min" class="block mb-2 text-sm font-medium text-gray-900">Min</label>
                                    <input name="min" type="number" id="min" value="0" min="0" class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" 
                                    onchange="document.getElementById('max').min = parseInt(this.value) + 1; document.getElementById('max').value = parseInt(this.value) >= parseInt(document.getElementById('max').value) ? parseInt(this.value) + 1 : document.getElementById('max').value" required />
                                </div>
                                <div>
                                    <label for="max" class="block mb-2 text-sm font-medium text-gray-900">Max</label>
                                    <input name="max" type="number" id="max" value="1" class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                                <button type="submit" class="w-full px-5 py-2.5 text-sm font-medium text-blue-600 bg-white border border-blue-600 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 hover:bg-blue-600 hover:text-white">Filter</button>

                            </div>
                        </form>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100" aria-controls="dropdown-location" data-collapse-toggle="dropdown-location">
                    <svg class="shrink-0 w-5 h-5 text-gray-700 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="flex-1 ms-3 text-gray-900 text-left rtl:text-right whitespace-nowrap">Location</span>
                    <svg class="w-3 h-3 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-location" class="hidden py-2 space-y-2">
                    <li>
                        <a href="./location.php?q=Calamba" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Calamba</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Cavinti" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Cavinti</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Famy" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Famy</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Kalayaan" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Kalayaan</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Liliw" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Liliw</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Los Baños" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Los Baños</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Lumban" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Lumban</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Mabitac" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Mabitac</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Magdalena" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Magdalena</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Majayjay" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Majayjay</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Nagcarlan" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Nagcarlan</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Paete" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Paete</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Pakil" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Pakil</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Pangil" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Pangil</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Pagsanjan" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Pagsanjan</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Pila" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Pila</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Rizal" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Rizal</a>
                    </li>
                    <li>
                        <a href="./location.php?q=San Pablo" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">San Pablo</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Siniloan" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Siniloan</a>
                    </li>
                    <li>
                        <a href="./location.php?q=Sta. Cruz" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-primary">Sta. Cruz</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>