@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="w-full">
            @include('partials.navbar')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="w-full px-6">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Daftar Request Video
                    </h2>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Nama</th>
                                        <th class="px-4 py-3">Judul Video</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Start Access</th>
                                        <th class="px-4 py-3">End Access</th>
                                        <th class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($requests as $request)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold">{{ $request->user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $request->video->title }}
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{ $request->status }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $request->start_access }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $request->end_access }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    @if ($request->status == 'pending')
                                                    {{-- Accept Button --}}
                                                    <button data-modal-target="accept-modal"
                                                        data-modal-toggle="accept-modal"
                                                        class="text-white bg-green-500 rounded-lg box-border border border-transparent hover:bg-green-600 focus:ring-4 focus:ring-green-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                                                        type="button">
                                                        Approved
                                                    </button>
                                                    {{-- Accept Modal --}}
                                                    <div id="accept-modal" tabindex="-1" aria-hidden="true"
                                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <!-- Modal content -->
                                                            <div
                                                                class="relative bg-white rounded-lg border border-default rounded-base shadow-sm p-4 md:p-6">
                                                                <!-- Modal header -->
                                                                <div
                                                                    class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                                                    <h3 class="text-lg font-medium text-heading">
                                                                        Create accesss
                                                                    </h3>
                                                                    <button type="button"
                                                                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                                        data-modal-hide="accept-modal">
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
                                                                <form action="{{ route('requests-admin.approve', $request->id) }}" class="pt-4 md:pt-6" method="POST">
                                                                    @csrf
                                                                    <div class="mb-4">
                                                                        <label for="email"
                                                                            class="block mb-2.5 text-sm font-medium text-heading">Start at</label>
                                                                        <input type="datetime-local" id="email" name="start_access"
                                                                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required />
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label for="email"
                                                                            class="block mb-2.5 text-sm font-medium text-heading">End at</label>
                                                                        <input type="datetime-local" id="email" name="end_access"
                                                                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required />
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="text-white bg-blue-600 box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Reject Button --}}
                                                    <button data-modal-target="reject-modal"
                                                        data-modal-toggle="reject-modal"
                                                        class="text-white bg-red-500 rounded-lg box-border border border-transparent hover:bg-red-600 focus:ring-4 focus:ring-red-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                                                        type="button">
                                                        Reject
                                                    </button>
                                                    {{-- Reject Modal  --}}
                                                    <div id="reject-modal" tabindex="-1"
                                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <div
                                                                class="relative bg-white rounded-lg border border-default rounded-base shadow-sm p-4 md:p-6">
                                                                <button type="button"
                                                                    class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="reject-modal">
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
                                                                    <h3 class="mb-6 w-full text-body">Tolak permintaan ?
                                                                    </h3>
                                                                    <form action="{{ route('requests-admin.reject', $request->id) }}" method="POST">
                                                                        @csrf
                                                                        <div
                                                                        class="flex items-center space-x-4 justify-center">
                                                                        <button data-modal-hide="reject-modal"
                                                                            type="submit"
                                                                            class="text-white bg-red-600 rounded-lg box-border border border-transparent hover:bg-red-700 focus:ring-4 focus:ring-red-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                                            Yes, I'm sure
                                                                        </button>
                                                                        <button data-modal-hide="reject-modal"
                                                                            type="button"
                                                                            class="text-body rounded-lg bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,
                                                                            cancel</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                        <span class="text-gray-500">Permintaan sudah ditangani</span>
                                                    @endif
                                                    
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
