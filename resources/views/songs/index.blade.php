<x-layout>
    <x-slot:heading>
        Library
    </x-slot:heading>
    <div class="max-w-screen-2xl mx-auto px-6 py-8">

        <!-- Page Header -->
        <div class="flex items-start justify-between mb-8 animate-fade-up">
            <div>
                <p class="text-xs font-display font-semibold text-indigo-500 uppercase tracking-widest mb-1">Library</p>
                <h1 class="text-2xl font-display font-bold text-slate-800">Songs</h1>
            </div>
            <!-- Add Song Toggle Button -->
            <a href="/songs/create"
                class="btn-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl flex items-center gap-2 shadow-md">
                <svg id="addIcon" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span id="addBtnText">Add Song</span>
            </a>
        </div>

        <div class="w-full h-px bg-gradient-to-r from-indigo-200 via-purple-100 to-transparent mb-8"></div>

        <!-- Search Bar -->
        <div class="mb-5 animate-fade-up delay-1">
            <div class="relative max-w-sm">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" placeholder="Search songs, artists..."
                    oninput="filterTable()"
                    class="input-focus w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm bg-white text-slate-700 placeholder-slate-400 transition-all">
            </div>
        </div>

        <!-- Songs Table -->
        <div class="bg-white rounded-2xl card-glow overflow-hidden animate-fade-up delay-2">

            @if(isset($songs) && $songs->count() > 0)
            <table class="w-full text-sm" id="songsTable">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-500 text-xs font-display font-semibold uppercase tracking-wider border-b border-gray-100">
                        <th class="px-6 py-3.5 text-left">#</th>
                        <th class="px-6 py-3.5 text-left">Title</th>
                        <th class="px-6 py-3.5 text-left">Artist</th>
                        <th class="px-6 py-3.5 text-left">Genre</th>
                        <th class="px-6 py-3.5 text-left">Duration</th>
                        <th class="px-6 py-3.5 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($songs as $song)
                    <tr class="table-row-hover song-row">
                        <td class="px-6 py-4 text-slate-400 font-mono text-xs">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center text-white text-xs font-bold shrink-0">
                                    {{ strtoupper(substr($song->title, 0, 1)) }}
                                </div>
                                <span class="font-medium text-slate-800">{{ $song->title }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $song->artist }}</td>
                        <td class="px-6 py-4">
                            @if($song->genre)
                            <span class="badge text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-50 text-indigo-600">{{ $song->genre }}</span>
                            @else
                            <span class="text-slate-300">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-slate-500">{{ gmdate('i:s', $song->duration) ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1.5">
                                <a href="/songs/{{ $song->song_id }}"
                                    class="text-xs font-semibold text-gray-600 hover:text-gray-800 px-3 py-1.5 rounded-lg hover:bg-indigo-50 transition-all">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="/songs/{{ $song->song_id }}/edit"
                                    class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 px-3 py-1.5 rounded-lg hover:bg-indigo-50 transition-all">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="/songs/{{ $song->song_id }}/deactivate" method="POST"
                                    onsubmit="return confirm('Remove this song?')">
                                    @csrf
                                    <button type="submit"
                                        class="text-xs font-semibold text-red-500 hover:text-red-700 px-2.5 py-1 rounded-lg hover:bg-red-50 transition-all">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <!-- Pagination -->
        </div>
    </div>
    <script>
        function filterTable() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('.song-row');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        }
    </script>
</x-layout>