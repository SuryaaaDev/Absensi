@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 ml-17 sm:ml-64">
        <div class="mb-4">
            <a href="{{ route('classes') }}" onclick="if(document.referrer) { history.back(); return false; }"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-200 rounded-lg shadow-sm hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <h1 class="text-2xl text-center font-bold mb-4">Siswa Kelas {{ $class['class_name'] }}</h1>

        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-4 py-2 whitespace-nowrap">#</th>
                        <th class="px-4 py-2 whitespace-nowrap">Nama</th>
                        <th class="px-4 py-2 whitespace-nowrap">No Absen</th>
                        <th class="px-4 py-2 whitespace-nowrap">Email</th>
                        <th class="px-4 py-2 whitespace-nowrap">Telepon</th>
                        <th class="px-4 py-2 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if (empty($students))
                        <tr>
                            <td colspan="6" class="py-12 whitespace-nowrap">
                                <div class="flex flex-col items-center justify-center text-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-25 h-25 text-black">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <h2 class="text-lg font-semibold text-gray-800 mt-1">Tidak ada siswa di kelas ini.</h2>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @foreach ($students as $student)
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-4 py-2 whitespace-nowrap ">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 whitespace-nowrap"><a
                                    href="{{ route('student.detail', [
                                        'id' => $student['id'],
                                        'name' => Str::slug($student['name']),
                                    ]) }}"
                                    class="cursor-pointer hover:underline">{{ $student['name'] }}</a></td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $student['absen'] }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $student['email'] }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $student['telephone'] }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
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
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
