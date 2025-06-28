@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 ml-17 sm:ml-64">
        <h2 class="text-xl font-bold mb-4">Rekap Absensi Bulan {{ now()->translatedFormat('F Y') }}</h2>

        <div class="overflow-auto">
            <table class="min-w-full border text-sm text-center bg-white shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-2 py-1 border">Nama</th>
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
                            <td class="px-2 py-1 border text-left font-semibold">{{ $student->name }}</td>
                            <td class="px-2 py-1 border">{{ $student->class->class_name ?? '-' }}</td>
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
                                    <td class="px-1 py-1 bg-gray-200 text-xs text-red-600">
                                        <div class="rotate-90 whitespace-nowrap font-bold">LIBUR</div>
                                    </td>
                                @else
                                    <td class="px-1 py-1 border text-xs {{ $bgClass }}">
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
        <div class="flex mt-5 flex-wrap">
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
                            22.20
                        </div>
                        <div class="text-gray-700 text-sm">09.20</div>
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
