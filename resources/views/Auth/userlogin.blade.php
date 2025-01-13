@extends('layouts.userauthmaster')
@section('content')
    <div id="app w-full h-full">
        <div class="container flex justify-center mt-16 p-4 md:p-0 lg:p-0">
            <div
                class="login-container mx-auto w-full lg:w-[400px] sm:w-[400px] md:w-[400px] h-[500px] bg-white shadow-2xl rounded-lg">
                <div class="login-inner w-full h-full p-6 flex justify-center relative">
                    <div class="login-wrapper-inner w-full h-full">
                        <div class="login-title">
                            <div class="title flex justify-center items-center">
                                <img src="{{ asset('images/docslogo.png') }}" alt="" class="h-12 w-12">
                                <h1
                                    class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                                    Dokumentasi</h1>
                            </div>
                            <div class="titlelogin text-center font-semibold text-2xl text-slate-700">
                                <h1>Login!</h1>
                            </div>
                        </div>
                        <form action="{{ route('userloginpost') }}" method="POST">
                            @csrf
                            <div class="login-form-group flex flex-col gap-6 w-full h-full mt-4">
                                <div class="login-email w-full flex items-center">
                                    <span
                                        class="material-symbols-outlined absolute text-gray-400 flex items-center z-10 ml-2">
                                        alternate_email
                                    </span>
                                    <input @if (session('users')) value = "{{ session('users')->email }}" @endif
                                        name="email" type="email"
                                        class="bg-slate-100 h-12 w-full pl-9 text-slate placeholder:text-gray-400 placeholder:font-semibold px-5 py-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-400  relative items-center flex"
                                        placeholder="Email">
                                </div>
                                <div class="login-email w-full flex items-center">
                                    <span
                                        class="material-symbols-outlined absolute text-gray-400 flex items-center z-10 ml-2">
                                        lock
                                    </span>
                                    <input name="password"
                                        @if (session('users')) value=" {{ session('users')->password }}" @endif
                                        type="password"
                                        class="bg-slate-100 h-12 w-full pl-9 placeholder:text-gray-400 placeholder:font-semibold px-5 py-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 relative items-center flex"
                                        placeholder="Password">
                                </div>
                                <div class="login-submit w-full mt-2 flex justify-center">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-sky-500 to-blue-600 p-2 w-full text-white font-bold rounded-lg hover:opacity-80 duration-400">Login</button>

                                </div>
                                <p class="text-center text-red-600" id="messages">{{ Session::get('error') }}</p>
                        </form>
                        <div class="register-option text-sm lg:text-sm font-semibold mt-8">

                            <h1 class="text-center text-slate-700">Doesn't Have Account?<span
                                    class="text-center text-blue-600 cursor-pointer"><br><a
                                        href="{{ route('registerindex') }}">Register
                                        Here</a></span></h1>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

    </div>
@endsection
