<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>Dokumentasi</title>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="icon" href="{{ asset('images/docslogo.png') }}" alt="tablogo">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    @vite('resources/css/app.css')

</head>

<body class="dark:bg-[#0F172A]" class="w-full h-full">
    <div id="app w-full h-full">
        <header class="w-full h-full z-10 sticky top-0">
            <div class="navbar  w-full h-16 bg-[#E8EBF2]/25 dark:bg-[#0F172A]/25 top-0">
                <div
                    class="navbarinner flex items-center justify-between w-full h-full pr-4 pl-4 md:pl-16 md:pr-16 lg:pl-24 lg:pr-24">
                    <div class="title-and-search lg:gap-6 gap-16 md:gap-6 flex  w-full h-full items-center">
                        <a href="/">
                        <div class="title flex items-center">
                            <img src="{{ asset('images/docslogolates.png') }}" alt="" class="h-12 w-12">
                            <h1
                                class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 dark:text-white bg-clip-text text-transparent">
                                Dokumentasi</h1>
                        </div>
                        </a>




                        <div id="search-button" class="relative w-full md:w-full lg:w-[30%] flex items-center ">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="kbd absolute right-2 flex items-center hidden md:hidden lg:block">
                                <p class="flex items-center gap-1 text-sm font-semibold"><span
                                        class="bg-gradient-to-r from-gray-200 to-slate-400 rounded-md text-slate-700 shadow-md py-0 px-1">CTRL</span><span
                                        class="bg-gradient-to-r from-gray-200 to-slate-400 rounded-md text-slate-700 shadow-md py-0 px-1">K</span>
                                </p>
                            </div>

                            <input type="text" id="simple-search"
                                class="bg-none border border-gray-300 hover:ring-blue-500 hover:ring-1 text-gray-900 text-sm lg:rounded-lg
                                md:rounded-lg rounded-full focus:ring-blue-500 focus:border-blue-500 block lg:w-full md:w-full w-10 h-10 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search" required disabled>
                        </div>



                    </div>

                    <div class="menu flex gap-2 invisible md:visible lg:visible">
                        <a href="{{ route('categoryall') }}"
                            class="category flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
                            <ion-icon name="grid"></ion-icon>
                            <h1 class="font-semibold">Category</h1>
                        </a>

                        <div
                            class="topic flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center">
                            <ion-icon name="layers"></ion-icon>
                            <h1 class="font-semibold"><a href="">Topic</a></h1>
                        </div>
                        <div
                            class="article flex hover:bg-gradient-to-r hover:from-sky-600 fill-sky-900 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
                            <ion-icon name="document-text"></ion-icon>
                            <h1 class="font-semibold"><a href="">Article</a></h1>
                        </div>
                        <div
                            class="about flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 dark:fill-slate-300 text-sky-900 fill-sky-900 hover:fill-slate-100 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
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
                    </div>
                    <div
                        class="menuhamburger h-12 w-12 flex items-center  justify-center absolute p-2 right-5 hover:bg-zinc-200 lg:hidden rounded-full text-slate-800 hover:text-slate-700 cursor-pointer duration-300">
                        <input id="hamburgercheckbox" type="checkbox" class="absolute h-8 w-8 opacity-0">
                        <span id="hamburgericon" class="material-symbols-outlined text-3xl focus:text-slate-600">
                            menu
                        </span>
                    </div>
                </div>
            </div>


        </header>
        <div class="mobile-dashboard-nav md:hidden lg:hidden fixed w-1/2 h-full bg-white shadow-lg z-20">
            <a href="{{ route('categoryall') }}"
                class="category flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
                <ion-icon name="grid"></ion-icon>
                <h1 class="font-semibold">Category</h1>
            </a>

            <div
                class="topic flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center">
                <ion-icon name="layers"></ion-icon>
                <h1 class="font-semibold"><a href="">Topic</a></h1>
            </div>
            <div
                class="article flex hover:bg-gradient-to-r hover:from-sky-600 fill-sky-900 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
                <ion-icon name="document-text"></ion-icon>
                <h1 class="font-semibold"><a href="">Article</a></h1>
            </div>
            <div
                class="about flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 dark:fill-slate-300 text-sky-900 fill-sky-900 hover:fill-slate-100 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
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
        </div>
        <div class="main-content w-full h-full px-4 lg:pl-16 lg:pr-16">
            <main class="h-full w-full flex">
                @if (View::hasSection('content') || View::hasSection('contents'))
                    @include('partials.sidebar')
                @endif
                @yield('content')
                @yield('contents')
                @yield('contentss')
                @include('partials.gotothetop')
                @if (View::hasSection('content'))
                    @include('partials.morepost')
                @endif
            </main>

        </div>

        <footer
            class="w-full mt-14 min-h-[24rem]  pt-[4rem] pb-[2rem] max-h-[50rem] bg-gradient-to-r from-blue-900 to-sky-900">
            <div
                class="w-full h-full relative flex flex-col lg:flex-row md:flex-col gap-4 items-center justify-start lg:justify-between">
                <div class="robot-img absolute -top-16 md:hidden hidden lg:block pointer-events-none select-none">
                    <img src="https://intek.co.id/wp-content/uploads/2021/09/intek-bot-2-copy-2-1-1.png"
                        alt="" class="h-96">
                </div>
                <div class="titleandwebsname pl-2 md:pl-2 lg:pl-72">
                    <div class="footer-title flex items-center my-0 lg:-my-24"
                        style="filter: brightness(0) invert(1);">

                        <img src="{{ asset('images/docslogolates.png') }}" alt="" class="h-12 w-12">
                        <h1
                            class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 dark:text-white bg-clip-text text-transparent">
                            Dokumentasi</h1>
                    </div>

                </div>
                <div
                    class="links md:pr-2 pr-2 lg:pr-72 text-white justify-start lg:justify-center font-bold text-xl flex flex-row flex-wrap gap-20">
                    <ul class="flex flex-col gap-2">
                        <li>Category</li>
                        <li>Topic</li>
                        <li>Article</li>
                        <li>About</li>
                    </ul>
                    <ul class="flex flex-col gap-2">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('categoryindex', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach

                    </ul>
                    <ul class="flex flex-col gap-2">
                        <li class="flex gap-2 items-center">
                            <i class="devicon-linkedin-plain"></i>
                            LinkedIn
                        </li>
                        <li class="flex gap-2 items-center">
                            <i class="devicon-facebook-plain"></i>
                            Facebook
                        </li>
                        <li class="flex gap-2 items-center">
                            <i class="devicon-github-plain"></i>
                            Github
                        </li>
                        <li class="flex gap-2 items-center">
                            <i class="devicon-twitter-plain"></i>
                            Twitter
                        </li>
                    </ul>
                </div>
                <div
                    class="robot-img absolute -top-16 -right-28 md:hidden hidden lg:block pointer-events-none select-none">
                    <img src="{{ asset('images/robotintek.png') }}" alt="" class="h-96">
                </div>
            </div>
        </footer>

    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/toggledark.js') }}"></script>
    <script src="{{ asset('js/hamburger.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/searchquery.js') }}"></script>
    <div class="loader dark:!bg-[#0F172A]">
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

    <div id="search-modal" class="search-wrappers flex justify-center w-full h-full hidden duration-400">
        <div id="search-modals"
            class="fixed top-2 duration-400 md:top-4 lg:top-28 md:w-[40rem] z-20 w-full lg:w-[40rem] h-[30rem] bg-slate-100 dark:bg-slate-700 rounded-md">
            <div class="search-modals-inner w-full h-full p-4">

                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block p-4 pl-10 w-full text-sm text-gray-900 duration-200 hover:placeholder:font-bold hover:ring-1 hover:ring-blue-500 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Docs" required="">

                    </div>
                </form>

                <div class="text-slate-500 flex w-full h-full mt-8  overflow-hidden">
                    <table class="w-full  flex flex-col overflow-hidden pb-24">
                        <tbody id="results" class="w-full  text-center  overflow-auto
                        ">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <div id="backdrop"
        class="hidden fixed top-0 z-10 backdrop w-full h-full  bg-slate-700 dark:bg-slate-500 opacity-30">
    </div>


</body>

</html>

