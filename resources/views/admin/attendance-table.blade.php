@foreach ($attendances as $attendance)
    <tr class="*:text-gray-900 *:first:font-medium">
        <td class="px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->student->absen }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->student->name }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->student->class->class_name }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->attendance_date }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->time_in ?? '-' }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $attendance->time_out ?? '-' }}</td>
        <td class="px-3 py-2 whitespace-nowrap rounded-lg">
            <span
                class="inline-flex items-center justify-center rounded-full px-2.5 py-0.5
                                    @if ($attendance->status?->id == 1) bg-red-100 text-red-700
                                    @elseif($attendance->status?->id == 2) bg-emerald-100 text-emerald-700
                                    @elseif($attendance->status?->id == 3) bg-blue-100 text-blue-700
                                    @else bg-amber-100 text-amber-700 @endif
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
                <button type="button" popovertarget="delete-attendance-{{ $attendance->id }}"
                    class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-100 hover:text-gray-900 focus:relative"
                    aria-label="View">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5">
                            <path d="M3 13c3.6-8 14.4-8 18 0" />
                            <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
                        </g>
                    </svg>
                </button>
            </span>

            <section popover id="edit-attendance-{{ $attendance->id }}"
                class="w-3/4 md:max-w-4xl md:w-1/4 sm:w-1/2 p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                <button type="button" popovertarget="edit-attendance-{{ $attendance->id }}" popovertargetaction="hide"
                    class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                </button>

                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit
                    Status Siswa
                </h2>
                <form action="{{ route('attendances.updateStatus', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="attendance_name">Nama
                                Status</label>
                            <select id="status"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
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
                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                            type="submit">Save</button>
                    </div>
                </form>
            </section>
        </td>
    </tr>
@endforeach
