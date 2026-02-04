@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @if ($errors->any())
        <div id="alert-container" class="fixed z-10 top-4 right-4 transition-opacity duration-500">
            <div class="flex items-start w-full gap-4 px-4 py-3 text-sm text-red-500 border border-pink-100 rounded bg-pink-50"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-09 desc-09">
                    <title id="title-09">Icon title</title>
                    <desc id="desc-09">A more detailed description of the icon</desc>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="mb-2 font-semibold">Uploading failed!</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="px-5 py-5 ml-17 sm:ml-64">
        <div class="flex w-full gap-4 justify-between flex-row-reverse md:flex-row">
            <button popovertarget="add-student"
                class="flex items-center h-1/2 m-auto cursor-pointer p-2 rounded bg-blue-600 hover:bg-blue-700 text-white border-blue-700 mx-1">
                <div class="mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0zm0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01zM736 480H544V288c0-17.664-14.336-32-32-32s-32 14.336-32 32v192H288c-17.664 0-32 14.336-32 32s14.336 32 32 32h192v192c0 17.664 14.336 32 32 32s32-14.336 32-32V544h192c17.664 0 32-14.336 32-32s-14.336-32-32-32z" />
                    </svg>
                </div>
                <span class="mx-1 hidden md:block">Tambah Data</span>
            </button>
            <div>
                <div class="relative my-6 w-full">
                    <input id="search-input" type="search" name="query" placeholder="Search here"
                        value="{{ request('query') }}" aria-label="Search content"
                        class="relative w-full h-10 px-4 pr-12 bg-white shadow-sm text-sm transition-all border rounded outline-none focus-visible:outline-none peer border-gray-300 text-gray-500 autofill:bg-white invalid:border-pink-500 invalid:text-pink-500 focus:border-blue-500 focus:outline-none invalid:focus:border-pink-500 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-400" />
                    <div
                        class="absolute top-2.5 right-4 h-5 w-5 cursor-pointer stroke-slate-400 peer-disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            strokeWidth="1.5" aria-hidden="true" aria-label="Search icon" role="graphics-symbol">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <section popover id="add-student">
            <div
                class="fixed inset-0 z-50 min-h-screen w-full flex justify-center items-center py-10 px-4 bg-black/40 transition overflow-y-scroll">
                <div class="max-w-xl md:max-w-4xl p-6 m-auto bg-white rounded-md shadow-md z-10 mx-2 sm:mx-auto">
                    <div class="flex w-full justify-end">
                        <button type="button" popovertarget="add-student" popovertargetaction="hide"
                            class="cursor-pointer rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                            <svg class="w-6 h-6 text-gray-800 hover:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                        </button>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700 capitalize">Tambah Data Siswa</h2>
                    <form action="{{ route('add.user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mt-4 grid-cols-2">
                            <div class="col-span-2">
                                <label class="text-gray-700" for="profile">Foto</label>
                                <div class="flex items-center space-x-4 mt-2">
                                    <div class="w-32 h-24 border border-gray-300 rounded-full overflow-hidden bg-gray-100">
                                        <img class="profile-preview w-full h-full object-cover" data-type="add"
                                            src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjY2NjIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNTAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgMjUwIDI1MCI+PHBhdGggZD0iTTEyNSAxMjVhNDAgNDAgMCAxIDAgMC04MCA0MCA0MCAwIDAgMCAwIDgwWk0xMjUgMTUwYy01NSAwLTc1IDMwLTc1IDUwdiA1MGgxNTB2LTUwYzAtMjAtMjAtNTAtNzUtNTB6Ii8+PC9zdmc+"
                                            alt="Preview" />
                                    </div>

                                    <input type="file" name="profile" accept="image/*"
                                        class="profile-input block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md cursor-pointer focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none"
                                        data-type="add" />
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                            </div>

                            @if (!empty($rfidCard))
                                <div>
                                    <label class="text-gray-700" for="no-kartu">No Kartu</label>
                                    <input id="no-kartu" type="text" value="{{ $rfidCard[0]['nokartu'] }}" readonly
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none"
                                        name="card_number" required>
                                </div>
                            @else
                                <div>
                                    <label class="text-gray-700" for="no-kartu">No Kartu</label>
                                    <input id="no-kartu" type="text" placeholder="Tempelkan kartu anda" readonly
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none "
                                        name="card_number" required>
                                </div>
                            @endif

                            <div>
                                <label class="text-gray-700" for="NISN">NISN</label>
                                <input id="NISN" type="number"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="NISN" required>
                            </div>

                            <div>
                                <label class="text-gray-700" for="no-absen">No Absen</label>
                                <input id="no-absen" type="number"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="absen" required>
                            </div>

                            <div>
                                <label class="text-gray-700" for="nama">Nama Lengkap</label>
                                <input id="nama" type="text"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="name" required>
                            </div>

                            <div>
                                <label class="text-gray-700" for="class_name">Kelas</label>
                                <select id="class_name"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="class_name" required>
                                    <option value="" disabled selected>Pilih kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class['id'] }}">{{ $class['class_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="text-gray-700" for="email">Email</label>
                                <input id="email" type="email"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="email" required>
                            </div>

                            <div>
                                <label class="text-gray-700" for="telepon">Telepon</label>
                                <input id="telepon" type="tel"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="telepon" required>
                            </div>

                            <div>
                                <label class="text-gray-700" for="parentPhone">Telepon Orang Tua</label>
                                <input id="parentPhone" type="tel"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="parentPhone" required>
                            </div>

                            <div>
                                <label class="text-gray-700" for="address">Alamat Lengkap</label>
                                <textarea id="address" type="address"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="address" required></textarea>
                            </div>

                            <div>
                                <label class="text-gray-700" for="password">Password</label>
                                <input id="password" type="password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                    name="password" required>
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

        <h1 class="text-center text-2xl font-bold pb-4">Data Siswa</h1>
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
            <table id="students-table" class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">Nama Lengkap</th>
                        <th class="px-3 py-2 whitespace-nowrap">No Absen</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Email</th>
                        <th class="px-3 py-2 whitespace-nowrap">Telepon</th>
                        <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200" id="studentsBody">
                    @if (empty($students))
                        <tr>
                            <td colspan="8" class="py-16 whitespace-nowrap">
                                <div class="flex flex-col items-center justify-center text-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-25 h-25">
                                        <path
                                            d="M384 480l48 0c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224l-400 0c-11.4 0-21.9 6-27.6 15.9L48 357.1 48 96c0-8.8 7.2-16 16-16l117.5 0c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8L416 144c8.8 0 16 7.2 16 16l0 32 48 0 0-32c0-35.3-28.7-64-64-64L298.5 96c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l23.7 0L384 480z" />
                                    </svg>
                                    <h2 class="text-2xl font-semibold text-gray-800 mt-1">Data Siswa Belum Ada</h2>
                                    <p class="mt-2 text-gray-500">Tekan tombol “Tambah Data” untuk mulai mengisi.</p>
                                    <button type="button" popovertarget="add-student"
                                        class="mt-3 inline-flex items-center px-4 py-2 text-white bg-black hover:bg-gray-600 font-semibold rounded-lg shadow transition">
                                        Tambah Data Siswa
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endif

                    @foreach ($students as $student)
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <a href="{{ route('student.detail', [
                                    'id' => $student['id'],
                                    'name' => Str::slug($student['name']),
                                ]) }}"
                                    class="cursor-pointer hover:underline">{{ $student['name'] }}</a>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student['absen'] }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                @if ($student['class'] && $student['class']['id'] && $student['class']['class_name'])
                                    <a href="{{ route('show.class', [
                                        'id' => $student['class']['id'],
                                        'slug' => Str::slug($student['class']['class_name']),
                                    ]) }}"
                                        class="cursor-pointer hover:underline">
                                        {{ $student['class']['class_name'] }}
                                    </a>
                                @else
                                    <a href="{{ route('classes') }}" class="text-gray-500 italic hover:underline">
                                        -
                                    </a>
                                @endif
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student['email'] }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student['telephone'] }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <button type="button" popovertarget="update-student-{{ $student['id'] }}"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
                                        aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                                            </g>
                                        </svg>
                                    </button>
                                    <a href="{{ route('student.detail', [
                                        'id' => $student['id'],
                                        'name' => Str::slug($student['name']),
                                    ]) }}"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-100 hover:text-gray-900 focus:relative"
                                        aria-label="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="{{ route('delete.user', $student['id']) }}" data-confirm-delete="true"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>
                                </span>


                                <section popover id="update-student-{{ $student['id'] }}">
                                    <div
                                        class="fixed inset-0 z-50 min-h-screen w-full flex justify-center items-center py-10 px-4 bg-black/40 transition overflow-y-scroll">
                                        <div
                                            class="max-w-xl md:max-w-4xl p-6 m-auto bg-white rounded-md shadow-md z-10 mx-2 sm:mx-auto">
                                            <div class="flex w-full justify-end">
                                                <button type="button"
                                                    popovertarget="update-student-{{ $student['id'] }}"
                                                    popovertargetaction="hide"
                                                    class="cursor-pointer rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                                    <svg class="w-6 h-6 text-gray-800 hover:text-gray-500"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <h2 class="text-lg font-semibold text-gray-700 capitalize">Edit Data Siswa
                                            </h2>
                                            <form action="{{ route('update.user', $student['id']) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid grid-cols-2 gap-6 mt-4">
                                                    <div class="col-span-2">
                                                        <label class="text-gray-700" for="profile">Foto</label>
                                                        <div class="flex items-center space-x-4 mt-2">
                                                            <div
                                                                class="w-32 h-24 border border-gray-300 rounded-full overflow-hidden bg-gray-100">
                                                                <img class="profile-preview w-full h-full object-cover"
                                                                    data-type="edit" data-id="{{ $student['id'] }}"
                                                                    src="{{ $student['profile']
                                                                        ? asset('storage/' . $student['profile'])
                                                                        : 'data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjY2NjIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNTAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgMjUwIDI1MCI+PHBhdGggZD0iTTEyNSAxMjVhNDAgNDAgMCAxIDAgMC04MCA0MCA0MCAwIDAgMCAwIDgwWk0xMjUgMTUwYy01NSAwLTc1IDMwLTc1IDUwdiA1MGgxNTB2LTUwYzAtMjAtMjAtNTAtNzUtNTB6Ii8+PC9zdmc+' }}"
                                                                    alt="Preview {{ $student['name'] }}" />
                                                            </div>

                                                            <input type="file" name="profile" accept="image/*"
                                                                class="profile-input block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md cursor-pointer focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none"
                                                                data-type="edit" data-id="{{ $student['id'] }}" />
                                                        </div>

                                                        <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG.
                                                            Maksimal 2MB.</p>
                                                    </div>
                                                    <div>
                                                        <label class="text-gray-700" for="no-kartu">No Kartu</label>
                                                        <input id="no-kartu" type="text"
                                                            placeholder="Tempelkan kartu anda" readonly
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none"
                                                            name="card_number" value="{{ $student['card_number'] }}"
                                                            required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="NISN">NISN</label>
                                                        <input id="NISN" type="number"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                                            name="NISN" value="{{ $student['NISN'] }}" required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="no-absen">No Absen</label>
                                                        <input id="no-absen" type="number"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                            name="absen" value="{{ $student['absen'] }}" required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="nama">Nama Lengkap</label>
                                                        <input id="nama" type="text"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                            name="name" value="{{ $student['name'] }}" required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="class_name">Kelas</label>
                                                        <select id="class_name"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                            name="class_name" required>
                                                            @foreach ($classes as $class)
                                                                <option value="{{ $class['id'] }}" {{-- {{ $student->class->id == $class->id ? 'selected' : '' }}> --}}
                                                                    {{ optional($student['class'])['id'] == $class['id'] ? 'selected' : '' }}>
                                                                    {{ $class['class_name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="email">Email</label>
                                                        <input id="email" type="email"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                            name="email" value="{{ $student['email'] }}" required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="telepon">Telepon</label>
                                                        <input id="telepon" type="tel"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                            name="telepon" value="{{ $student['telephone'] }}" required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="parentPhone">Telepon Orang
                                                            Tua</label>
                                                        <input id="parentPhone" type="tel"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                                            name="parentPhone" value="{{ $student['parents_phone'] }}"
                                                            required>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="address">Alamat Lengkap</label>
                                                        <textarea id="address" type="address"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                                            name="address" required>{{ $student['address'] }}</textarea>
                                                    </div>

                                                    <div>
                                                        <label class="text-gray-700" for="password">Password</label>
                                                        <input id="password" type="password"
                                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="no-results" class="hidden text-center text-gray-500 my-4 italic">
                Tidak ada siswa yang cocok dengan pencarian.
            </p>
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

            const alertBox = document.getElementById("alert-container");
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }, 3000);
            }

            const searchInput = document.getElementById("search-input");
            const tableRows = document.querySelectorAll("#students-table tbody tr");
            const noResults = document.getElementById("no-results");

            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener("keyup", () => {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        const query = searchInput.value.toLowerCase();
                        let visibleCount = 0;

                        tableRows.forEach((row) => {
                            const text = row.innerText.toLowerCase();
                            const match = text.includes(query);
                            row.style.display = match ? "" : "none";
                            if (match) visibleCount++;
                        });

                        if (noResults) {
                            noResults.classList.toggle("hidden", visibleCount > 0);
                        }
                    }, 200);
                });
            }
        });
    </script>
@endsection
