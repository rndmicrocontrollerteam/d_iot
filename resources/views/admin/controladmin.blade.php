@extends('layouts.master')

@section('contents')
    <div class="container mt-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl dark:text-slate-300">User Management</h1>
            <a href="{{ route('controladmin.create') }}"
                class="flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-300 rounded-xl dark:text-slate-300 text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.8px] items-center dark:hover-slate-300">
                <ion-icon name="add-circle-outline"></ion-icon>
                <h1>Add User</h1>
            </a>
        </div>

        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-gray-100 border-b dark:bg-slate-600  dark:text-slate-200">
                <tr>
                    <th class="py-3 px-4 text-center">Id</th>
                    <th class="py-3 px-4 text-center">Name</th>
                    <th class="py-3 px-4 text-center">Email</th>
                    <th class="py-3 px-4 text-center">Role</th>
                    <th class="py-3 px-4 text-center">Date Created</th>
                    <th class="py-3 px-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr
                        class="border-b dark:bg-slate-600 dark:text-slate-200 transition duration-300 ease-in-out hover:bg-gray-100 dark:hover">
                        <td class="py-3 px-4 text-center">{{ $key + 1 }}.</td>
                        <td class="py-3 px-4 text-center">{{ $user->name }}</td>
                        <td class="py-3 px-4 text-center">{{ $user->email }}</td>
                        <td class="py-3 px-4 text-center">{{ $user->UserRoles->name }}</td>
                        <td class="py-3 px-4 text-center">{{ $user->created_at }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('controladmin.edit', $user->id) }}"
                                class="text-yellow-500 hover:text-yellow-700">
                                <ion-icon name="pencil" class="text-xl"></ion-icon>
                            </a>
                            <form action="{{ route('controladmin.destroy', $user->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"
                                    onclick="return confirm('Are you sure?')">
                                    <ion-icon name="trash" class="text-xl"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-red-600 text-black font-semibold rounded-md hover:bg-red-700 shadow-sm">
                Logout
            </button>
        </form>

    </div>
@endsection
