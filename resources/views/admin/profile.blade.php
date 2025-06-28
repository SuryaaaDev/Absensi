@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 ml-17 sm:ml-64">
        <div class="flex justify-center items-center min-h-screen">
            <div class="flex flex-col w-full md:w-1/4 overflow-hidden rounded-lg bg-gray-100 shadow-xs border border-black">
                <div class="mb-8 bg-cover"
                    style="background-image: url(&quot;https://cdn.tailkit.com/media/placeholders/photo-JgOeRuGD_Y4-800x400.jpg&quot;);">
                    <div class="flex h-32 items-end justify-center">
                        <div class="-mb-12 rounded-full bg-gray-400/50 p-2 shadow-lg">
                            <div alt="User Avatar"
                                class="flex justify-center items-center size-20 text-5xl font-bold rounded-full">
                                <svg class="size-36 text-gray-800 dark:text-gray" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grow p-5 text-center">
                    <h3 class="mt-3 mb-1 text-lg font-semibold">{{ $user->name }}</h3>
                    <p class="text-sm font-medium text-gray-600">{{ $user->email }}</p>
                </div>
                <div class="flex m-auto my-3">
                    <button type="button" popovertarget="edit-status-{{ $user->id }}"
                        class="flex px-15 sm:px-20 py-2 cursor-pointer bg-gray-300 text-sm rounded-xl font-medium transition-colors hover:bg-gray-200 hover:text-gray-900 focus:relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                            </g>
                        </svg>
                        <p>Edit Profil</p>
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
