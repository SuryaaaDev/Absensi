@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 md:p-10 ml-17 sm:ml-64">
        <div class="flex justify-end md:justify-start mb-5">
            <button popovertarget="add-class"
                class="flex items-center cursor-pointer p-2 rounded bg-blue-500 hover:bg-blue-600 text-white border-blue-700 mx-1">
                <div class="mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0zm0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01zM736 480H544V288c0-17.664-14.336-32-32-32s-32 14.336-32 32v192H288c-17.664 0-32 14.336-32 32s14.336 32 32 32h192v192c0 17.664 14.336 32 32 32s32-14.336 32-32V544h192c17.664 0 32-14.336 32-32s-14.336-32-32-32z" />
                    </svg>
                </div>
                <span class="mx-1">Tambah Data</span>
            </button>
        </div>
        <section popover id="add-class" class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
            <button type="button" popovertarget="add-class" popovertargetaction="hide"
                class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>

            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Data Kelas</h2>
            <form action="{{ route('add.class') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="class_name">Nama Kelas</label>
                        <input id="class_name" type="class_name"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="class_name" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6 gap-3">
                    <button
                        class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                        type="submit">Save</button>
                </div>
            </form>
        </section>

        <h1 class="text-center text-2xl font-bold pb-4">Data Kelas</h1>
        <div class="overflow-x-auto w-full lg:w-1/3 m-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($classes as $class)
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $class->class_name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <button type="button" popovertarget="edit-class-{{ $class->id }}"
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
                                    <a href="{{ route('delete.class', $class->id) }}" data-confirm-delete="true"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>
                                </span>

                                <section popover id="edit-class-{{ $class->id }}"
                                    class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                    <button type="button" popovertarget="edit-class-{{ $class->id }}"
                                        popovertargetaction="hide"
                                        class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                    </button>

                                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Kelas
                                    </h2>
                                    <form action="{{ route('edit.class', $class->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="class_name">Nama
                                                    Kelas</label>
                                                <input id="class_name" type="class_name"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="class_name" value="{{ $class->class_name }}" required>
                                            </div>
                                        </div>

                                        <div class="flex justify-end mt-6 gap-3">
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="submit">Save</button>
                                        </div>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection
