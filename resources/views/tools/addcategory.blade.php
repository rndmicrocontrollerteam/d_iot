@extends('Auth.dashboard')
@section('tool')
    <div class="container w-full h-full mt-4">
        <div
            class="mt-4 p-4 table-container w-full min-h-full shadow-xl bg-white text-slate-600 dark:text-slate-300 dark:bg-slate-800 rounded-xl border-t-blue-500 border-t-4">
            <div class="flex flex-col h-full w-full">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full min-h-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden w-full h-full">
                            <table class="min-w-full min-h-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-center align-middle text-sm font-medium  px-6 py-4">
                                            Id
                                        </th>
                                        <th scope="col" class="text-center align-middle text-sm font-medium  px-6 py-4">
                                            Name
                                        </th>
                                        <th scope="col" class="align-middle text-sm font-medium  px-6 py-4 text-center">
                                            Icon Url
                                        </th>
                                        <th scope="col" class="align-middle text-sm font-medium  px-6 py-4 text-center">
                                            Date Of Created
                                        </th>
                                        <th scope="col" class=" align-middle text-sm font-medium  px-6 py-4 text-center">
                                            Article's
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key=> $category)
                                        <tr class="border-b transition duration-300 ease-in-out">
                                            <td
                                                class="text-center align-middle px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                {{ $key + 1 }}
                                            </td>
                                            <td id="categeryicons"
                                                class="text-center flex items-center gap-1 align-middle text-sm cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                                title="">
                                                {!! $category->icon !!}
                                                {{ $category->name }}

                                            </td>
                                            <td
                                                class="text-center align-middle text-sm font-light px-6 py-4 whitespace-nowrap">
                                                {{ Str::limit($category->icon, 15) }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                {{ $category->created_at }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">

                                            </td>
                                            <td
                                                class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('categorydetails', $category->slug) }}">
                                                    <span
                                                        class="material-symbols-outlined text-slate-700 dark:text-slate-200 cursor-pointer hover:text-blue-400 duration-300">
                                                        settings
                                                    </span>
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

        <h1 class="text-2xl opacity-80 dark:text-slate-400 mt-4">Add New Category</h1>
        <div
            class="form-group mt-4 w-full max-h-full shadow-2xl p-6 rounded-xl bg-white dark:bg-slate-700 border-t-4 border-t-blue-500">

            <form action="{{ route('addcategorypost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-title w-full h-full relative flex items-center">
                    <span class="material-symbols-outlined absolute z-10 pl-2 text-slate-400">
                        subtitles
                    </span>
                    <input type="text" name="titlecategory"
                        class="w-full h-12 border-[1.2px] border-zinc-300 dark:bg-slate-800 dark:border-slate-600 dark:text-white rounded-lg pl-8 focus:shadow-md focus:outline-none focus:border-sky-600"
                        placeholder="Masukan Title Category">
                </div>
                <div class="url-icon w-full mt-2 h-full relative flex items-center">
                    <span class="material-symbols-outlined absolute z-10 pl-2 text-slate-400">
                        subtitles
                    </span>
                    <input type="text" name="urlicon"
                        class="w-full h-12 border-[1.2px] border-zinc-300 dark:bg-slate-800 dark:border-slate-600 dark:text-white rounded-lg pl-8 focus:shadow-md focus:outline-none focus:border-sky-600"
                        placeholder="Masukan Url Icon">
                </div>

                <div class="upload-images-thumbnail mt-4 mb-4">
                    <p class="dark:text-slate-300">Atau Upload Icon</p>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input"></label>
                    <input name="icon"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        800x400px).</p>

                </div>

                <button
                    class="bg-gradient-to-r from-blue-500 to-sky-500  w-[15%] h-full py-3 px-2 text-white font-bold rounded-md hover:shadow-md hover:scale-105 duration-500 dark:text-white dark:bg-slate-800">Submit</button>



            </form>

        </div>
    </div>
@endsection
