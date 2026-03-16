@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="w-full">
            @include('partials.navbar')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="w-full px-6 ">
                    <div class="grid grid-cols-2 w-full p-6 gap-6  rounded-lg">
                        @foreach ($videos as $video)
                            <div
                                class="flex flex-col items-center bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs md:flex-row md:max-w-xl md:flex-row md:max-w-xl">
                                <video class="w-64 h-auto pointer-events-none object-cover" preload="metadata" muted>
                                    <source src="{{ Storage::url($video->video) }}" type="video/mp4">
                                </video>
                                <div class="flex flex-col justify-between md:p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">{{ $video->title }}</h5>
                                    <p class="mb-6 text-body">{{ $video->description }}</p>
                                    <div>
                                        <button data-modal-target="tonton-modal-{{ $video->id }}"
                                            data-modal-toggle="tonton-modal-{{ $video->id }}"
                                            class="text-white bg-blue-500 box-border border rounded-lg border-transparent hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                                            type="button">
                                            Tonton Sekarang
                                        </button>
                                        <div id="tonton-modal-{{ $video->id }}" tabindex="-1"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div
                                                    class="relative bg-white rounded-lg border border-default rounded-base shadow-sm p-4 md:p-6">
                                                    <button type="button"
                                                        class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                        data-modal-hide="tonton-modal-{{ $video->id }}">
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <form action="{{ route('request-user', $video->id) }}" method="POST">
                                                        @csrf
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" fill="none"
                                                                viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3 class="mb-6 text-body">Anda akan melakukan permintaan untuk
                                                                menonton video ini ?</h3>
                                                            <div class="flex items-center space-x-4 justify-center">
                                                                <button data-modal-hide="tonton-modal-{{ $video->id }}"
                                                                    type="submit"
                                                                    class="text-white bg-blue-700 rounded-lg box-border border border-transparent hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-hide="tonton-modal-{{ $video->id }}"
                                                                    type="button"
                                                                    class="text-body rounded-lg bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,
                                                                    cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>

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
