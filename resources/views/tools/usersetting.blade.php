@extends('Auth.dashboard')
@section('tool')
    <h1>User Settings</h1>
    <div
        class="mt-4 p-4 mb-24 table-container w-full shadow-xl bg-white dark:bg-slate-800 dark:text-slate-200 rounded-xl border-t-blue-500 border-t-4">
        <div class="flex flex-col h-full">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 h-full">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full min-h-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-center align-middle text-sm font-medium px-6 py-4">
                                        Id
                                    </th>
                                    <th scope="col" class="text-center align-middle text-sm font-medium px-6 py-4">
                                        Name
                                    </th>
                                    <th scope="col" class="align-middle text-sm font-medium px-6 py-4 text-center">
                                        Email
                                    </th>
                                    <th scope="col" class="align-middle text-sm font-medium px-6 py-4 text-center">
                                        Date Of Join
                                    </th>
                                    <th scope="col" class=" align-middle text-sm font-medium px-6 py-4 text-center">
                                        Role
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="h-full">
                                @foreach ($defaultuser as $peruser)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td
                                            class="text-center align-middle px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{ $peruser->id }}
                                        </td>
                                        <td class="text-center align-middle text-sm cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                            title="">
                                            {{ $peruser->name }}
                                        </td>
                                        <td class="text-center align-middle text-sm font-light px-6 py-4 whitespace-nowrap">
                                            {{ $peruser->email }}
                                        </td>
                                        <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                            {{ $peruser->created_at }}
                                        </td>
                                        <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                            {{ $peruser->userroles->name }}
                                        </td>
                                        <td class="text-sm text-center align-middle font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('userdetails', $peruser->slug) }}">
                                                <span
                                                    class="material-symbols-outlined text-slate-700 dark:text-slate-300 cursor-pointer hover:text-blue-400 duration-300">
                                                    settings
                                                </span>
                                            </a>

                                        </td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
