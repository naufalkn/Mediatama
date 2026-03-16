@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="w-full">
            @include('partials.navbar')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="w-full px-6 ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Daftar Video saya
                    </h2>
                    <div class="grid grid-cols-2 w-full p-6 gap-6  rounded-lg">
                        @foreach ($myVideos as $myvideo)
                            <div
                                class="flex flex-col items-center bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs md:flex-row md:max-w-xl md:flex-row md:max-w-xl">
                                <video class="w-64 h-auto pointer-events-none object-cover" preload="metadata" muted>
                                    <source src="{{ Storage::url($myvideo->video->video) }}" type="video/mp4">
                                </video>
                                <div class="flex flex-col justify-between md:p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">
                                        {{ $myvideo->video->title }}</h5>
                                    <p class=" text-body">{{ $myvideo->video->description }}</p>
                                    @if(now() < $myvideo->start_access)
                                    <span class="text-yellow-600">Upcoming</span>
                                    <p class="text-xs">{{ $myvideo->start_access }} sampai {{ $myvideo->end_access }}</p>
                                    @elseif ($myvideo->status == 'approved')
                                    <p class="text-xs">{{ $myvideo->start_access }} sampai {{ $myvideo->end_access }}</p>
                                        <span class="text-green-600">Active</span>
                                    <button class="flex justify-start">
                                        <a href="{{ route('play-video', $myvideo->video->id) }}"
                                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Tonton Video
                                        </a>
                                    </button>
                                    @elseif($myvideo->status == 'expired')
                                    <p class="text-xs">{{ $myvideo->start_access }} sampai {{ $myvideo->end_access }}</p>
                                        <span class="text-red-600">Expired</span>
                                    @else
                                        <span class="text-gray-600">Pending</span>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
