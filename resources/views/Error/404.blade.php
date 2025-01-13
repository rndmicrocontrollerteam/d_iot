<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite('resources/css/app.css')
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow-y: hidden;
    }

    .images {
        user-select: none;
        pointer-events: none;
    }

    .images>img {
        height: 500px;
    }
</style>

<body>
    <div class="container flex justify-center">
        <div class="inner">
            <div class="images">
                <img src="{{ asset('images/404.jpg') }} " alt="">
            </div>
            <div class="logo flex justify-center">
                <div class="title flex justify-center items-center select-none pointer-events-none">

                    <img src="{{ asset('images/docslogo.png') }}" alt=""
                        class="h-12 w-12 select-none pointer-events-none">
                    <h1
                        class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                        Dokumentasi</h1>
                </div>
            </div>

            <div class="buttons flex justify-center">
                <a href="/">

                    <div
                        class="mt-8 flex justify-center items-center bg-gradient-to-r from-blue-500 to-sky-500 p-2 text-white rounded-2xl w-fit cursor-pointer">
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>Back To Previous Page
                    </div>
                </a>

            </div>


        </div>

    </div>


</body>

</html>
