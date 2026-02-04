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
                        <th class="px-2 py-1 border sm:sticky left-0 bg-gray-100 z-10">Nama</th>
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
                    @if ($students->isEmpty())
                        <tr>
                            <td colspan="24" class="py-12 whitespace-nowrap">
                                <div class="flex flex-col items-center justify-center text-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-25 h-25 text-black">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <h2 class="text-lg font-semibold text-gray-800 mt-1">Belum ada siswa absen.</h2>
                                </div>
                            </td>
                        </tr>
                    @endif

                    @foreach ($students as $student)
                        <tr class="hover:bg-gray-100">
                            <td
                                class="px-2 py-1 border whitespace-nowrap text-left font-semibold sm:sticky left-0 bg-white z-50">
                                <a href="{{ route('student.detail', ['id' => $student->id, 'name' => Str::slug($student->name)]) }}"
                                    class="cursor-pointer hover:underline">{{ $student->name }}</a>
                            </td>

                            <td class="px-2 py-1 border whitespace-nowrap">
                                @if ($student->class)
                                    <a href="{{ route('show.class', ['id' => $student->class->id, 'slug' => Str::slug($student->class->class_name)]) }}"
                                        class="cursor-pointer hover:underline">
                                        {{ $student->class->class_name }}
                                    </a>
                                @else
                                    <a href="{{ route('classes') }}" class="text-gray-500 italic hover:underline">-</a>
                                @endif
                            </td>

                            @foreach ($dateHeaders as $header)
                                @php $att = $student->attendanceData[$header['full']] ?? null; @endphp
                                @if ($att['type'] === 'holiday')
                                    <td class="px-1 py-1 bg-gray-100 text-xs text-red-600 font-bold">
                                        {{ $att['label'] }}
                                    </td>
                                @elseif ($att['type'] === 'record')
                                    <td class="px-1.5 py-1 border text-sm {{ $att['bgClass'] }}">
                                        @if (isset($att['display']['time_in']))
                                            <div>{{ $att['display']['time_in'] }}</div>
                                            @if ($att['display']['time_out'])
                                                <div class="text-gray-500 text-[10px]">{{ $att['display']['time_out'] }}
                                                </div>
                                            @endif
                                        @elseif (isset($att['display']['abbr']))
                                            <div class="font-bold">{{ $att['display']['abbr'] }}</div>
                                        @endif
                                    </td>
                                @else
                                    <td class="px-1.5 py-1 border text-sm">
                                        {{ $att['label'] }}
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
                <div class="flex gap-2"><span class="px-3 bg-red-200"></span>
                    <p>Alpha</p>
                </div>
                <div class="flex gap-2"><span class="px-3 bg-emerald-200"></span>
                    <p>Hadir</p>
                </div>
                <div class="flex gap-2"><span class="px-3 bg-blue-200"></span>
                    <p>Terlambat</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 bg-amber-200"></span>
                    <ul class="flex">
                        @foreach ($status as $s)
                            <li>{{ $s->status_name }}@if (!$loop->last),@endif</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex flex-col gap-1 ml-0 sm:ml-3">
                <h1 class="font-bold">Layout</h1>
                <div class="flex">
                    <div class="px-2 py-3 border w-max h-max text-center rounded-md">
                        <div> 07.00 </div>
                        <div class="text-gray-700 text-sm">15.30</div>
                    </div>
                    <div>
                        <div class="flex justify-center items-center"> <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10" viewBox="0 0 21 21">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.499 6.497L3.5 10.499l4 4.001m9-4h-13" />
                            </svg>
                            <p>Jam Masuk</p>
                        </div>
                        <div class="flex justify-center items-center -mt-3"> <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10" viewBox="0 0 21 21">
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
