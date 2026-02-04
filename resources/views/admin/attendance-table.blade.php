@if ($attendances->isEmpty())
    <tr>
        <td colspan="9" class="py-12 whitespace-nowrap">
            <div class="flex flex-col items-center justify-center text-center text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-25 h-25 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-800 mt-1">Belum ada siswa absen.</h2>
            </div>
        </td>
    </tr>
@endif
@foreach ($attendances as $attendance)
    <tr class="*:text-gray-900 *:first:font-medium">
        <td class="px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->student->name }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->student->class->class_name ?? '-' }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->attendance_date }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->time_in ?? '-' }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->time_out ?? '-' }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->device->location ?? '-' }}</td>
        <td class="px-3 py-2 whitespace-nowrap rounded-lg">
            <span
                class="inline-flex items-center justify-center rounded-full px-3 py-0.5 font-semibold
                                    @if ($attendance->status?->id == 1) bg-red-100 text-red-600
                                    @elseif($attendance->status?->id == 2) bg-emerald-100 text-emerald-600
                                    @elseif($attendance->status?->id == 3) bg-blue-100 text-blue-600
                                    @else bg-amber-100 text-amber-600 @endif
                                    ">{{ $attendance->status?->status_name }}</span>
        </td>
        <td class="px-3 py-2 whitespace-nowrap">
            <span
                class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                <button type="button" popovertarget="edit-attendance-{{ $attendance->id }}"
                    class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-100 hover:text-gray-900 focus:relative"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                            <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                        </g>
                    </svg>
                </button>
                <a href="{{ route('student.detail', [
                    'name' => Str::slug($attendance->student->name),
                    'id' => $attendance->student->id,
                ]) }}"
                    class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-100 hover:text-gray-900 focus:relative"
                    aria-label="View">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path d="M3 13c3.6-8 14.4-8 18 0" />
                            <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
                        </g>
                    </svg>
                </a>
            </span>

            <section popover id="edit-attendance-{{ $attendance->id }}">
                <div
                    class="fixed inset-0 z-50 min-h-screen w-full flex justify-center items-center py-10 px-4 bg-black/40 transition overflow-y-scroll">
                    <div class="w-3/4 md:max-w-4xl md:w-1/4 sm:w-1/2 p-6 m-auto bg-white rounded-md shadow-md z-10">
                        <div class="flex w-full justify-end">
                            <button type="button" popovertarget="edit-attendance-{{ $attendance->id }}"
                                popovertargetaction="hide"
                                class="cursor-pointer rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                <svg class="w-6 h-6 text-gray-800 hover:text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                </svg>
                            </button>
                        </div>

                        <h2 class="text-lg font-semibold text-gray-700 capitalize">Edit
                            Status Siswa
                        </h2>
                        <form action="{{ route('attendances.updateStatus', $attendance->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700" for="attendance_name">Nama
                                        Status</label>
                                    <select id="status"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                                        name="status" required>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}"
                                                {{ optional($attendance->status)->id == $status->id ? 'selected' : '' }}>
                                                {{ $status->status_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6 gap-3">
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
