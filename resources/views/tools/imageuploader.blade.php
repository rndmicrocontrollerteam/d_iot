@extends('Auth.dashboard')
@section('tool')
    <div class="title flex gap-1 text-slate-700 dark:text-slate-200">
        <span class="material-symbols-outlined order-2">
            image
        </span>
        <p>Image Uploader</p>
    </div>
    <div class="container w-full h-full">
        <div
            class="mt-4 p-4 table-container w-full max-h-full shadow-xl bg-white dark:text-slate-200 dark:bg-slate-800 rounded-xl border-t-4 border-blue-500">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Id
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Title
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Url
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Created_at
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Size
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr class="table-rows border-b transition duration-300 ease-in-outs">
                                            <td id="image-id" class="px-6 py-4 whitespace-nowrap text-sm font-medium ">
                                                {{ $image->id }}
                                            </td>
                                            <td class="text-sm h-full text-center  cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                                title="">
                                                <div class="image-cover h-12 w-18 overflow-hidden">
                                                    <img src="http://aliwafa.id/storage/image/{{ $image->url }}"
                                                        alt="img" class="w-full h-full object-cover">

                                                </div>
                                                {{ $image->title }}
                                            </td>
                                            <td id="image-url"
                                                title="http://aliwafa.id/storage/image/{{ $image->url }}"
                                                class="text-sm  font-light flex items-center gap-2 px-6 py-4 whitespace-nowrap">
                                                <input
                                                    class="border-none outline-none focus:outline-none focus:border-none dark:bg-slate-700"
                                                    id="images-url" type="text"
                                                    value="{{ 'http://aliwafa.id/storage/image/' . $image->url }}">
                                                <span id="{{ $image->id }}"
                                                    class="material-symbols-outlined copy-button text-slate-600 dark:hover:bg-slate-500 dark:text-slate-200 cursor-pointer hover:bg-slate-200 p-2 rounded-full">
                                                    content_copy
                                                </span>
                                            </td>
                                            <td class="text-sm  font-light px-6 py-4 whitespace-nowrap">
                                                {{ $image->created_at }}
                                            </td>
                                            <td class="text-sm  font-light px-6 py-4 whitespace-nowrap">
                                                {{ $image->size }} Mb
                                            </td>
                                            <td class="text-sm  font-light px-6 py-4 whitespace-nowrap">
                                                <form action="{{ route('imagedestroy', encrypt($image->id)) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="confirmdeletebtn">
                                                        <ion-icon name="trash" class="text-slate-600 dark:text-slate-400">
                                                        </ion-icon>
                                                    </button>
                                                </form>

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
        <div
            class="upload-images mt-8 w-full h-full shadow-2xl p-6 rounded-xl bg-white dark:text-slate-200 dark:bg-slate-800 border-t-4 border-blue-500">
            <label for="">Upload Your Image Here</label>
            <div class="flex items-center justify-center w-full">
                <form class="mt-8 space-y-3 w-full h-full" action="{{ route('imageuploaderpost') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold tracking-wide">Title</label>
                        <input name="title"
                            class="text-base p-2 border dark:bg-slate-700 dark:text-white text-slate-700 border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            type="" placeholder="Example : Image For Article #71">
                    </div>
                    <div class=" w-full h-full grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold tracking-wide">Attach Document</label>
                        <div class="flex items-center justify-center w-full h-full">
                            <label id="borderdropimage"
                                class="flex flex-col rounded-lg border-4 border-dashed  w-full h-60 p-10 group text-center">
                                <div id="dropimagehere"
                                    class="h-full w-full text-center flex flex-col justify-center items-center  ">
                                    <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </svg>-->
                                    <div class="flex flex-auto max-h-48 w-2/5 justify-center mx-auto -mt-10 overflow-hidden"
                                        id="dropimagethumbnail">
                                        <img class="has-mask h-36 object-center"
                                            src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                            alt="freepik image">
                                    </div>
                                    <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files
                                        here <br /> or
                                        <span class="text-blue-600 hover:underline">select a file</span> from your computer
                                    </p>
                                </div>
                                <input type="file" class="hidden" id="input" name="images">
                            </label>
                        </div>
                    </div>
                    <p class="text-sm text-gray-300">
                        <span>File type: doc,pdf,types of images</span>
                    </p>
                    @if ($errors->has('images'))
                        <p class="text-red-500">{{ $errors->first('images') }}</p>
                    @endif
                    <div>
                        <button type="submit"
                            class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                            Upload
                        </button>
                    </div>
                </form>
            </div>




        </div>

        <div class="mb-96"></div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.all.js') }}"></script>
        <script src="{{ asset('js/confirmdeleteimg.js') }}"></script>
        <script src="{{ asset('clipboard.js-master/dist/clipboard.min.js') }}"></script>
        <script src="{{ asset('js/imageuploader.js') }}"></script>
        <script src="{{ asset('js/dropzone-min.js') }}"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    @endsection
