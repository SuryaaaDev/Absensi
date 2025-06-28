@extends('layout.app')

@section('navbar')
    @include('student.navbar')
@endsection

@section('content')
    <div class="flex justify-center items-center min-h-screen p-10">
        <div class="flex flex-col w-full md:w-1/4 overflow-hidden rounded-lg bg-gray-100 shadow-xs border border-black">
            <div class="mb-8 bg-cover"
                style="background-image: url(&quot;https://cdn.tailkit.com/media/placeholders/photo-JgOeRuGD_Y4-800x400.jpg&quot;);">
                <div class="flex h-32 items-end justify-center">
                    <div class="-mb-12 rounded-full bg-gray-400/50 p-2 shadow-lg">
                        <p alt="User Avatar"
                            class="flex justify-center items-center size-20 text-5xl font-bold rounded-full">{{ $user->absen }}</p>
                    </div>
                </div>
            </div>

            <div class="grow p-5 text-center">
                <h3 class="mt-3 mb-1 text-lg font-semibold">{{ $user->name }}</h3>
                <p class="text-sm font-medium text-gray-600">{{ $user->email }}</p>
                <p class="text-sm font-medium text-gray-600">{{ $user->class->class_name }}</p>
                <p class="text-sm font-medium text-gray-600">{{ $user->telepon }}</p>
            </div>
        </div>
    </div>
@endsection
