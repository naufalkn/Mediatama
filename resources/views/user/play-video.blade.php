@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="w-full">
            @include('partials.navbar')
            <main class="h-full overflow-y-auto">
                <div class="w-full px-6 ">
                    <div class="w-full p-6  rounded-lg">
                    <video class="w-full h-auto" controls>
                        <source src="{{ asset('storage/' . $video->video->video) }}" type="video/mp4">
                        Your browser does not support the video tag.    
                    </video>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection