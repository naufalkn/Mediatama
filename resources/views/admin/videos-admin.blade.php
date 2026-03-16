@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="w-full">
            @include('partials.navbar')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="w-full px-6">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Daftar Video
                    </h2>
                    <div class="mb-4 w-full flex justify-end">
                        <button data-modal-target="video-modal" data-modal-toggle="video-modal"
                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Add Video
                        </button>
                    </div>
                    <!-- Main modal -->
                    <div id="video-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div
                                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 bg-white">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                    <h3 class="text-lg font-medium text-heading">
                                        Upload Video
                                    </h3>
                                    <button type="button"
                                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="video-modal">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('videos-admin.create') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- Judul Video --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Judul Video
                                        </span>
                                        <input type="text" name="title" id="title"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Masukkan Judul Video" />
                                    </label>
                                    {{-- Deskripsi --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Description Video
                                        </span>
                                        <textarea type="text" name="description" id="description"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Masukkan Deskripsi Video" rows="4"> </textarea>
                                    </label>
                                    {{-- Video --}}
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Upload Video Anda
                                        </span>
                                        <input type="file" name="video" id="video"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                    </label>
                                    <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                                        <button type="submit" data-modal-hide="default-modal"
                                            class="text-white bg-blue-600 box-border border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                            Upload</button>
                                        <button data-modal-hide="default-modal" type="button"
                                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Decline</button>
                                    </div>
                                </form>
                                <!-- Modal footer -->
                            </div>
                        </div>
                    </div>
                    {{-- Video Cards --}}
                    <div class="flex flex-wrap gap-6 mb-8 w-full h-auto">
                        @foreach ($videos as $video)
                            <div
                                class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                                <video controls class="w-full h-auto">
                                    <source src="{{ Storage::url($video->video) }}" type="video/mp4">
                                </video>
                                <p>
                                <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">{{ $video->title }}
                                </h5>
                                </p>
                                <p class="mb-6 text-body">{{ $video->description }}</p>
                                <div class="flex w-full justify-between gap-4">
                                    {{-- Edit Modal --}}
                                    <div class=" w-full">
                                        <button data-modal-target="editVideo-modal{{ $video->id }}"
                                            data-modal-toggle="editVideo-modal{{ $video->id }}"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Edit Video
                                        </button>
                                    </div>
                                    <!-- Main modal -->
                                    <div id="editVideo-modal{{ $video->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div
                                                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 bg-white">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                                    <h3 class="text-lg font-medium text-heading">
                                                        Edit Video
                                                    </h3>
                                                    <button type="button"
                                                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                        data-modal-hide="editVideo-modal{{ $video->id }}">
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form action="{{ route('videos-admin.edit', $video->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- Judul Video --}}
                                                    <label class="block mt-4 text-sm">
                                                        <span class="text-gray-700 dark:text-gray-400">
                                                            Judul Video
                                                        </span>
                                                        <input type="text" name="title" id="title"
                                                            value="{{ $video->title }}"
                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                            placeholder="Masukkan Judul Video" />
                                                    </label>
                                                    {{-- Deskripsi --}}
                                                    <label class="block mt-4 text-sm">
                                                        <span class="text-gray-700 dark:text-gray-400">
                                                            Description Video
                                                        </span>
                                                        <textarea name="description" id="description"
                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                            placeholder="Masukkan Deskripsi Video" rows="4">{{ $video->description }}</textarea>
                                                    </label>
                                                    {{-- Video --}}
                                                    <label class="block mt-4 text-sm">
                                                        <span class="text-gray-700 dark:text-gray-400">
                                                            Upload Video Anda
                                                        </span>
                                                        <input type="file" name="video" id="video"
                                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                                    </label>
                                                    <div
                                                        class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                                                        <button type="submit" data-modal-hide="default-modal"
                                                            class="text-white bg-blue-600 box-border border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                            Upload</button>
                                                        <button data-modal-hide="default-modal" type="button"
                                                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Decline</button>
                                                    </div>
                                                </form>
                                                <!-- Modal footer -->
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Delete Modal  --}}
                                    <div class="flex justify-center">
                                        <button data-modal-target="delete-video-modal-{{ $video->id }}"
                                            data-modal-toggle="delete-video-modal-{{ $video->id }}"
                                            class="text-sm font-medium leading-5 text-purple-600 transition-colors duration-150 border border-transparent rounded-lg active:bg-grey-600 focus:outline-none focus:shadow-outline-purple">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Main modal delete-->
                                    <div id="delete-video-modal-{{ $video->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div
                                                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 bg-white">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="delete-video-modal-{{ $video->id }}">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <div class="flex w-full justify-center items-center mb-4">
                                                        <h3 class="mb-6 text-body">Are you sure you want to
                                                            delete this product from your account?</h3>
                                                    </div>
                                                    <div class="flex items-center space-x-4 justify-center">
                                                        <form action="{{ route('video-admin.delete', $video->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                data-modal-hide="delete-video-modal-{{ $video->id }}"
                                                                type="submit"
                                                                class="text-white bg-red-700 box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                                Yes, I'm sure
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="delete-video-modal-{{ $video->id }}"
                                                            type="button"
                                                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,
                                                            cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
