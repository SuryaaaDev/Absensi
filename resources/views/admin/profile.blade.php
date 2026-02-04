@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-64">
        <div class="flex justify-center items-center min-h-screen">
            <div
                class="relative flex flex-col w-full md:w-1/2 xl:w-1/3 mx-2 overflow-hidden rounded-2xl border border-gray-200 bg-white/80 backdrop-blur-md shadow-lg hover:shadow-2xl transition-all duration-300">

                <div class="relative h-32 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                        <div
                            class="relative w-28 h-28 rounded-full bg-gradient-to-br from-gray-100 to-gray-300 p-1 shadow-lg ring-4 ring-white">
                            <div
                                class="flex items-center justify-center w-full h-full bg-white rounded-full overflow-hidden text-gray-600">
                                @if ($user['profile'])
                                    <img src="{{ asset('storage/' . $user['profile']) }}" alt="{{ $user['name'] }}"
                                        class="object-cover w-full h-full rounded-full" />
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#9ca3af"
                                        class="w-16 h-16">
                                        <path
                                            d="M224 256a128 128 0 1 0 0-256a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3h-91.5zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8l95.4 38.2z" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center mt-16 mb-6 text-center px-5">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ $user->telephone }}</p>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    <button type="button" popovertarget="update-profile-{{ $user->id }}"
                        class="mt-5 flex items-center gap-2 px-6 py-2.5 bg-black text-white rounded-xl hover:bg-gray-800e text-sm font-medium shadow-md hover:scale-105 hover:shadow-lg transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                            </g>
                        </svg>
                        Edit Profil
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
                        <form action="{{ route('update.profileAdmin', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-6 mt-4">
                                <div class="col-span-2">
                                    <label class="text-gray-700" for="profile">Foto</label>
                                    <div class="flex items-center space-x-4 mt-2">
                                        <div
                                            class="w-32 h-24 border border-gray-300 rounded-full overflow-hidden bg-gray-100">
                                            <img class="profile-preview w-full h-full object-cover" data-type="edit"
                                                data-id="{{ $user->id }}"
                                                src="{{ $user->profile
                                                    ? asset('storage/' . $user->profile)
                                                    : 'data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjY2NjIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNTAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgMjUwIDI1MCI+PHBhdGggZD0iTTEyNSAxMjVhNDAgNDAgMCAxIDAgMC04MCA0MCA0MCAwIDAgMCAwIDgwWk0xMjUgMTUwYy01NSAwLTc1IDMwLTc1IDUwdiA1MGgxNTB2LTUwYzAtMjAtMjAtNTAtNzUtNTB6Ii8+PC9zdmc+' }}"
                                                alt="Preview {{ $user->name }}" />
                                        </div>

                                        <input type="file" name="profile" accept="image/*"
                                            class="profile-input block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md cursor-pointer focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none"
                                            data-type="edit" data-id="{{ $user->id }}" />
                                    </div>

                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG.
                                        Maksimal 2MB.</p>
                                </div>
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
                                    <label class="text-gray-700" for="telephone">Telepon</label>
                                    <input id="telephone" type="tel"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                        name="telephone" value="{{ $user->telephone }}" required>
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const profileInputs = document.querySelectorAll(".profile-input");

            profileInputs.forEach((input) => {
                input.addEventListener("change", (event) => {
                    const file = event.target.files[0];
                    if (!file) return;

                    const type = input.dataset.type;
                    const id = input.dataset.id;

                    let previewSelector = `.profile-preview[data-type="${type}"]`;
                    if (id) previewSelector += `[data-id="${id}"]`;

                    const previewImg = document.querySelector(previewSelector);
                    if (!previewImg) return;

                    const reader = new FileReader();
                    reader.onload = (e) => (previewImg.src = e.target.result);
                    reader.readAsDataURL(file);
                });
            });
        });
    </script>
@endsection
