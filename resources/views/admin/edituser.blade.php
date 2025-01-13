@extends('layouts.master')

@section('contents')
<div class="container mx-auto mt-10 max-w-3xl">
    <h1 class="text-3xl font-semibold mb-6">Update User</h1>

    <form action="{{ route('controladmin.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $user->name }}" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $user->email }}" required>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label for="user_roles_id" class="block text-lg font-medium text-gray-700">Role</label>
            <select name="user_roles_id" id="user_roles_id" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id == $user->user_roles_id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 shadow-sm">
                Update User
            </button>
        </div>
    </form>
</div>
@endsection
