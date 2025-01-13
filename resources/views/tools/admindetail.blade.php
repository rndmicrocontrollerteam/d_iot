@extends('Auth.dashboard')
@section('tool')
    <a href="/dashboard/admin">
        <div
            class="back flex items-center  mt-2 text-sky-900 border-[1.5px] dark:text-slate-400 border-sky-900 max-w-fit px-2 py-1 hover:text-slate-100 hover:bg-sky-900 rounded-lg">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <h1 class="text-xl cursor-pointer">
                Kembali
            </h1>
        </div>
    </a>
    <div class="container mt-4 h-full w-full">

        <div class="container-inner w-full h-full mt-8 flex justify-center ">
            <div class="profile w-full h-full flex justify-center">
                <div class="profile-inner flex gap-2 flex-col md:flex-row lg:flex-row ">
                    <div class="profile-pic h-32 w-32 rounded-full relative overflow-hidden">
                        @if (!$user->user_profile)
                            <img src="https://doimages.nyc3.digitaloceanspaces.com/46f22fba-7718-478b-86ae-e8b875f0473e_default-avatar.jpeg"
                                alt="" class="object-cover w-full h-full">
                        @else
                            <img src="{{ asset('storage/userprofile/' . $user->user_profile) }}" alt=""
                                class="object-cover w-full h-full">
                        @endif

                    </div>
                    <div class="profile-name text-2xl font-bold text-sky-900">
                        <h1>{{ $user->name }}</h1>
                        <p class="font-normal text-slate-500">{{ $user->email }}</p>
                        @if ($user->id != Auth::user()->id)
                            <select name="changerole" id="changeroleselect"
                                class="mt-2 outline-none border-none focus:outline-none focus:border-none rounded-lg">
                                @foreach ($userroles as $userrole)
                                    <option value="{{ $userrole->id }}"
                                        {{ $userrole->id == $user->user_roles_id ? 'selected' : '' }}>
                                        {{ $userrole->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <button id="btnChangePic"
                                class="font-semibold bg-blue-600 text-white py-1 px-2 mt-2 rounded-lg hover:ring-1 hover:ring-blue-500 text-xl">Edit
                                Profile</button>
                        @endif

                    </div>


                </div>


            </div>


        </div>


    </div>

    <div id="upload-modal" class="upload-wrappers flex justify-center w-full h-full hidden duration-400">
        <div id="upload-modals"
            class="fixed top-2 duration-400 md:top-4 lg:top-44 md:w-[40rem] z-20 w-full lg:w-[45rem] h-[30rem] shadow-lg bg-slate-100 dark:bg-slate-700 rounded-md">
            <div class="upload-modals-inner w-full h-full px-4 py-8">
                <div class="current-picture h-32 w-32 mb-4 overflow-hidden rounded-full mx-auto">
                    <img src="{{ asset('storage/userprofile/' . $user->user_profile) }}" alt="currentpic"
                        class="w-full h-full object-cover">

                </div>
                <div class="name text-center mb-8 text-3xl font-semibold text-sky-900 dark:text-slate-300">
                    <h1>{{ $user->name }}</h1>
                </div>

                <div class="current-pic w-full">
                    <form action="{{ route('adminupdatepic', $user->slug) }}" method="POST" enctype="multipart/form-data"
                        class="w-full h-full">
                        @csrf
                        <input type="text" name="updatename" id="updatename" placeholder="Update Name"
                            class="w-full mb-4 border-none shadow-md rounded-md dark:text-slate-300 dark:bg-slate-500"
                            value="{{ $user->name }}">
                        <input type="file" name="imagepicture"
                            class="shadow-lg bg-white dark:text-slate-300 dark:bg-slate-500 w-full rounded-md">
                        <div class="btn flex justify-end mt-4">
                            <button type="submit"
                                class="bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold px-4 py-2 rounded-md">Upload</button>
                        </div>
                    </form>

                </div>



            </div>
        </div>

    </div>
@endsection
