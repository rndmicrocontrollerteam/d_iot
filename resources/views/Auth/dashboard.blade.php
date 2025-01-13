<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumentasi</title>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite('resources/css/app.css')

</head>

<body class="dark:bg-[#0F172A]">
    @include('sweetalert::alert')
    <div id="app w-full h-full">
        <header class="w-full h-full sticky z-30 top-0">
            <div class="navbar w-full h-16">
                <div
                    class="navbarinner flex items-center justify-between w-full h-full pr-4 pl-4 md:pl-16 md:pr-16 lg:pl-24 lg:pr-24">
                    <div class="mobile-title flex justify-between items-center z-10">
                        <div class="title flex items-center">
                            <img src="{{ asset('images/docslogolates.png') }}" alt="" class="h-12 w-12">
                            <h1
                                class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 dark:text-white bg-clip-text text-transparent">
                                Dokumentasi</h1>
                        </div>
                        <div
                            class="menuhamburger h-12 w-12 flex items-center  justify-center absolute p-2 right-5 hover:bg-zinc-200 lg:hidden rounded-full text-slate-800 hover:text-slate-700 cursor-pointer duration-300">
                            <input id="hamburgercheckbox" type="checkbox" class="absolute h-8 w-8 opacity-0">
                            <span id="hamburgericon" class="material-symbols-outlined text-3xl focus:text-slate-600">
                                menu
                            </span>
                        </div>

                    </div>



                    <div class="menu flex gap-2 invisible md:visible lg:visible">
                        <div
                            class="category flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.6px] items-center dark:hover-slate-300">
                            <ion-icon name="grid"></ion-icon>
                            <h1 class="font-semibold"><a href="">Category</a></h1>
                        </div>
                        <div
                            class="topic flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.6px] items-center">
                            <ion-icon name="layers"></ion-icon>
                            <h1 class="font-semibold"><a href="">Topic</a></h1>
                        </div>
                        <div
                            class="article flex hover:bg-gradient-to-r hover:from-sky-600 fill-sky-900 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.6px] items-center dark:hover-slate-300">
                            <ion-icon name="document-text"></ion-icon>
                            <h1 class="font-semibold"><a href="">Article</a></h1>
                        </div>
                        <div
                            class="about flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 dark:fill-slate-300 text-sky-900 fill-sky-900 hover:fill-slate-100 hover:text-slate-100 py-[6.5px] px-2 gap-[1.6px] items-center dark:hover-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon h-6" viewBox="0 0 512 512">
                                <title>Information Circle</title>
                                <path
                                    d="M256 56C145.72 56 56 145.72 56 256s89.72 200 200 200 200-89.72 200-200S366.28 56 256 56zm0 82a26 26 0 11-26 26 26 26 0 0126-26zm48 226h-88a16 16 0 010-32h28v-88h-16a16 16 0 010-32h32a16 16 0 0116 16v104h28a16 16 0 010 32z" />
                            </svg>
                            <h1 class="font-semibold"><a href="">About</a></h1>
                        </div>
                        <div
                            class="set-light flex items-center relative rounded-lg hover:bg-zinc-200 focus:border-2 focus:border-zinc-400 duration-300">
                            <input type="checkbox" id="setthelight" class="absolute h-8 w-10 opacity-0">
                            <span id="setlight"
                                class="toggle material-symbols-outlined text-indigo-500 cursor-pointer p-2 rounded-md hover:bg-zinc-200 focus:border-2 focus:border-zinc-400 duration-300">
                                dark_mode
                            </span>
                        </div>
                        <div class="logout flex items-center">
                            <a href="{{ route('signout') }}"><span
                                    class="material-symbols-outlined flex items-center text-slate-700 dark:text-slate-300">logout</span></a>
                        </div>

                    </div>





                </div>



            </div>
    </div>



    </header>
    <div class="mobile-dashboard-nav md:hidden lg:hidden fixed w-1/2 h-[100vh] bg-white shadow-lg z-20">
        <div class="overflow-y-auto py-4 px-3 bg-[#f7f7f7] rounded dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard/statistik"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Statistik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('addcategory') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Add Category</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('addarticle') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                            </path>
                            <path
                                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Tambah Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminsetting') }} "
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Admin Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('imageuploader') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Image Uploader</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400"
                            focusable="false" data-prefix="fas" data-icon="gem" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z">
                            </path>
                        </svg>
                        <span class="ml-4">Upgrade to Pro</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3">Documentation</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                            </path>
                        </svg>
                        <span class="ml-3">Components</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3">Help</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 00-1 1v12a1  1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Back To Dashboard</span>
                    </a>
                </li>
                <li class="flex justify-center relative">
                    <img src="{{ asset('images/logointek.png') }}" alt="logointek" class="h-12 w-32 mt-4">
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content w-full h-full flex px-4 lg:pl-16 lg:pr-16">

        <aside class="w-64 mt-8 h-full md:block hidden lg:block" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-[#f7f7f7] rounded dark:bg-gray-800">
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard/statistik"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Statistik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('addcategory') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Add Category</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('addarticle') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                </path>
                                <path
                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Tambah Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminsetting') }} "
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Admin Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('imageuploader') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Image Uploader</span>
                        </a>
                    </li>
                </ul>
                <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="{{ route('usersetting') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400"
                                focusable="false" data-prefix="fas" data-icon="gem" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z">
                                </path>
                            </svg>
                            <span class="ml-4">Users Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('docs/Dokumentasi Laravel.pdf') }}" target="_blank"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-3">Documentation</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('iotindex') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                </path>
                            </svg>
                            <span class="ml-3">Iot Tools</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-3">Help</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.login') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Login as Super Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1  1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Back To Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="pl-0 lg:pl-8 w-full h-full pt-12">
            <div class="title flex justify-between">
                <h1 class="text-slate-800 font-normal text-2xl dark:text-slate-400">Dashboard</h1>
                <div
                    class="font-bold text-xl dark:text-slate-300 bg-gradient-to-r text-white from-cyan-500 to-blue-500 rounded-l-full rounded-r-full">
                    <a href="{{ route('admindetails', Auth::user()->slug) }}" class="flex items-center">
                        <div class="profile-picture w-8 h-8 overflow-hidden rounded-full">
                            @if (!Auth::user()->user_profile)
                                <img src="https://doimages.nyc3.digitaloceanspaces.com/46f22fba-7718-478b-86ae-e8b875f0473e_default-avatar.jpeg"
                                    alt="" class="object-cover w-full h-full">
                            @else
                                <img src="{{ asset('storage/userprofile/' . Auth::user()->user_profile) }}"
                                    alt="" class="object-cover w-full h-full">
                            @endif
                        </div>
                        <span class="px-2 py-[1px] rounded-md dark:text-blue-900">
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                </div>
            </div>
            <div class="tool-section w-full h-full">
                @if (View::hasSection('tool'))
                    @yield('tool')
                @else
                    <div
                        class="mt-4 p-4 table-container w-full h-full max-h-full shadow-xl bg-white dark:bg-slate-600 rounded-2xl border-t-blue-500 border-t-4">
                        <div class="flex flex-col w-full h-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-full h-full">
                                <div class="py-2 inline-block min-w-full min-h-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full h-full">

                                            <thead class="bg-white border-b dark:bg-slate-600  dark:text-slate-200">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Id
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Title
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Content
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Category
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Date
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Posted By
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium px-6 py-4 text-center align-middle">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($article as $key => $perarticle)
                                                    <tr
                                                        class="bg-white dark:bg-slate-600 border-b text-gray-900  dark:text-slate-200 transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td
                                                            class="text-center align-middle px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                            {{ $key + 1 }}.
                                                        </td>
                                                        <td class="text-sm text-center align-middle flex gap-2 items-center cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                                            title="{{ $perarticle->title }}">
                                                            @if ($perarticle->article_type_id == 2)
                                                                <ion-icon name="lock-closed-outline"></ion-icon>
                                                            @else
                                                                <ion-icon name="lock-open-outline"></ion-icon>
                                                            @endif
                                                            <img class="h-12"
                                                                src="{{ asset('storage/thumbnail/' . $perarticle->images) }}"
                                                                alt="">
                                                            {{ Str::limit($perarticle->title, 15) }}

                                                        </td>
                                                        <td
                                                            class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                            {{ Str::limit($perarticle->description, 15) }}
                                                        </td>
                                                        @if (!$perarticle->categories)
                                                            <td id="category-wrapper"
                                                                class="text-sm  items-center flex gap-1 text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                                Uncategorizhed
                                                            </td>
                                                        @else
                                                            @foreach ($perarticle->categories->take(1) as $percategory)
                                                                <td id="category-wrapper"
                                                                    class="text-sm  items-center flex gap-1 text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                                    {!! $percategory->icon !!}
                                                                    {{ $percategory->name }}
                                                                </td>
                                                            @endforeach
                                                        @endif
                                                        <td
                                                            class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $perarticle->created_at }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $perarticle->user->name }}
                                                        </td>

                                                        <td class="text-center align-middle flex gap-1">
                                                            <form
                                                                action="{{ route('articledestroy', encrypt($perarticle->id)) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" id="confirmdeletebtn"><span
                                                                        class="material-symbols-outlined text-red-600 dark:text-red-900">
                                                                        delete
                                                                    </span></button>
                                                            </form>

                                                            <a
                                                                href="{{ 'article/' . encrypt($perarticle->id) . '/edit' }}">
                                                                <span
                                                                    class="material-symbols-outlined text-yellow-600 dark:text-yellow-900 hover:opacity-80">edit</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
    </div>
    <div class="loader">
        <div class="title flex items-center justify-center absolute bottom-10">
            <img src="{{ asset('images/docslogo.png') }}" alt="" class="h-12 w-12">
            <h1
                class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                Dokumentasi</h1>
        </div>

        <span class="loader__element"></span>
        <span class="loader__element"></span>
        <span class="loader__element"></span>


    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>

    <script src="{{ asset('js/confirmdelete.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="{{ asset('js/toggledark.js') }}"></script>
    <script src="{{ asset('js/hamburger.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/changepic.js') }}"></script>
    <script src="{{ asset('js/changerole.js') }}"></script>
    <script src="{{ asset('clipboard.js-master/dist/clipboard.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content');
                }
            });
        });
    </script>
    <script src="{{ asset('js/changerole.js') }}"></script>
    <div class="mb-80"></div>
    <div id="backdrop"
        class="hidden fixed top-0 z-10 backdrop w-full h-full  bg-slate-700 dark:bg-slate-500 opacity-30">
    </div>



</body>

</html>
