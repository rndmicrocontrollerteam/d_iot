@extends('layouts.master')

@section('contents')
<div class="container mx-auto max-w-md mt-10">
    <h1 class="text-2xl text-center">Admin Login</h1>

    <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-6">
        @csrf
        <div class="form-group mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="form-control w-full mt-2" required>
        </div>

        <div class="form-group mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="form-control w-full mt-2" required>
        </div>

        @if ($errors->any())
        <div class="text-red-500 mb-4">
            {{ $errors->first('msg') }}
        </div>
        @endif

        <div class="form-group">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 w-full">Login</button>
        </div>
    </form>
</div>
@endsection
