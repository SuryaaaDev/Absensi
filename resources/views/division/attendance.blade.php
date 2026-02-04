@extends('layout.app')

@section('navbar')
    @include('division.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-72 p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Rekap Absensi Divisi (Sabtu)</h1>

        <div class="flex flex-col sm:flex-row gap-2 justify-between items-center mb-6">
            <form method="GET" action="{{ route('attendance.monthly.division') }}">
                <label for="month" class="mr-2 font-medium text-gray-600">Pilih Bulan:</label>
                <select id="month" name="month" onchange="this.form.submit()"
                    class="px-3 py-2 border rounded-lg focus:ring focus:ring-indigo-300 text-sm">
                    @foreach ($availableMonths as $m)
                        <option value="{{ $m['value'] }}" {{ $m['value'] == $currentMonth ? 'selected' : '' }}>
                            {{ $m['label'] }}
                        </option>
                    @endforeach
                </select>
            </form>

            <p class="hidden md:flex text-gray-500 text-sm">
                Menampilkan absensi bulan:
                <span
                    class="font-semibold text-indigo-600">{{ \Carbon\Carbon::parse($currentMonth . '-01')->translatedFormat('F Y') }}</span>
            </p>
        </div>

        <div x-data="{ tab: '{{ $classes->first()->id ?? '' }}' }">
            <div class="flex justify-center mb-6 space-x-2">
                @foreach ($classes as $class)
                    <button @click="tab = '{{ $class->id }}'"
                        class="px-4 py-2 rounded-lg text-sm font-semibold transition"
                        :class="tab === '{{ $class->id }}'
                            ?
                            'bg-indigo-600 text-white shadow' :
                            'bg-gray-100 text-gray-600 hover:bg-gray-200'">
                        {{ $class->class_name }}
                    </button>
                @endforeach
            </div>

            @foreach ($classes as $class)
                <div x-show="tab === '{{ $class->id }}'" x-transition>
                    <h2 class="text-xl font-semibold mb-4 text-indigo-600">
                        {{ $class->class_name }}
                    </h2>

                    <div class="w-full overflow-x-auto">
                        <table class="w-full text-left border border-separate rounded border-slate-200" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="h-12 w-10 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                        #</th>
                                    <th scope="col"
                                        class="h-12 w-10 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                        Nama</th>
                                    <th scope="col"
                                        class="h-12 w-10 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                        No Absen</th>
                                    <th scope="col"
                                        class="h-12 w-10 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                        Divisi</th>
                                    @foreach ($dateHeaders as $date)
                                        @if ($date['is_saturday'])
                                            <th scope="col"
                                                class="h-12 w-10 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                                <div class="flex flex-col items-center">
                                                    <span>{{ $date['day'] }}</span>
                                                    <span class="text-xs">{{ $date['dow'] }}</span>
                                                </div>
                                            </th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students->where('class_id', $class->id) as $student)
                                    <tr class="transition-colors duration-300 hover:bg-slate-50 bg-white">
                                        <td
                                            class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                            {{ $loop->iteration }}</td>
                                        <td
                                            class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                            {{ $student->name }}</td>
                                        <td
                                            class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                            {{ $student->absen }}</td>
                                        <td
                                            class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                            {{ $student->division?->division ?? '-' }}</td>
                                        @foreach ($dateHeaders as $date)
                                            @if ($date['is_saturday'])
                                                @php
                                                    $attendance = $student->attendanceData[$date['full']] ?? null;
                                                @endphp
                                                <td
                                                    class="h-16 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                                    @if ($attendance && $attendance['type'] === 'record')
                                                        <div class="flex flex-col items-center">
                                                            @if (!empty($attendance['display']['time_in']))
                                                                <span
                                                                    class="px-2 py-1 mb-1 rounded text-xs font-semibold {{ $attendance['bgClass'] }}">
                                                                    IN : {{ $attendance['display']['time_in'] }}
                                                                </span>
                                                            @endif

                                                            @if (!empty($attendance['display']['time_out']))
                                                                <span
                                                                    class="px-2 py-1 rounded text-xs font-semibold {{ $attendance['bgClass'] }}">
                                                                    OUT : {{ $attendance['display']['time_out'] }}
                                                                </span>
                                                            @endif

                                                            @if (
                                                                !empty($attendance['display']['abbr']) &&
                                                                    empty($attendance['display']['time_in']) &&
                                                                    empty($attendance['display']['time_out']))
                                                                <span
                                                                    class="px-2 py-1 rounded text-xs font-semibold {{ $attendance['bgClass'] }}">
                                                                    {{ $attendance['display']['abbr'] }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="text-gray-400 text-center">-</span>
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ 3 + count($dateHeaders->where('is_saturday')) }}"
                                            class="h-12 px-6 text-sm text-center text-gray-500 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 bg-white">
                                            Tidak ada data siswa di kelas ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
