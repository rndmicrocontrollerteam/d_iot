@extends('Auth.dashboard')
@section('tool')
    @foreach ($categories as $category)
        <div class="container w-full h-full">
            <div class="inner flex flex-col w-full h-full">
                <div class="category-details w-full">
                    <h1 class="dark:text-white text-xl bg-gray-100 max-w-fit">Category Details</h1>
                    <div class="titlecategory mt-2 flex items-center gap-2 justify-between">
                        <div class="titles flex items-center gap-2" id="iconsearchcats">
                            {!! $category->icon !!}
                            <h1 class="text-4xl font-bold dark:text-slate-300">{{ $category->name }}</h1>
                        </div>
                        <form action="{{ route('categorydestroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">
                                <ion-icon name="trash" class="fill-red-600 h-8 w-8 hover:bg-slate-200 p-2 rounded-lg">
                                </ion-icon>
                            </button>
                        </form>


                    </div>
                </div>
                <div class="statistic w-full h-[20rem] mt-4 flex flex-col md:flex-row lg:flex-row gap-2">
                    <div
                        class="article-posted bg-white border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 rounded-lg md:w-full w-full lg:w-1/2 p-4 h-full bg-gradient-to-r flex justify-center items-center">
                        @foreach ($category->articles as $article)
                            <h1 class="text-5xl text-center text-gray-700 "><span
                                    class="text-[10rem]">{{ $article->count() }}</span><br>Article Posted</h1>
                        @endforeach

                    </div>
                    <div
                        class="user-using rounded-lg p-4 md:w-full w-full lg:w-1/2 flex items-center justify-center h-full bg-white border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h1 class="text-5xl text-center text-gray-700 "><span
                                class="text-[10rem]">{{ $article->user->count() }}</span><br>User Used</h1>

                    </div>
    @endforeach
    </div>


    </div>
    </div>
@endsection
