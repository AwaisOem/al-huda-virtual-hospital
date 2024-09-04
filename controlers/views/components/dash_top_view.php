<div class="min-h-screen main flex">
    <div class="navbar absolute z-50 hidden shadow-md md:flex flex-col justify-between md:static my-3  min-h-full rounded-r-lg bg-gray-100">
        <span class="flex text-lg font-bold w-full h-20 justify-center flex items-center gap-2">
            <i class="fa-solid text-blue-600 fa-hospital h-7"></i>
            <span class="mt-1">
                Al-Huda Hospital
            </span>
        </span>
        <ul>
            <li>
                <i class="fa-solid fa-house"></i>
                <a href="/d">Home</a>
            </li>
            <li>
                <i class="fa-solid fa-briefcase-medical"></i>
                <a>Pharmacy</a>
                <i class="fa-solid h-4 opacity-60 fa-angle-right"></i>
                <ul>
                    <li>
                        <i class="fa-solid fa-syringe"></i>
                        <a href="/pharmacy">Store</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-cart-shopping"></i>
                        <a href="/cart">Cart</a>
                    </li>
                </ul>
            </li>
            <li>
                <i class="fa-solid fa-user-doctor"></i>
                <a href="/doctors">Doctors</a>
            </li>
            <li>
                <i class="fa-solid fa-hospital"></i>
                <a href="/hospitals">Hospitals</a>
            </li>
            <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role'] === 'admin') : ?>
                <li><i class="fa-solid fa-lock"></i>
                    <a href="/admin">Admin</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role'] === 'doctor') : ?>
                <li>
                    <i class="fa-solid fa-message"></i>
                    <a href="/patients">Patients</a>
                </li>
            <?php endif; ?>
            <li>
                <i class="fa-solid fa-user"></i>
                <a href="/profile">Profile</a>
            </li>
        </ul>
        <div class="w-full py-3 flex-1 flex flex-col justify-end px-3">
            <a href="tel:923001234567">
                <button class=" h-14 middle w-full center rounded-lg bg-gradient-to-tr from-red-600 to-red-400 py-2 px-4 text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block" type="button" data-ripple-light="true">
                    <span>Emergency Call</span>
                </button>
            </a>
        </div>
    </div>
    <div class="main-content flex-col flex h-screen">
        <div class="w-full z-50 md:shadow-md m-3 px-2 gap-2 items-center h-16 rounded-lg bg-opacity-90 bg-gray-100 backdrop-blur-2xl backdrop-saturate-200 flex justify-between">
            <span>
                <a id="ham" class="hover:bg-gray-200 md:hidden rounded-lg px-3 pt-3 pb-2 cursor-pointer"><i id="hamicon" class="fa-solid fa-bars h-5"></i></a>
            </span>
            <span>
                <i class="fa-solid md:hidden text-blue-600 fa-hospital h-7"></i>
            </span>
            <span class="text-center">
                <!-- <a class="hover:bg-gray-200 rounded-lg px-3 pt-3 pb-2 cursor-pointer"><i
                            class="h-5 fa-solid fa-cart-shopping"></i></a> -->
                <a class="hover:bg-gray-200 rounded-lg px-3 pt-3 pb-2 cursor-pointer"><i class="h-5 fa-solid fa-bell"></i></a>
            </span>
        </div>

        <div id="main-section" class="mx-3 h-full overflow-y-auto  mb-3 rounded-lg w-full flex-1">