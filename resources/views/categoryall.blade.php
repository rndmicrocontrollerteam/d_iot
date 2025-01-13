@extends('layouts.master')
@section('contentss')
    <div class="container w-full h-full pt-12  text-gray-700 dark:text-slate-300 md:px-8 px-2 lg:px-8">
        <div class="title text-3xl font-bold mb-4 ">
            <h1 class="flex gap-2 items-center">
                <ion-icon name="grid"></ion-icon>
                All Category
            </h1>
        </div>
        <div class="category-list w-full h-full">
            <ul class="w-full h-full">
                @foreach ($categories as $category)
                    <a href="{{ route('categoryindex', $category->slug) }}">
                        <li
                            class="w-full h-full bg-white border p-4 border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-4">
                            <div class="title-category w-full h-full flex gap-2 items-center text-xl font-semibold"
                                id="categoryimgs">
                                {!! $category->icon !!}
                                {{ $category->name }}
                            </div>


                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
