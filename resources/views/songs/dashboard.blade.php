<x-layout>
    <x-slot:heading>
        Dashboard
    </x-slot:heading>
    <div class="max-w-screen-2xl mx-auto px-6 py-8">
        <!-- Page Header -->
        <div class="mb-8 animate-fade-up">
            <p class="text-xs font-display font-semibold text-indigo-500 uppercase tracking-widest mb-1">Overview</p>
            <h1 class="text-2xl font-display font-bold text-slate-800">All Songs</h1>
        </div>

        <div class="w-full h-px bg-gradient-to-r from-indigo-200 via-purple-100 to-transparent mb-8"></div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">

            <!-- Total Songs -->
            <div class="stat-card rounded-2xl p-5 card-glow animate-fade-up delay-1">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-lg">🎵</div>
                    <span class="badge text-xs font-semibold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">Total</span>
                </div>
                <p class="text-3xl font-display font-bold text-slate-800">{{ $totalSongs ?? 0 }}</p>
                <p class="text-sm text-slate-500 mt-1">Songs in library</p>
            </div>

            <!-- Total Artists -->
            <div class="stat-card rounded-2xl p-5 card-glow animate-fade-up delay-2">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-lg">🎤</div>
                    <span class="badge text-xs font-semibold text-purple-600 bg-purple-50 px-2 py-0.5 rounded-full">Artists</span>
                </div>
                <p class="text-3xl font-display font-bold text-slate-800">{{ $totalArtists ?? 0 }}</p>
                <p class="text-sm text-slate-500 mt-1">Unique artists</p>
            </div>

            <!-- Total Albums -->
            <div class="stat-card rounded-2xl p-5 card-glow animate-fade-up delay-3">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded-xl bg-pink-100 flex items-center justify-center text-lg">💿</div>
                    <span class="badge text-xs font-semibold text-pink-600 bg-pink-50 px-2 py-0.5 rounded-full">Genres</span>
                </div>
                <p class="text-3xl font-display font-bold text-slate-800">{{ $totalGenres ?? 0 }}</p>
                <p class="text-sm text-slate-500 mt-1">Genres catalogued</p>
            </div>

            <!-- Recently Added -->
            <div class="stat-card rounded-2xl p-5 card-glow animate-fade-up delay-4">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-lg">✨</div>
                    <span class="badge text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">New</span>
                </div>
                <p class="text-3xl font-display font-bold text-slate-800">{{ $recentCount ?? 0 }}</p>
                <p class="text-sm text-slate-500 mt-1">Added this month</p>
            </div>

        </div>

        <!-- Recent Songs Table -->
        <div class="bg-white rounded-2xl card-glow overflow-hidden animate-fade-up delay-2">

            <!-- Table Header -->
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="font-display font-bold text-slate-800 text-base">Recent Songs</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Latest additions to your library</p>
                </div>
                <a href="/songs"
                    class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800 flex items-center gap-1 transition-colors">
                    View all
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            @if(isset($songs) && $songs->count() > 0)
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50/70 text-slate-500 text-xs font-display font-semibold uppercase tracking-wider">
                        <th class="px-6 py-3 text-left hidden md:table-cell">#</th>
                        <th class="px-6 py-3 text-left">Title</th>
                        <th class="px-6 py-3 text-left hidden md:table-cell">Artist</th>
                        <th class="px-6 py-3 text-left hidden md:table-cell">Genre</th>
                        <th class="px-6 py-3 text-left hidden md:table-cell">Published</th>
                        <th class="px-6 py-3 text-left hidden md:table-cell">Added</th>
                        <th class="px-6 py-3 text-left hidden md:table-cell">Updated</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($songs as $song)
                    <tr class="table-row-hover">
                        <td class="px-6 py-4 text-slate-400 font-mono text-xs hidden md:table-cell">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center text-white text-xs font-bold shrink-0">
                                    {{ strtoupper(substr($song->title, 0, 1)) }}
                                </div>
                                <span class="font-medium text-slate-800">{{ $song->title }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600 hidden md:table-cell">{{ $song->artist }}</td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            @if($song->genre)
                            <span class="badge text-xs font-semibold px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-600">{{ $song->genre }}</span>
                            @else
                            <span class="text-slate-400">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-slate-400 text-xs hidden md:table-cell">{{ $song->published_date->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-slate-400 text-xs hidden md:table-cell">{{ $song->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-slate-500 hidden md:table-cell">{{ $song->updated_at->format('d M Y') ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
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
            @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center text-3xl mb-4">🎵</div>
                <h3 class="font-display font-bold text-slate-700 text-base mb-1">No songs yet</h3>
                <p class="text-sm text-slate-400 mb-5">Start building your music library</p>
                <a href="#"
                    class="btn-primary text-white text-sm font-semibold px-5 py-2 rounded-xl inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add first song
                </a>
            </div>
            @endif

        </div>

    </div>
</x-layout>