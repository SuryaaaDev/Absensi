@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-64">
        <div class="flex justify-center items-center min-h-screen">
            <div
                class="flex flex-col w-full md:w-1/2 xl:w-1/3 overflow-hidden rounded-lg bg-gray-100 shadow-xs border border-black">
                <div class="mb-8 bg-cover"
                    style="background-image: url(&quot;https://cdn.tailkit.com/media/placeholders/photo-JgOeRuGD_Y4-800x400.jpg&quot;);">
                    <div class="flex h-32 items-end justify-center">
                        <div class="-mb-12 rounded-full bg-gray-400/50 p-2 shadow-lg backdrop-blur-sm">
                            <div alt="User Avatar"
                                class="flex justify-center items-center size-20 text-5xl font-bold rounded-full">
                                {{-- <svg class="size-36 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg> --}}

                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3/4 text-gray-800"
                                    viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M224 256a128 128 0 1 0 0-256a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3h-91.5zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8l95.4 38.2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grow p-5 text-center">
                    <h3 class="mt-3 mb-1 text-lg font-semibold">{{ $user->name }}</h3>
                    <p class="text-sm font-medium text-gray-600">{{ $user->telepon }}</p>
                    <p class="text-sm font-medium text-gray-600">{{ $user->email }}</p>
                </div>
                <div class="flex m-auto my-3">
                    <button type="button" popovertarget="update-profile-{{ $user->id }}"
                        class="flex px-12 gap-1.5 sm:px-20 py-2 cursor-pointer bg-black text-white text-sm rounded-xl font-medium transition-colors hover:bg-gray-800 hover:text-gray-200 focus:relative">
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

            <section popover id="update-profile-{{ $user->id }}">
                <div
                    class="fixed inset-0 z-50 min-h-screen w-full flex justify-center items-center py-10 px-4 bg-black/40 transition overflow-y-scroll">
                    <div class="max-w-xl md:max-w-4xl p-6 m-auto bg-white rounded-md shadow-md z-10 mx-2 sm:mx-auto">
                        <div class="flex w-full justify-end">
                            <button type="button" popovertarget="update-profile-{{ $user->id }}"
                                popovertargetaction="hide"
                                class="cursor-pointer rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-6 h-6 text-gray-800 hover:text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                </svg>
                            </button>
                        </div>

                        <h2 class="text-lg font-semibold text-gray-700 capitalize">Edit Profil</h2>
                        <form action="{{ route('update.profileAdmin', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-6 mt-4">
                                <div>
                                    <label class="text-gray-700" for="nama">Username</label>
                                    <input id="nama" type="text"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                        name="name" value="{{ $user->name }}" required>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="email">Email</label>
                                    <input id="email" type="email"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                        name="email" value="{{ $user->email }}" required>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="telepon">Telepon</label>
                                    <input id="telepon" type="tel"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                        name="telepon" value="{{ $user->telepon }}" required>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="password">Password</label>
                                    <input id="password" type="password"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                        name="password">
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button
                                    class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-black rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                    type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
