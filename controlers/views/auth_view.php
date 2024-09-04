<?php require("components/header_view.php"); ?>
<!-- cotact , login , register ,  -->
<div class="app">
    <header class="sticky inset-0 z-10 block h-max w-full max-w-full rounded-none border border-white/80 bg-white bg-opacity-80 py-2 px-4 text-white shadow-md backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
        <div class="flex items-center text-gray-900">
            <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base font-medium leading-relaxed text-inherit antialiased">
                <span class="flex gap-2  items-end">
                    <i class="fa-solid text-blue-600 fa-hospital h-7"></i>
                    Al-Huda Hospital
                </span>
            </a>
            <ul class="ml-auto text-black mr-8 hidden items-center gap-6 lg:flex">
                <li class="block p-1 text-sm font-normal leading-normal text-inherit antialiased">
                    <a class="flex items-center" href="#about">
                        About
                    </a>
                </li>
                <li class="block p-1 text-sm font-normal leading-normal text-inherit antialiased">
                    <a class="flex items-center" href="#doctors">
                        Doctors
                    </a>
                </li>
                <li class="block p-1 text-sm font-normal leading-normal text-inherit antialiased">
                    <a class="flex items-center" href="#testi">
                        Testimonials
                    </a>
                </li>
                <li class="block p-1 text-sm font-normal leading-normal text-inherit antialiased">
                    <a class="flex items-center" href="#contact">
                        Contact
                    </a>
                </li>
            </ul>
            <a href="tel:923001234567">

                <button class="middle none center hidden rounded-lg bg-gradient-to-tr from-red-600 to-red-400 py-2 px-4 text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block" type="button" data-ripple-light="true">
                    <span>Emergency Call</span>
                </button>
            </a>
            <button class="middle none relative ml-auto h-8 max-h-[60px] w-8 max-w-[60px] rounded-lg text-center text-xs font-medium uppercase text-blue-gray-500 flex justify-center items-center transition-all hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden" id="hamburger">
                <i id="hamicn" class="fa-solid fa-bars h-5"></i>
            </button>
        </div>
        <div id="menuVertical" class="block w-full backdrop-blur-3xl backdrop-saturate-600 rounded-lg shadow-md bg-opacity-90 absolute left-0 px-5 bg-white basis-full overflow-hidden text-blue-gray-900 transition-all duration-300 ease-in lg:hidden" data-collapse="sticky-navar">

            <ul class="mt-2 mb-2 text-black flex flex-col text-center gap-4 pb-1">
                <li class="hover:bg-gray-100 rounded-lg block p-1 text-sm font-normal leading-normal  antialiased">
                    <a class="flex justify-center items-center w-full" href="#about">
                        About
                    </a>
                </li>
                <li class="hover:bg-gray-100 rounded-lg block p-1 text-sm font-normal leading-normal  antialiased">
                    <a class="flex justify-center items-center w-full" href="#doctors">
                        Doctors
                    </a>
                </li>
                <li class="hover:bg-gray-100 rounded-lg block p-1 text-sm font-normal leading-normal  antialiased">
                    <a class="flex justify-center items-center w-full" href="#testi">
                        Testimonials
                    </a>
                </li>
                <li class="hover:bg-gray-100 rounded-lg block p-1 text-sm font-normal leading-normal text-inherit antialiased">
                    <a class="flex justify-center items-center w-full" href="#contact">
                        Contact Us
                    </a>
                </li>
                <a href="tel:923001234567">

                    <button class="mb-2 block w-full rounded-lg bg-gradient-to-tr from-red-600 to-red-400 py-2 px-4 text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">
                        <span>Emergency Call</span>
                    </button>
                </a>
            </ul>
        </div>
    </header>
    <section>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <div class="lg:w-3/5 text-center md:text-left md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                    <h1 class="title-font font-bold text-4xl md:text-5xl text-gray-900">Slow-carb next level
                        shoindcgoitch ethical authentic, poko scenester</h1>
                    <p class="leading-relaxed opacity-60 mt-4">Poke slow-carb mixtape knausgaard, typewriter street
                        art gentrify hammock starladder roathse. Craies vegan tousled etsy austin.</p>
                </div>
                <!-- Auth Form -->
                <?php include_once 'components/auth/forms.php'; ?>
            </div>
        </section>
    </section>
    <section>
        <section id="about" class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                    <img alt="feature" class="object-cover object-center h-full w-full" src="assets/107925-doctor.gif">
                </div>
                <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                    <div class="flex flex-col mb-10 lg:items-start items-center">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Shooting Stars</h2>
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar
                                toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-blue-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col mb-10 lg:items-start items-center">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3"></circle>
                                <circle cx="6" cy="18" r="3"></circle>
                                <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar
                                toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-blue-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col mb-10 lg:items-start items-center">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Neptune</h2>
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar
                                toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-blue-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section>
        <section id="doctors" class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">Best Doctors</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon
                        brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't
                        heard of them.</p>
                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
                            <div class="w-full">
                                <h2 class="title-font font-medium text-lg text-gray-900">Alper Kamu</h2>
                                <h3 class="text-gray-500 mb-3">UI Developer</h3>
                                <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                    vaporware.</p>
                                <span class="inline-flex">
                                    <a class="text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                            </path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/201x201">
                            <div class="w-full">
                                <h2 class="title-font font-medium text-lg text-gray-900">Holden Caulfield</h2>
                                <h3 class="text-gray-500 mb-3">UI Developer</h3>
                                <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                    vaporware.</p>
                                <span class="inline-flex">
                                    <a class="text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                            </path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/202x202">
                            <div class="w-full">
                                <h2 class="title-font font-medium text-lg text-gray-900">Atticus Finch</h2>
                                <h3 class="text-gray-500 mb-3">UI Developer</h3>
                                <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                    vaporware.</p>
                                <span class="inline-flex">
                                    <a class="text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                            </path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center">
                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/203x203">
                            <div class="w-full">
                                <h2 class="title-font font-medium text-lg text-gray-900">Henry Letham</h2>
                                <h3 class="text-gray-500 mb-3">UI Developer</h3>
                                <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                    vaporware.</p>
                                <span class="inline-flex">
                                    <a class="text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="ml-2 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                            </path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section>
        <section id="testi" class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                        </path>
                    </svg>
                    <p class="leading-relaxed text-lg">Edison bulb retro cloud bread echo park, helvetica stumptown
                        taiyaki taxidermy 90's cronut +1 kinfolk. Single-origin coffee ennui shaman taiyaki vape DIY
                        tote bag drinking vinegar cronut adaptogen squid fanny pack vaporware. Man bun next level
                        coloring book skateboard four loko knausgaard. Kitsch keffiyeh master cleanse direct trade
                        indigo juice before they sold out gentrify plaid gastropub normcore XOXO 90's pickled
                        cindigo jean shorts. Slow-carb next level shoindigoitch ethical authentic, yr scenester
                        sriracha forage franzen organic drinking vinegar.</p>
                    <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                    <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">Ali Abbas</h2>
                    <p class="text-gray-500">Senior Product Designer</p>
                </div>
            </div>
        </section>
    </section>
    <section>
        <section id="contact" class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                    <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108209.01444988792!2d72.5413152098641!3d32.05486486695558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39217439502694e3%3A0x55e1bad6edcbbc70!2sSargodha%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1685792731409!5m2!1sen!2s" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
                    <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                        <div class="lg:w-1/2 px-6">
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                            <p class="mt-1">Sargodha, Punjab, Pakistan, Asia, Earth, Solar System, Milky Way Galaxy
                            </p>
                        </div>
                        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                            <a class="text-blue-500 leading-relaxed">awaisoem@gmail.com</a>
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE
                            </h2>
                            <p class="leading-relaxed">+923117204906</p>
                        </div>
                    </div>
                </div>
                <?php include_once 'components/contact_form.php'; ?>
            </div>
        </section>
    </section>
    <footer class="w-full bg-white p-8">
        <hr class="my-8 border-blue-gray-50" />
        <div class="flex flex-row flex-wrap items-center justify-center gap-y-6 gap-x-12 bg-white text-center md:justify-between">
            <i class="fa-solid text-blue-600 fa-hospital h-7"></i>
            <p class="block text-center font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                © 2023 All rights reserved.
            </p>
            <ul class="flex flex-wrap items-center gap-y-2 gap-x-8">
                <li>
                    <a href="https://github.com/AwaisOem" target="_blank" class="block font-sans text-base flex gap-2 items-center font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-blue-500 focus:text-blue-500">
                        <i class="fa-brands fa-github-alt h-5"></i> Contribute
                    </a>
                </li>
            </ul>
        </div>

    </footer>
</div>
<?php require("components/footer_view.php"); ?>