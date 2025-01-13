@extends('Auth.dashboard')

@section('tool')
    <div class="container mt-4 w-full max-h-full">
        <h1 class="text-l md:text-xl lg:text-xl opacity-80">Manage Articles</h1>

        <!-- Articles List Card -->
        <div
            class="form-group mt-4 overflow-hidden w-full h-full shadow-2xl p-6 rounded-xl bg-white dark:bg-slate-700 border-t-4 border-t-blue-500">
            <h2 class="text-xl font-semibold opacity-80">Articles List</h2>
            <div class="overflow-y-auto" style="max-height: 600px;"> <!-- Atur max height -->
                <table class="min-w-full">
                    <thead class="bg-white border-b dark:bg-slate-600 dark:text-slate-200">
                        <tr>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Id</th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Title</th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Content</th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Category</th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Date</th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Posted By</th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 text-center align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $key => $article)
                            <tr
                                class="bg-white dark:bg-slate-600 border-b text-gray-900 dark:text-slate-200 transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="text-center align-middle px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{ $key + 1 }}</td>
                                <td class="text-sm text-center align-middle flex gap-2 items-center cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                    title="{{ $article->title }}">
                                    <img class="h-12" src="{{ asset('storage/thumbnail/' . $article->images) }}"
                                        alt="">
                                    {{ Str::limit($article->title, 15) }}
                                </td>
                                <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                    {{ Str::limit($article->description, 15) }}</td>
                                <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                    @if (!$article->categories)
                                        Uncategorizhed
                                    @else
                                        {{ $article->categories->first()->name }}
                                    @endif
                                </td>
                                <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                    {{ $article->created_at }}</td>
                                <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                    {{ $article->user->name }}</td>
                                <td class="text-center align-middle flex gap-1">
                                    <form action="{{ route('articledestroy', encrypt($article->id)) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" id="confirmdeletebtn">
                                            <span
                                                class="material-symbols-outlined text-red-600 dark:text-slate-900">delete</span>
                                        </button>
                                    </form>
                                    <a href="{{ 'article/' . encrypt($article->id) . '/edit' }}">
                                        <span
                                            class="material-symbols-outlined text-yellow-600 dark:text-slate-900 hover:opacity-80">edit</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add New Article Card -->
        <div
            class="form-group mt-4 w-full h-full shadow-2xl p-6 rounded-xl bg-white dark:bg-slate-700 border-t-4 border-t-blue-500">
            <h2 class="text-xl font-semibold opacity-80">Add New Article</h2>
            <form action="{{ route('addarticlepost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-title w-full h-full relative flex items-center">
                    <span class="material-symbols-outlined absolute z-10 pl-2 text-slate-400">subtitles</span>
                    <input type="text" name="title"
                        class="w-full h-12 border-[1.2px] border-zinc-300 dark:bg-slate-800 dark:border-slate-600 dark:text-white rounded-lg pl-8 focus:shadow-md focus:outline-none focus:border-sky-600"
                        placeholder="Masukan Title Article">
                </div>

                <div class="category-input-wrapper">
                    <div class="category-input w-full h-full flex items-center">
                        <div class="category-everies relative mt-4 w-full" id="inputcategory">
                            <select
                                class="block appearance-none w-full bg-gray-100 border dark:bg-slate-800 dark:text-white border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" name="category[]">
                                <option>Select Category</option>
                                @foreach ($category as $percategory)
                                    <option value="{{ $percategory->id }}">{{ $percategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="addnewcategories" title="Add More Category"
                            class="add-newcategory h-full rounded-lg bg-slate-200 flex items-center cursor-pointer mt-4 ml-1">
                            <span
                                class="material-symbols-outlined text-3xl flex items-center cursor-pointer text-gray-700">add</span>
                        </div>
                    </div>
                </div>

                <div class="posttype-input-wrapper">
                    <div class="posttype-input w-full h-full flex items-center">
                        <div class="postype-every relative mt-4 w-full" id="inputcategory">
                            <select
                                class="block appearance-none w-full bg-gray-100 dark:bg-slate-800 dark:text-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" name="typepost">
                                @foreach ($articletype as $perarticletype)
                                    <option value="{{ $perarticletype->id }}">{{ $perarticletype->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="upload-images-thumbnail mt-4 mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload
                        file</label>
                    <input name="image"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        800x400px).</p>
                </div>

                <div class="inputtext-content mt-4">
                    <textarea class="form-control" id="editor" name="editor"></textarea>
                    <button type="submit"
                        class="p-2 bg-blue-600 mt-4 rounded-md text-white hover:opacity-80">Create</button>
                </div>
            </form>

            @foreach ($errors->all() as $error)
                <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">Warning! </span>{{ $error }}
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/morecategory.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <div class="mb-80"></div>
@endsection
