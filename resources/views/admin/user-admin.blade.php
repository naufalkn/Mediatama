@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="w-full">
            @include('partials.navbar')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="w-full px-6">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Daftar User
                    </h2>
                    <div class="mb-4 w-full flex justify-end">
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Add User
                        </button>
                    </div>
                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div
                                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 bg-white">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                    <h3 class="text-lg font-medium text-heading">
                                        Form User
                                    </h3>
                                    <button type="button"
                                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="default-modal">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('users-admin.create') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- Nama --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Nama
                                        </span>
                                        <input type="text" name="name" id="name"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Jane Doe" />
                                    </label>
                                    {{-- Username --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Username
                                        </span>
                                        <input type="text" name="username" id="username"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="jane_doe" />
                                    </label>
                                    {{-- Email --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Email
                                        </span>
                                        <input type="email" name="email" id="email"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="jane.doe@example.com" />
                                    </label>
                                    {{-- Password --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Password
                                        </span>
                                        <input type="password" name="password" id="password"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="••••••••" />
                                    </label>
                                    <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                                        <button type="submit" data-modal-hide="default-modal"
                                            class="text-white bg-blue-600 box-border border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                            Create</button>
                                        <button data-modal-hide="default-modal" type="button"
                                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Decline</button>
                                    </div>
                                </form>
                                <!-- Modal footer -->
                            </div>
                        </div>
                    </div>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Nama</th>
                                        <th class="px-4 py-3">Username</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Date</th>
                                        <th class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($users as $user)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $user->name }}</p>
                                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            10x Developer
                                                        </p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $user->username }}
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{ $user->email }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $user->created_at }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    {{-- Edit --}}
                                                    <div class="flex justify-center">
                                                        <button data-modal-target="edit-modal-{{ $user->id }}"
                                                            data-modal-toggle="edit-modal-{{ $user->id }}"
                                                            class="text-sm font-medium leading-5 text-purple-600 transition-colors duration-150 border border-transparent rounded-lg active:bg-grey-600 focus:outline-none focus:shadow-outline-purple">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    {{-- Modal Edit --}}
                                                    <div id="edit-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                            <!-- Modal content -->
                                                            <div
                                                                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 bg-white">
                                                                <!-- Modal header -->
                                                                <div
                                                                    class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                                                    <h3 class="text-lg font-medium text-heading">
                                                                        Edit User
                                                                    </h3>
                                                                    <button type="button"
                                                                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                                        data-modal-hide="edit-modal-{{ $user->id }}">
                                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" fill="none"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <form action="{{ route('users-admin.edit', $user->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    {{-- Nama --}}
                                                                    <label class="block mt-4 text-sm">
                                                                        <span class="text-gray-700 dark:text-gray-400">
                                                                            Nama
                                                                        </span>
                                                                        <input type="text" name="name"
                                                                            id="name"
                                                                            value="{{ old('name', $user->name) }}"
                                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                                            placeholder="Jane Doe" />
                                                                    </label>
                                                                    {{-- Username --}}
                                                                    <label class="block mt-4 text-sm">
                                                                        <span class="text-gray-700 dark:text-gray-400">
                                                                            Username
                                                                        </span>
                                                                        <input type="text" name="username"
                                                                            id="username"
                                                                            value="{{ old('username', $user->username) }}"
                                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                                            placeholder="jane_doe" />
                                                                    </label>
                                                                    {{-- Email --}}
                                                                    <label class="block mt-4 text-sm">
                                                                        <span class="text-gray-700 dark:text-gray-400">
                                                                            Email
                                                                        </span>
                                                                        <input type="email" name="email"
                                                                            id="email"
                                                                            value="{{ old('email', $user->email) }}"
                                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                                            placeholder="jane.doe@example.com" />
                                                                    </label>
                                                                    {{-- Password --}}
                                                                    <label class="block mt-4 text-sm">
                                                                        <span class="text-gray-700 dark:text-gray-400">
                                                                            Password
                                                                        </span>
                                                                        <input type="password" name="password"
                                                                            id="password"
                                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                                            placeholder="Masukkan password baru" />
                                                                    </label>
                                                                    <div
                                                                        class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                                                                        <button type="submit"
                                                                            data-modal-hide="default-modal"
                                                                            class="text-white bg-blue-600 box-border border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                                            Create</button>
                                                                        <button data-modal-hide="default-modal"
                                                                            type="button"
                                                                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Decline</button>
                                                                    </div>
                                                                </form>
                                                                <!-- Modal footer -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Delete --}}
                                                    {{-- <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button> --}}
                                                    <div class="flex justify-center">
                                                        <button data-modal-target="delete-modal-{{ $user->id }}"
                                                            data-modal-toggle="delete-modal-{{ $user->id }}"
                                                            class="text-sm font-medium leading-5 text-purple-600 transition-colors duration-150 border border-transparent rounded-lg active:bg-grey-600 focus:outline-none focus:shadow-outline-purple">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    {{-- Modal Delete --}}
                                                    <div id="delete-modal-{{ $user->id }}" tabindex="-1"
                                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <div
                                                                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 bg-white">
                                                                <button type="button"
                                                                    class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="delete-modal-{{ $user->id }}">
                                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" fill="none"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                                <div class="p-4 md:p-5 text-center">
                                                                    <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" fill="none"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                    </svg>
                                                                    <div
                                                                        class="flex w-full justify-center items-center mb-4">
                                                                        <h3 class="mb-6 text-body">Are you sure you want to
                                                                            delete this product from your account?</h3>
                                                                    </div>
                                                                    <div
                                                                        class="flex items-center space-x-4 justify-center">
                                                                        <form
                                                                            action="{{ route('users-admin.delete', $user->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button data-modal-hide="delete-modal-{{ $user->id }}"
                                                                                type="submit"
                                                                                class="text-white bg-red-700 box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                                                Yes, I'm sure
                                                                            </button>
                                                                        </form>
                                                                        <button data-modal-hide="delete-modal-{{ $user->id }}"
                                                                            type="button"
                                                                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,
                                                                            cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        <div
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing 21-30 of 100
                            </span>
                            <span class="col-span-2"></span>
                            <!-- Pagination -->
                            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                <nav aria-label="Table navigation">
                                    <ul class="inline-flex items-center">
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                aria-label="Previous">
                                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                    <path
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                1
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                2
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                3
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                4
                                            </button>
                                        </li>
                                        <li>
                                            <span class="px-3 py-1">...</span>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                8
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                9
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                aria-label="Next">
                                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                    <path
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
