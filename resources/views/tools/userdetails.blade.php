@extends('Auth.dashboard')
@section('tool')
    <a href="/dashboard/usersetting">
        <div
            class="back flex items-center  mt-2 text-sky-900 border-[1.5px] dark:text-slate-40 0 border-sky-900 max-w-fit px-2 py-1 hover:text-slate-100 hover:bg-sky-900 rounded-lg">
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
                    <div class="profile-pic h-32 w-32 rounded-full overflow-hidden">
                        <img src="{{ asset('images/persondummy/bill-gates-wealthiest-person.jpg') }}" alt=""
                            class="object-cover w-full h-full">
                    </div>
                    <div class="profile-name text-2xl font-bold text-sky-900">
                        <h1>{{ $defuser->name }}</h1>
                        <p class="font-normal text-slate-500">{{ $defuser->email }}</p>
                        <select name="changerole" id="changeroleselect"
                            class="mt-2 outline-none border-none focus:outline-none focus:border-none rounded-lg">
                            @foreach ($userroles as $userrole)
                                <option value="{{ $userrole->id }}"
                                    {{ $userrole->id == $defuser->user_roles_id ? 'selected' : '' }}>
                                    {{ $userrole->name }}</option>
                            @endforeach
                        </select>
                    </div>


                </div>


            </div>


        </div>


    </div>
@endsection
