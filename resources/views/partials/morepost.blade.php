<aside class="w-80 mt-8 h-full md:hidden hidden lg:block sticky top-24" aria-label="Sidebar">
    <div class="container py-6 pr-4 w-full h-full">
        <div class="title font-bold text-[#031B4E] dark:text-slate-400 flex items-center text-xl mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon h-6  fill-red-500 dark:fill-blue-400"
                viewBox="0 0 512 512">
                <title>Arrow Redo</title>
                <path
                    d="M58.79 439.13A16 16 0 0148 424c0-73.1 14.68-131.56 43.65-173.77 35-51 90.21-78.46 164.35-81.87V88a16 16 0 0127.05-11.57l176 168a16 16 0 010 23.14l-176 168A16 16 0 01256 424v-79.77c-45 1.36-79 8.65-106.07 22.64-29.25 15.12-50.46 37.71-73.32 67a16 16 0 01-17.82 5.28z" />
            </svg>
            <h1>Find More Post!</h1>
        </div>
        <div class="post-list">
            <ul>
                @foreach ($articles as $perarticle)
                    @if ($article->id != $perarticle->id)
                        @if ($perarticle->article_type_id != 2)
                            <li
                                class="p-[1.5px] dark:shadow-purple-500/20 dark:shadow-lg dark:p-2 dark:rounded-lg dark:mb-4">
                                <div
                                    class="profile-all w-full flex gap-1 items-center mb-1 rounded-l-full rounded-r-2xl">
                                    <div class="profile w-6 h-6 overflow-hidden rounded-full flex items-center">
                                        @if (!$perarticle->user->user_profile)
                                            <img src="https://doimages.nyc3.digitaloceanspaces.com/46f22fba-7718-478b-86ae-e8b875f0473e_default-avatar.jpeg"
                                                alt="profile" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ asset('storage/userprofile/' . $perarticle->user->user_profile) }}"
                                                alt="profile" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <p class="font-semibold text-[#031B4E] dark:text-slate-300 text-sm flex gap-1">
                                        {{ $perarticle->user->name }}
                                        on
                                        @foreach ($perarticle->categories->take(1) as $category)
                                            <span id="iconmorepost" class="flex items-center gap-1">
                                                {!! $category->icon !!}

                                            </span>
                                        @endforeach

                                    </p>
                                </div>

                                <div class="title-post font-normal text-sky-900 dark:text-slate-400">
                                    <a href="{{ '/article/' . $perarticle->slug }}">
                                        <p>{{ $perarticle->title }}</p>
                                    </a>
                                </div>

                            </li>
                        @endif
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</aside>
<style>
    #iconmorepost>img {
        height: 25px;
    }
</style>
