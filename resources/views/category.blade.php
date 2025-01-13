@extends('layouts.master')
@section('contentss')
    <div class="container pt-8 w-full md:px-[30px] px-[1px] lg:px-[45px]  h-full  text-[#031b4e] dark:text-slate-300">
        @foreach ($categories as $category)
            </h1>
            <h1 class="text-4xl font-extrabold flex items-center gap-2" id="categoryimgs">
                {!! $category->icon !!}{{ $category->name }}
            </h1>
            <div class="postlist mt-8 w-full h-full">
                <div class="postlist-inner w-full h-full md:px-8 px-2 lg:px-8">
                    <ul>
                        @if (!Auth::user() || Auth::user()->user_roles_id == 2)
                            @foreach ($category->articles as $article)
                                @if ($article->article_type_id != 2)
                                    <a href="{{ route('show', $article->slug) }}">
                                        <li
                                            class="w-full h-full shadow-md mb-4 dark:border-[2px] rounded-md dark:border-slate-700">
                                            <div class="inner w-full h-full p-4">
                                                <div class="author w-full">
                                                    <div class="author-inner flex gap-2">
                                                        <div class="img-profile h-6 w-6 rounded-full overflow-hidden">
                                                            <img src="{{ asset('storage/userprofile/' . $article->user->user_profile) }}"
                                                                alt="profilepic" class="w-full h-full object-cover">
                                                        </div>
                                                        {{ $article->user->name }}
                                                    </div>
                                                </div>
                                                <div class="title">
                                                    <h1 class="font-bold text-2xl">{{ $article->title }}</h1>
                                                </div>
                                                <div class="description">
                                                    <p>{!! $article->short_description !!}</p>
                                                </div>

                                            </div>
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @elseif(Auth::user()->user_roles_id == 1 || Auth::user()->user_roles_id == 3)
                            @foreach ($category->articles as $article)
                                <a href="{{ route('show', $article->slug) }}">
                                    <li
                                        class="w-full h-full shadow-md mb-4 dark:border-[2px] rounded-md dark:border-slate-700">
                                        <div class="inner w-full h-full p-4">
                                            <div class="author w-full">
                                                <div class="author-inner flex gap-2">
                                                    <div class="img-profile h-6 w-6 rounded-full overflow-hidden">
                                                        <img src="{{ asset('storage/userprofile/' . $article->user->user_profile) }}"
                                                            alt="profilepic" class="w-full h-full object-cover">
                                                    </div>
                                                    {{ $article->user->name }}
                                                </div>
                                            </div>
                                            <div class="title">
                                                <h1 class="font-bold text-2xl">{{ $article->title }}</h1>
                                            </div>
                                            <div class="description">
                                                <p>{!! $article->short_description !!}</p>
                                            </div>

                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        @endif
                    </ul>
                </div>

            </div>
    </div>
    @endforeach
    <div class="mb-96"></div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
@endsection
