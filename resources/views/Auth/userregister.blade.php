@extends('layouts.userauthmaster')
@section('content')
    <div id="app w-full h-full">
        <div class="container flex justify-center mt-8 lg:mt-16 md:mt-16 sm:mt-16 p-4 md:p-0 lg:p-0">
            <div
                class="register-container mx-auto w-full lg:w-[400px] sm:w-[450px] md:w-[430px] h-[580px] bg-white shadow-2xl rounded-lg">
                <div class="register-inner w-full h-full p-6 flex justify-center relative">
                    <div class="register-wrapper-inner w-full h-full">
                        <div class="register-title">
                            <div class="title flex justify-center items-center">
                                <img src="{{ asset('images/docslogo.png') }}" alt="" class="h-12 w-12">
                                <h1
                                    class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                                    Dokumentasi</h1>
                            </div>
                            <div class="titlelogin text-center font-semibold text-2xl text-slate-700">
                                <h1>Register</h1>
                            </div>
                        </div>
                        <form action="{{ route('registerpost') }}" method="POST">
                            @csrf
                            <div class="register-form-group flex flex-col gap-6 w-full h-full mt-4">
                                <div class="register-name w-full flex items-center">
                                    <span
                                        class="material-symbols-outlined absolute text-gray-400 flex items-center z-10 ml-2">
                                        person
                                    </span>
                                    <input name="username" type="text"
                                        class="bg-slate-100 h-12 w-full pl-9 text-slate placeholder:text-gray-400 placeholder:font-semibold px-5 py-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-400  relative items-center flex"
                                        placeholder="Name">
                                </div>
                                <div class="register-email w-full flex items-center">
                                    <span
                                        class="material-symbols-outlined absolute text-gray-400 flex items-center z-10 ml-2">
                                        alternate_email
                                    </span>
                                    <input name="email" type="email"
                                        class="bg-slate-100 h-12 w-full pl-9 text-slate placeholder:text-gray-400 placeholder:font-semibold px-5 py-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-400  relative items-center flex"
                                        placeholder="Email">
                                </div>
                                <div class="register-password w-full flex items-center">
                                    <span
                                        class="material-symbols-outlined absolute text-gray-400 flex items-center z-10 ml-2">
                                        lock
                                    </span>
                                    <input id="passwords" name="password" type="password"
                                        class="bg-slate-100 h-12 w-full pl-9 placeholder:text-gray-400 placeholder:font-semibold px-5 py-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 relative items-center flex"
                                        placeholder="Password">
                                </div>

                                <div class="register-confirmpass w-full flex items-center">
                                    <span
                                        class="material-symbols-outlined absolute text-gray-400 flex items-center z-10 ml-2">
                                        lock
                                    </span>


                                    <input id="confirmpasswords" name="confirmpassword" type="password"
                                        class="bg-slate-100 h-12 w-full pl-9 placeholder:text-gray-400 placeholder:font-semibold px-5 py-2 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 relative items-center flex"
                                        placeholder="Confirm Password">
                                </div>
                                <div class="alert w-full h-2">
                                    <p id="message" class="-mt-2"></p>

                                </div>
                                <div class="register-submit w-full mt-0 flex justify-center">
                                    <button type="submit" id="submits"
                                        class="bg-gradient-to-r from-sky-500 to-blue-600 p-2 w-full text-white font-bold rounded-lg hover:opacity-80 duration-400">Register</button>
                                </div>
                        </form>
                        <div class="register-option text-sm lg:text-sm font-semibold mt-2">
                            <h1 class="text-center text-slate-700">Have An Account?<span
                                    class="text-center text-blue-600 cursor-pointer"><br><a
                                        href="{{ route('userlogin') }}">Login
                                        Here</a></span></h1>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

    </div>
    <script src="{{ asset('js/confirmpasswordreg.js') }}"></script>
@endsection
