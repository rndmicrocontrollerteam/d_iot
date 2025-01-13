 @extends('layouts.master')
 @section('contents')
     <div class="container -z-1 mt-10 flex justify-center w-full h-full lg:px-20 mb-[250px]">
         <div class="container-wrapper w-full h-full">
             <div class="container-inner w-full h-full">
                 <div class="articles-menu w-full h-full  grid-rows-none">
                     <div class="articles-inner flex gap-2 flex-wrap h-full w-full">
                         @if (!Auth::user() || Auth::user()->user_roles_id == 2)
                             @foreach ($articleall as $article)
                                 @if ($article->article_type_id != 2)
                                     <a href="{{ '/article/' . $article->slug }}">
                                         <div class="articlecard w-full h-full bg-slate-200/60 dark:bg-slate-800 dark:border-[1.2px] dark:border-slate-600 shadow-lg hover:scale-105 hover:shadow-2xl duration-300 rounded-lg p-2 md:w-[90%] lg:w-[31%] relative mb-2 overflow-hidden"
                                             id="article">
                                             <div class="picture w-full h-[10rem] rounded-2xl overflow-hidden ">
                                                 <img src="{{ asset('storage/thumbnail/' . $article->images) }}"
                                                     loading="lazy" alt=""
                                                     class="brightness-100 object-cover w-full h-full">
                                             </div>
                                             <div class="title w-full flex flex-col gap-2  h-full mt-2 px-2">
                                                 <div class="article-info flex gap-2 items-center text-[#031b4e]">

                                                     @foreach ($article->categories as $percategory)
                                                         <p id="tech-stack"
                                                             class="font-semibold flex text-sm items-center shadow-sm gap-1 bg-sky-100 dark:text-slate-400 dark:bg-slate-700 dark:border-[1.2px] dark:border-slate-600 px-2 py-[0.3px] rounded-lg">
                                                             {!! $percategory->icon !!}
                                                             {{ $percategory->name }}</p>
                                                     @endforeach
                                                 </div>
                                                 <div class="title-article mb-8">
                                                     <a href="{{ '/article/' . $article->slug }}">
                                                         <h1
                                                             class="font-bold text-lg text-[#031b4e] dark:text-slate-400 cursor-pointer hover:opacity-80">
                                                             {{ Str::limit($article->title, 20) }}
                                                         </h1>
                                                     </a>

                                                 </div>
                                                 {{-- <div class="title-description">
                                               <p class="text-[#031b4e]">{!! $article->short_description !!}</p>
                                            </div> --}}
                                                 <div class="posted-by bottom-2 absolute">
                                                     <p class="text-slate-500 font-normal">Posted by
                                                         {{ $article->user->name }}
                                                     </p>

                                                 </div>


                                             </div>

                                         </div>
                                     </a>
                                 @endif
                             @endforeach
                         @else
                             @foreach ($articleall as $article)
                                 <a href="{{ '/article/' . $article->slug }}">
                                     <div class="articlecard w-full h-full bg-slate-200/60 dark:bg-slate-800 dark:border-[1.2px] dark:border-slate-600 shadow-lg hover:scale-105 hover:shadow-2xl duration-300 rounded-lg p-2 md:w-[90%] lg:w-[31%] relative mb-2 overflow-hidden"
                                         id="article">
                                         <div class="picture w-full h-[10rem] rounded-2xl overflow-hidden ">
                                             <img src="{{ asset('storage/thumbnail/' . $article->images) }}" loading="lazy"
                                                 alt="" class="brightness-100 object-cover w-full h-full">
                                         </div>
                                         <div class="title w-full flex flex-col gap-2  h-full mt-2 px-2">
                                             <div class="article-info flex gap-2 items-center text-[#031b4e]">

                                                 @foreach ($article->categories as $percategory)
                                                     <p id="tech-stack"
                                                         class="font-semibold flex text-sm items-center shadow-sm gap-1 bg-sky-100 dark:text-slate-400 dark:bg-slate-700 dark:border-[1.2px] dark:border-slate-600 px-2 py-[0.3px] rounded-lg">
                                                         {!! $percategory->icon !!}
                                                         {{ $percategory->name }}</p>
                                                 @endforeach
                                             </div>
                                             <div class="title-article mb-8">
                                                 <a href="{{ '/article/' . $article->slug }}">
                                                     <h1
                                                         class="font-bold text-lg text-[#031b4e] dark:text-slate-400 cursor-pointer hover:opacity-80">
                                                         {{ Str::limit($article->title, 20) }}
                                                     </h1>
                                                 </a>

                                             </div>
                                             {{-- <div class="title-description">
                                    <p class="text-[#031b4e]">{!! $article->short_description !!}</p>
                                </div> --}}
                                             <div class="posted-by bottom-2 absolute">
                                                 <div class="posted-by-inner flex items-center gap-1">
                                                     <div class="profile-pic h-6 w-6 rounded-full overflow-hidden">
                                                         @if (!$article->user->user_profile)
                                                             <img src="https://doimages.nyc3.digitaloceanspaces.com/46f22fba-7718-478b-86ae-e8b875f0473e_default-avatar.jpeg"
                                                                 alt="" class="object-cover w-full h-full">
                                                         @else
                                                             <img class="object-cover w-full h-full"
                                                                 src="{{ asset('storage/userprofile/' . $article->user->user_profile) }}"
                                                                 alt="">
                                                         @endif
                                                     </div>
                                                     <p class="text-slate-500 font-normal flex items-center">


                                                         {{ $article->user->name }}
                                                     </p>
                                                 </div>


                                             </div>
                                             @if ($article->article_type_id == 2)
                                                 <ion-icon name="lock-closed"
                                                     class="text-base text-sky-900 absolute right-4 bottom-4"></ion-icon>
                                             @endif
                                         </div>

                                     </div>
                                 </a>
                             @endforeach
                         @endif
                     </div>


                 </div>


             </div>
             <div class="pagination flex justify-center mt-28">
                 {{ $articleall->links('pagination::tailwind') }}

             </div>

         </div>



         <div class="mb-[40rem]"></div>
     </div>

     <div id="particles-js" class="absolute h-full w-full -z-20 hidden lg:block md:block"></div>
     <script src="{{ asset('js/jquery.min.js') }}"></script>

     <script type="text/javascript">
         jQuery(document).ready(function($) {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-Token': $('meta[name="_token"]').attr('content');
                 }
             });
         });
     </script>

     <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js">
         config.allowedContent = true;
     </script>
     <script src="{{ asset('js/particles.js') }}"></script>
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

 @endsection
