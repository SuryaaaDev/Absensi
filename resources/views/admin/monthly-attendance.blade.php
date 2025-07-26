@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 ml-17 sm:ml-64">
        <h2 class="text-xl font-bold mb-4">Rekap Absensi Bulan {{ now()->translatedFormat('F Y') }}</h2>

        <div class="overflow-x-auto m-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full border text-center bg-white shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-2 py-1 border sticky left-0 bg-gray-100 z-10">Nama</th>
                        <th class="px-2 py-1 border">Kelas</th>
                        @foreach ($dateHeaders as $header)
                            <th class="px-2 py-1 border">
                                {{ $header['day'] }}<br>
                                <span class="text-xs text-gray-500">{{ $header['dow'] }}</span>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-2 py-1 border whitespace-nowrap text-left font-semibold sticky left-0 bg-white z-50">
                                <a href="{{ route('student.detail', [
                                    'id' => $student->id,
                                    'name' => Str::slug($student->name),
                                ]) }}"
                                    class="cursor-pointer hover:underline">{{ $student->name }}</a>
                            </td>
                            <td class="px-2 py-1 border whitespace-nowrap">
                                @if ($student->class && $student->class->id && $student->class->class_name)
                                    <a href="{{ route('show.class', [
                                        'id' => $student->class->id,
                                        'slug' => Str::slug($student->class->class_name),
                                    ]) }}"
                                        class="cursor-pointer hover:underline">
                                        {{ $student->class->class_name }}
                                    </a>
                                @else
                                    <a href="{{ route('classes') }}" class="text-gray-500 italic hover:underline">
                                        -
                                    </a>
                                @endif
                            </td>
                            @foreach ($dateHeaders as $header)
                                @php
                                    $isSunday = $header['dow'] === 'Minggu';
                                    $record = $student->attendance->firstWhere('attendance_date', $header['full']);

                                    $bgClass = 'bg-white text-black';
                                    if ($record) {
                                        if ($record->status_id == 1) {
                                            $bgClass = 'bg-red-200 text-red-700';
                                        } elseif ($record->status_id == 2) {
                                            $bgClass = 'bg-emerald-200 text-emerald-700';
                                        } elseif ($record->status_id == 3) {
                                            $bgClass = 'bg-blue-200 text-blue-700';
                                        } else {
                                            $bgClass = 'bg-amber-200 text-yellow-700';
                                        }
                                    }
                                @endphp

                                @if ($isSunday)
                                    <td class="px-1 py-1 bg-gray-100 text-xs text-red-600">
                                        <div class="whitespace-nowrap font-bold">LIBUR</div>
                                    </td>
                                @else
                                    <td class="px-1.5 py-1 border text-sm {{ $bgClass }}">
                                        @if ($record)
                                            <div>
                                                {{ $record->time_in ? \Carbon\Carbon::parse($record->time_in)->format('H:i') : '-' }}
                                            </div>
                                            @if ($record->time_out)
                                                <div class="text-gray-500 text-[10px]">
                                                    {{ \Carbon\Carbon::parse($record->time_out)->format('H:i') }}
                                                </div>
                                            @endif
                                        @else
                                            <span class="text-red-400">-</span>
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex mt-5 flex-wrap gap-2">
            <div class="flex flex-col gap-1 mb-4 sm:mb-0">
                <h1 class="font-bold">Keterangan</h1>
                <div class="flex gap-2">
                    <span class="px-3 bg-red-200 rounded-xs"></span>
                    <p>Alpha</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 bg-emerald-200 rounded-xs"></span>
                    <p>Hadir</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 bg-blue-200 rounded-xs"></span>
                    <p>Terlambat</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 bg-amber-200 rounded-xs"></span>
                    <ul class="flex">
                        @foreach ($status as $s)
                            <li>{{ $s->status_name }}@if (!$loop->last)
                                    ,
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex flex-col gap-1 ml-0 sm:ml-3">
                <h1 class="font-bold">Layout</h1>
                <div class="flex">
                    <div class="px-2 py-3 border w-max h-max text-center rounded-md">
                        <div>
                            07.00
                        </div>
                        <div class="text-gray-700 text-sm">15.30</div>
                    </div>
                    <div>
                        <div class="flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10" viewBox="0 0 21 21">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.499 6.497L3.5 10.499l4 4.001m9-4h-13" />
                            </svg>
                            <p>Jam Masuk</p>
                        </div>
                        <div class="flex justify-center items-center -mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10" viewBox="0 0 21 21">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.499 6.497L3.5 10.499l4 4.001m9-4h-13" />
                            </svg>
                            <p>Jam Pulang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
