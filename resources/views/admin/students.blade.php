@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @if ($errors->any())
        <div class="fixed z-10 top-4 right-4">
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
                class="flex items-center h-1/2 m-auto cursor-pointer p-2 rounded bg-blue-500 hover:bg-blue-600 text-white border-blue-700 mx-1">
                <div class="mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0zm0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01zM736 480H544V288c0-17.664-14.336-32-32-32s-32 14.336-32 32v192H288c-17.664 0-32 14.336-32 32s14.336 32 32 32h192v192c0 17.664 14.336 32 32 32s32-14.336 32-32V544h192c17.664 0 32-14.336 32-32s-14.336-32-32-32z" />
                    </svg>
                </div>
                <span class="mx-1 hidden md:block">Tambah Data</span>
            </button>
            <form action="{{ route('students.search') }}" method="GET" autocomplete="off">
                @csrf
                <div class="relative my-6 w-full">
                    <input id="search" type="search" name="query" placeholder="Search here"
                        value="{{ request('query') }}" aria-label="Search content"
                        class="relative w-full h-10 px-4 pr-12 bg-white shadow-sm text-sm transition-all border rounded outline-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white invalid:border-pink-500 invalid:text-pink-500 focus:border-blue-500 focus:outline-none invalid:focus:border-pink-500 disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400" />
                    @if (request('query'))
                        <a href="{{ route('students') }}"
                            class="absolute top-1 right-10 ml-2 p-2 text-blue-700 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif {{-- fitur sementara --}}
                    <button type="submit"
                        class="absolute top-2.5 right-4 h-5 w-5 cursor-pointer stroke-slate-400 peer-disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            strokeWidth="1.5" aria-hidden="true" aria-label="Search icon" role="graphics-symbol">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <section popover id="add-student" class="max-w-xl md:max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10 mx-2 sm:mx-auto">
            <button type="button" popovertarget="add-student" popovertargetaction="hide"
                class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>

            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Data Siswa</h2>
            <form action="{{ route('add.user') }}" method="POST">
                @csrf
                <div class="grid gap-6 mt-4 grid-cols-2">
                    @if (!empty($rfidArray))
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="no-kartu">No Kartu</label>
                            <input id="no-kartu" type="text" value="{{ $rfidArray[0]['nokartu'] }}" readonly
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none"
                                name="card_number" required>
                        </div>
                    @else
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="no-kartu">No Kartu</label>
                            <input id="no-kartu" type="text" placeholder="Tempelkan kartu anda" readonly
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none "
                                name="card_number" required>
                        </div>
                    @endif

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="no-absen">No Absen</label>
                        <input id="no-absen" type="number"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="absen" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="nama">Nama Lengkap</label>
                        <input id="nama" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="name" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="class_name">Kelas</label>
                        <select id="class_name"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="class_name" required>
                            <option value="" disabled selected>Pilih kelas</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email</label>
                        <input id="email" type="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="email" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="telepon">Telepon</label>
                        <input id="telepon" type="tel"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="telepon" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                        <input id="password" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="password" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                        type="submit">Save</button>
                </div>
            </form>
        </section>

        <h1 class="text-center text-2xl font-bold pb-4">Data Siswa</h1>
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">No Absen</th>
                        <th class="px-3 py-2 whitespace-nowrap">No Kartu</th>
                        <th class="px-3 py-2 whitespace-nowrap">Nama Lengkap</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Email</th>
                        <th class="px-3 py-2 whitespace-nowrap">Telepon</th>
                        <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($students as $student)
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student->absen }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student->card_number }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student->name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student->class->class_name ?? 'Tidak ada kelas' }}
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student->email }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $student->telepon }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <button type="button" popovertarget="update-student-{{ $student->id }}"
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
                                    <a href="{{ route('delete.user', $student->id) }}" data-confirm-delete="true"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>
                                </span>

                                <section popover id="update-student-{{ $student->id }}"
                                    class="max-w-xl md:max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10 mx-2 sm:mx-auto">
                                    <button type="button" popovertarget="update-student-{{ $student->id }}"
                                        popovertargetaction="hide"
                                        class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                    </button>

                                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Data
                                        Siswa</h2>
                                    <form action="{{ route('update.user', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-2 gap-6 mt-4">
                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="no-kartu">No
                                                    Kartu</label>
                                                <input id="no-kartu" type="text" placeholder="Tempelkan kartu anda"
                                                    readonly
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none"
                                                    name="card_number" value="{{ $student->card_number }}" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="no-absen">No
                                                    Absen</label>
                                                <input id="no-absen" type="number"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="absen" value="{{ $student->absen }}" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="nama">Nama
                                                    Lengkap</label>
                                                <input id="nama" type="text"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="name" value="{{ $student->name }}" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="class_name">Kelas</label>
                                                <select id="class_name"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="class_name" required>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}" {{-- {{ $student->class->id == $class->id ? 'selected' : '' }}> --}}
                                                            {{ optional($student->class)->id == $class->id ? 'selected' : '' }}>
                                                            {{ $class->class_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="email">Email</label>
                                                <input id="email" type="email"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="email" value="{{ $student->email }}" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="telepon">Telepon</label>
                                                <input id="telepon" type="tel"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="telepon" value="{{ $student->telepon }}" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="password">Password</label>
                                                <input id="password" type="password"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="password">
                                            </div>
                                        </div>

                                        <div class="flex justify-end mt-6">
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="submit">Save</button>
                                        </div>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
