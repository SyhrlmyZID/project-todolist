<?php

// Session Index
include 'php/session_index.php';

?>

<!DOCTYPE html>
<html>

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Luxe Task</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets//favicons/luxetask.png" type="image/x-icon">

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="tailwindcss/src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="tailwindcss/src/poppins.css">
    <link rel="stylesheet" href="assets/vendor/aos/dist/aos.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/index.css">

</head>

<body class="max-w-[1920px] mx-auto text-black text-sm">
    
    <div class="bg-white">

        <!-- Navbar -->
        <header id="navbar" class="py-4 px-4 sm:px-10 bg-white z-50 fixed top-0 left-0 w-full transition-shadow">
            <div class="max-w-7xl w-full mx-auto flex items-center gap-4">
                <!-- Logo -->
                <a href="javascript:void(0)"><img src="assets/svg/luxetask.svg" alt="logo" class="w-40" /></a>

                <!-- Menu dan Button -->
                <div class="flex items-center ml-auto">
                    <!-- Menu -->
                    <ul class="hidden lg:flex space-x-6 mr-8">
                        <li><a href="#hero"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500">Beranda</a></li>
                        <li><a href="#about"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500">Tentang Kami</a>
                        </li>
                        <li><a href="#services"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500">Layanan</a></li>
                        <li><a href="#faq"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500">FAQ</a></li>
                    </ul>

                    <!-- Login Button -->
                    <button onclick="window.location.href='auth/login.php';"
                        class="bg-blue-100 hover:bg-blue-200 flex items-center transition-all font-semibold rounded-md px-5 py-3 duration-500 text-gray-800">
                        Login
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2"
                            viewBox="0 0 492.004 492.004">
                            <path
                                d="M484.14 226.886L306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z" />
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="toggleOpen" class="lg:hidden ml-4">
                        <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="collapseMenu"
                    class="hidden lg:hidden fixed top-0 left-0 w-full h-full bg-white z-50 p-4 shadow-md">
                    <button id="toggleClose" class="absolute top-2 right-4 z-[100] rounded-full bg-white p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                            <path
                                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" />
                            <path
                                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" />
                        </svg>
                    </button>
                    <ul class="space-y-6 mt-12">
                        <li><a href="#hero"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500 text-gray-800">Beranda</a>
                        </li>
                        <li><a href="#about"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500 text-gray-800">Tentang
                                Kami</a>
                        </li>
                        <li><a href="#services"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500 text-gray-800">Layanan</a>
                        </li>
                        <li><a href="#faq"
                                class="hover:text-[#4953aa] font-semibold transition-all duration-500 text-gray-800">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- End - Navbar -->

        <!-- Hero Section -->
        <div id="hero" class="lg:min-h-[560px] bg-blue-100 px-4 sm:px-10 mt-20">
            <div class="max-w-7xl w-full mx-auto py-16">
                <div class="grid lg:grid-cols-2 justify-center items-center gap-10 relative bottom-12">
                    <!-- Left Content -->
                    <div data-aos="zoom-in-right">
                        <h1 class="md:text-5xl text-4xl font-bold mb-6 md:!leading-[55px] text-gray-800"><span
                                class="text-[#5a67d8]">Luxe Task</span> Pilihan Terbaik
                            untuk Aktivitas Kerja Anda
                        </h1>
                        <p class="text-base leading-relaxed text-gray-700">Luxe Task adalah website yang bisa membantu
                            Anda
                            menyelesaikan pekerjaan dengan efisien, praktis. Fokuslah pada pekerjaan anda sampai semua
                            tugas anda selesai.</p>
                        <div class="flex flex-wrap gap-y-4 gap-x-8 mt-8">
                            <button onclick="window.location.href='auth/login.php';"
                                class='bg-[#5a67d8] hover:bg-[#4953aa] text-white flex items-center transition-all font-medium rounded-md px-5 py-4 duration-500'>Mulai
                                Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2"
                                    viewBox="0 0 492.004 492.004">
                                    <path
                                        d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                                        data-original="#000000" />
                                </svg>
                            </button>
                            <button onclick="window.location.href='#about';"
                                class='bg-transparent border-2 border-[#333] hover:bg-[#222] hover:text-white flex items-center transition-all duration-500 font-medium rounded-md px-5 py-2'>
                                Lihat selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2"
                                    viewBox="0 0 492.004 492.004">
                                    <path
                                        d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                                        data-original="#000000" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="max-lg:mt-10 h-full md:block hidden animate-bounce-infinite">
                        <img src="assets/svg/Blog post-bro.svg" alt="banner img" class="w-full h-full object-cover" />
                    </div>

                </div>
            </div>
        </div> <!-- End - Hero Section -->

        <!-- About Section -->
        <div id="about" class="px-4 sm:px-10 mt-28">
            <div class="max-w-7xl mx-auto bg-white  p-10">
                <div class="grid md:grid-cols-2 items-center gap-16">
                    <div class="w-full md:block hidden animate-bounce-infinite" data-aos="fade-up" data-aos-duration="1000">
                        <img src="assets/svg/Checklist-rafiki.svg" alt="About Luxe Task" class="w-full h-auto">
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="md:text-4xl text-3xl font-semibold mb-6 text-gray-800">
                            Tentang Kami
                        </h2>
                        <p class="leading-relaxed mb-6 text-gray-700 text-base">
                            Luxe Task adalah aplikasi To-Do List yang dirancang untuk membantu Anda mengatur aktivitas
                            harian dengan
                            efisien dan praktis. Fokuslah pada pekerjaan Anda tanpa rasa khawatir karena semua tugas
                            akan tercatat dan
                            terorganisir dengan baik.
                        </p>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-[#5a67d8] mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m-7 4h.01M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                <span class="text-gray-700">
                                    Aplikasi tugas yang mudah digunakan.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-[#5a67d8] mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m-7 4h.01M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                <span class="text-gray-700">
                                    Atur prioritas atau deadline dengan mudah.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-[#5a67d8] mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m-7 4h.01M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                <span class="text-gray-700">
                                    Statistik untuk memantau produktivitas Anda.
                                </span>
                            </li>
                        </ul>
                        <button onclick="window.location.href='#services';"
                            class='mt-8 bg-[#5a67d8] hover:bg-[#4953aa] text-white flex items-center transition-all font-medium rounded-md px-5 py-4 duration-500'>Pelajari
                            Selengkapnya
                        </button>
                    </div>
                </div>
            </div>
        </div> <!-- End - About Section -->

        <!-- Services Section -->
        <section id="services" class="mt-28 px-6 sm:px-10">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-4xl font-semibold text-gray-800">Layanan Kami</h2>
                <p class="mt-4 text-gray-700 text-base">Kami menyediakan berbagai layanan untuk membantu Anda mengatur
                    tugas
                    dengan mudah dan efisien.</p>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                    <div data-aos="flip-left" data-aos-duration="1000"
                        class="bg-white shadow-lg rounded-xl p-6 transition-all hover:shadow-2xl hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mx-auto">
                            <svg class="w-10 h-10 text-[#5a67d8]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
                                <path d="M11 10h2v6h-2zM11 7h2v2h-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium mt-4 text-gray-800">Pengingat Tugas</h3>
                        <p class="mt-2 text-gray-700 base">Atur dan kelola tugas Anda dengan mudah, lengkap dengan
                            pengingat
                            untuk memastikan tidak ada yang terlewat.</p>
                    </div>
                    <div data-aos="flip-left" data-aos-duration="1000"
                        class="bg-white shadow-lg rounded-xl p-6 transition-all hover:shadow-2xl hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mx-auto">
                            <svg class="w-10 h-10 text-[#5a67d8]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 5h14v8H5V5zm0 14v-4h14l.002 4H5z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium mt-4 text-gray-800">Statistik Tugas</h3>
                        <p class="mt-2 text-gray-700 text-base">Lihat laporan dan statistik untuk melacak kemajuan tugas
                            Anda
                            secara real-time.</p>
                    </div>
                    <div data-aos="flip-right" data-aos-duration="1000"
                        class="bg-white shadow-lg rounded-xl p-6 transition-all hover:shadow-2xl hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mx-auto">
                            <svg class="w-10 h-10 text-[#5a67d8]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" />
                                <path d="M13 8h-2v5h5v-2h-3z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium mt-4 text-gray-800">Manajemen Waktu</h3>
                        <p class="mt-2 text-gray-700 text-base">Optimalkan waktu Anda dengan fitur manajemen waktu yang
                            dirancang
                            untuk efisiensi.</p>
                    </div>
                    <div data-aos="flip-right" data-aos-duration="1000"
                        class="bg-white shadow-lg rounded-xl p-6 transition-all hover:shadow-2xl hover:-translate-y-2">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mx-auto">
                            <svg class="w-10 h-10 text-[#5a67d8]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 3h-4.184a1.994 1.994 0 0 0-3.632 0H7c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-7 0c.554 0 1 .446 1 1s-.446 1-1 1-1-.446-1-1 .446-1 1-1zm5 18H7V5h2.184a1.994 1.994 0 0 0 3.632 0H17v16z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium mt-4 text-gray-800">Keamanan Data</h3>
                        <p class="mt-2 text-gray-700 text-base">Kami memastikan data Anda aman dengan sistem keamanan
                            yang andal.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End - Services Section -->

        <div class="mt-28 px-4 sm:px-10 bg-blue-100">
            <div data-aos="fade-up"
                class="min-h-[400px] relative h-full max-w-2xl mx-auto flex flex-col justify-center items-center text-center px-6 py-16">
                <h2 class="md:text-4xl text-3xl font-semibold mb-6 text-gray-800">Lorem Ipsum</h2>
                <p class="text-base text-gray-700">Veniam proident aute magna anim excepteur et ex consectetur velit
                    ullamco veniam minim
                    aute sit. Elit occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.
                    consectetur
                    velit ullamco veniam minim aute sit.</p>
                <button
                    class="bg-black hover:bg-[#222] text-white flex items-center transition-all font-medium rounded-md px-5 py-4 mt-8 duration-500">
                    Mulai Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2"
                        viewBox="0 0 492.004 492.004">
                        <path
                            d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                            data-original="#000000"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- FAq Section -->
        <div class="mt-28 px-4 sm:px-10" id="faq">
            <div class="max-w-7xl mx-auto space-y-6">
                <div data-aos="fade-up" class="mb-10">
                    <h2 class="md:text-4xl text-3xl font-semibold mb-6 text-gray-800">Frequently Asked Questions</h2>
                    <p class="text-gray-700 text-base">Explore common questions and find answers to help you make the
                        most out of our services.</p>
                </div>
                <div class="divide-y">
                    <div data-aos="fade-up">
                        <button type="button"
                            class="w-full text-base text-left font-medium py-6 flex items-center toggle-btn">
                            <span class="mr-4 text-gray-800">Hello World 1</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition-transform transform rotate-0 ml-auto shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden overflow-hidden transition-all duration-300">
                            <p class="py-4 text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Sed auctor arcu at
                                fermentum.</p>
                        </div>
                    </div>
                    <div data-aos="fade-up">
                        <button type="button"
                            class="w-full text-base text-left font-medium py-6 flex items-center toggle-btn">
                            <span class="mr-4 text-gray-800">Hello World 2</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition-transform transform rotate-0 ml-auto shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden overflow-hidden transition-all duration-300">
                            <p class="py-4 text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Sed auctor arcu at
                                fermentum.</p>
                        </div>
                    </div>
                    <div data-aos="fade-up">
                        <button type="button"
                            class="w-full text-base text-left font-medium py-6 flex items-center toggle-btn">
                            <span class="mr-4 text-gray-800">Hello World 3</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition-transform transform rotate-0 ml-auto shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden overflow-hidden transition-all duration-300">
                            <p class="py-4 text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Sed auctor arcu at
                                fermentum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End - FAq Section -->

        <!-- Subscribe Form -->
        <div class="mt-28 px-4 sm:px-10">
            <div class="max-w-7xl mx-auto bg-[#5a67d8] py-16 px-6 relative">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="md:text-4xl text-3xl font-semibold mb-6 text-white">Subscribe Luxe Tasks</h2>
                    <div class="my-6">
                        <p class="text-white">Subscribe Luxe Task untuk mendapatkan informasi update terbaru tentang
                            website kami!</p>
                    </div>
                    <div
                        class="max-w-2xl left-0 right-0 mx-auto w-full bg-white p-5 flex items-center shadow-lg absolute -bottom-10 rounded-md">
                        <input type="email" placeholder="Masukan email anda"
                            class="w-full bg-gray-50 py-3.5 px-4 text-base focus:outline-none" />
                        <button
                            class="bg-black hover:bg-[#222] text-white flex items-center transition-all font-semibold px-5 py-4">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </div> <!-- End - Subscribe Form -->

        <!-- Footer -->
        <footer class="mt-28 bg-gray-100 py-10">
            <div class="container mx-auto px-4 sm:px-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                    <!-- Logo & Description -->
                    <div class="lg:col-span-2">
                        <a href="javascript:void(0)">
                            <img src="assets/svg/luxetask.svg" alt="logo" class="w-40 mb-6" />
                        </a>
                        <p class="text-gray-700 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida, mi eu pulvinar
                            cursus, sem elit interdum mauris.
                        </p>
                    </div>

                    <!-- Layanan Kami -->
                    <div>
                        <h4 class="text-xl font-semibold mb-6 text-gray-800">Layanan Kami</h4>
                        <ul class="space-y-4">
                            <li><a href="javascript:void(0)"
                                    class="hover:text-blue-600 flex items-center gap-2 text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-[10px] -rotate-90" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z">
                                        </path>
                                    </svg> Web Development
                                </a></li>
                            <li><a href="javascript:void(0)"
                                    class="hover:text-blue-600 flex items-center gap-2 text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-[10px] -rotate-90" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z">
                                        </path>
                                    </svg> UI/UX Design
                                </a></li>
                            <li><a href="javascript:void(0)"
                                    class="hover:text-blue-600 flex items-center gap-2 text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-[10px] -rotate-90" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z">
                                        </path>
                                    </svg> Digital Marketing
                                </a></li>
                        </ul>
                    </div>

                    <!-- Link -->
                    <div>
                        <h4 class="text-xl font-semibold mb-6 text-gray-800">Link</h4>
                        <ul class="space-y-4">
                            <li><a href="#hero"
                                    class="hover:text-blue-600 flex items-center gap-2 text-gray-700">Beranda</a></li>
                            <li><a href="#about"
                                    class="hover:text-blue-600 flex items-center gap-2 text-gray-700">Tentang Kami</a>
                            </li>
                            <li><a href="#services"
                                    class="hover:text-blue-600 flex items-center gap-2 text-gray-700">Layanan</a></li>
                            <li><a href="#faq" class="hover:text-blue-600 flex items-center gap-2 text-gray-700">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <hr class="my-6 border-gray-300" />
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <p class="text-gray-700">© 2025 <a href="#" class="hover:underline text-blue-600">Luxe Task</a> All
                        Rights Reserved.</p>
                </div>
            </div>
        </footer> <!-- End- Footer -->

        <!-- Vendor Files -->
        <script src="assets/vendor/aos/dist/aos.js"></script>

        <!-- Javascript Pages -->
        <script>
            // Mobile Menu Toogle
            var toggleOpen = document.getElementById('toggleOpen');
            var toggleClose = document.getElementById('toggleClose');
            var collapseMenu = document.getElementById('collapseMenu');

            function handleClick() {
                if (collapseMenu.style.display === 'block') {
                    collapseMenu.style.display = 'none';
                } else {
                    collapseMenu.style.display = 'block';
                }
            }

            toggleOpen.addEventListener('click', handleClick);
            toggleClose.addEventListener('click', handleClick);

            // Show Ask Question
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('svg');

                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.classList.add('rotate-180');
                    } else {
                        content.style.maxHeight = 0;
                        content.addEventListener(
                            'transitionend',
                            () => content.classList.add('hidden'),
                            { once: true }
                        );
                        icon.classList.remove('rotate-180');
                    }
                });
            });

            AOS.init({
                duration: 1000,
                once: true
            });
        </script>

</body>

</html>