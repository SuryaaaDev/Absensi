@extends('layout.app')

@section('navbar')
    @include('division.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-72 p-6">
        <div class="flex flex-wrap gap-3 justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Siswa</h1>

            <div class="relative w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
                <input type="text" id="searchInput" placeholder="Search"
                    class="w-full px-4 py-2 text-sm bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition placeholder:text-slate-400">

                <button id="clearSearch"
                    class="absolute right-10 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition hidden"
                    title="Hapus pencarian">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18M6 6l12 12" />
                    </svg>
                </button>

                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </span>
            </div>
        </div>

        @foreach ($groupedStudents as $className => $students)
            <h2 class="text-lg font-bold mt-6 mb-2">{{ $className }}</h2>
            <div class="w-full overflow-x-auto">
                <table class="w-full text-left border border-separate rounded border-slate-200 student-table" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="h-12 w-10 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                #</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Nama</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                NISN</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Kelas</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Email</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Divisi</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l border-slate-200 first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr x-data="{ editMode: false }" class="transition-colors duration-300 hover:bg-slate-50 bg-white">
                                <td
                                    class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $student['name'] }}</td>
                                <td
                                    class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $student['NISN'] ?? '-' }}</td>
                                <td
                                    class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $student['class']['class_name'] }}</td>
                                <td
                                    class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $student['email'] }}</td>
                                <td
                                    class="h-12 px-6 text-sm transition whitespace-nowrap duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    <div class="flex items-center gap-2">
                                        <div x-show="!editMode" class="flex items-center gap-2">
                                            <span class="text-sm text-slate-600">
                                                {{ $student['division']['division'] ?? '-' }}
                                            </span>
                                        </div>

                                        <form x-show="editMode" x-cloak
                                            action="{{ route('divisions.store', $student['id']) }}" method="POST"
                                            class="flex items-center gap-3">
                                            @csrf

                                            <input type="hidden" name="student_id" value="{{ $student['id'] }}">
                                            <div class="relative my-1.5">
                                                <select id="division" name="division" required
                                                    class="relative w-44 h-10 px-4 text-sm bg-white border rounded border-slate-200 text-slate-500 focus:border-indigo-500">
                                                    <option value="" disabled
                                                        {{ empty($student['division']['division']) ? 'selected' : '' }}>
                                                        -</option>
                                                    <option value="Web Development"
                                                        {{ ($student['division']['division'] ?? null) == 'Web Development' ? 'selected' : '' }}>
                                                        Web Development</option>
                                                    <option value="Aplikasi"
                                                        {{ ($student['division']['division'] ?? null) == 'Aplikasi' ? 'selected' : '' }}>
                                                        Aplikasi</option>
                                                    <option value="DKV"
                                                        {{ ($student['division']['division'] ?? null) == 'DKV' ? 'selected' : '' }}>
                                                        DKV</option>
                                                    <option value="SIoT"
                                                        {{ ($student['division']['division'] ?? null) == 'SIoT' ? 'selected' : '' }}>
                                                        SIoT</option>
                                                    <option value="Jaringan"
                                                        {{ ($student['division']['division'] ?? null) == 'Jaringan' ? 'selected' : '' }}>
                                                        Jaringan</option>
                                                </select>
                                            </div>
                                            <div class="flex gap-2">
                                                <button type="submit"
                                                    class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition">
                                                    Simpan
                                                </button>

                                                <button type="button" @click="editMode = false"
                                                    class="px-3 py-1.5 bg-slate-600 text-white text-sm rounded-lg hover:bg-slate-700 transition">
                                                    Batal
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 text-slate-500">
                                    <div class="flex items-center justify-center gap-2">

                                        <button type="button" @click="editMode = true"
                                            class="flex items-center justify-center p-2 rounded bg-indigo-50 text-indigo-600 hover:bg-indigo-100 hover:text-indigo-800 transition duration-200 shadow-sm cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Z" />
                                            </svg>
                                        </button>

                                        <a href="{{ route('division.show', [
                                            'id' => $student['id'],
                                            'name' => Str::slug($student['name']),
                                        ]) }}"
                                            class="flex items-center justify-center p-2 rounded bg-slate-50 text-slate-600 hover:bg-slate-100 hover:text-slate-800 transition duration-200 shadow-sm cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5">
                                                    <path
                                                        d="M21.544 11.045c.304.426.456.64.456.955c0 .316-.152.529-.456.955C20.178 14.871 16.689 19 12 19c-4.69 0-8.178-4.13-9.544-6.045C2.152 12.529 2 12.315 2 12c0-.316.152-.529.456-.955C3.822 9.129 7.311 5 12 5c4.69 0 8.178 4.13 9.544 6.045" />
                                                    <path d="M15 12a3 3 0 1 0-6 0a3 3 0 0 0 6 0" />
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="transition-colors duration-300 hover:bg-slate-50">
                                <td colspan="6"
                                    class="h-12 px-6 text-center text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    Belum ada data siswa untuk kelas X SIJA A atau X SIJA B.</td>
                            </tr>
                        @endforelse

                        <tr class="noResultMessage hidden">
                            <td colspan="7"
                                class="h-12 px-6 text-center text-sm border-t border-slate-200 text-slate-500 italic bg-white">
                                Tidak ada hasil ditemukan.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const searchInput = document.getElementById("searchInput");
            const clearBtn = document.getElementById("clearSearch");
            const tables = document.querySelectorAll(".student-table");

            function resetView() {
                tables.forEach(table => {
                    const rows = table.querySelectorAll("tbody tr:not(.noResultMessage)");
                    rows.forEach(row => row.style.display = "");
                    table.parentElement.previousElementSibling.style.display = "";
                    table.style.display = "";
                    table.querySelector(".noResultMessage").classList.add("hidden");
                });
            }

            searchInput.addEventListener("keyup", function() {
                const searchTerm = this.value.toLowerCase().trim();
                clearBtn.classList.toggle("hidden", searchTerm === "");

                if (!searchTerm) {
                    resetView();
                    return;
                }

                let totalVisible = 0;

                tables.forEach(table => {
                    const rows = table.querySelectorAll("tbody tr:not(.noResultMessage)");
                    const noResultRow = table.querySelector(".noResultMessage");
                    let visibleCount = 0;

                    rows.forEach(row => {
                        const text = row.innerText.toLowerCase();
                        if (text.includes(searchTerm)) {
                            row.style.display = "";
                            visibleCount++;
                            totalVisible++;
                        } else {
                            row.style.display = "none";
                        }
                    });

                    if (visibleCount === 0) {
                        noResultRow.classList.remove("hidden");
                    } else {
                        noResultRow.classList.add("hidden");
                    }
                });
            });

            clearBtn.addEventListener("click", () => {
                searchInput.value = "";
                clearBtn.classList.add("hidden");
                resetView();
            });
        });
    </script>
@endsection
