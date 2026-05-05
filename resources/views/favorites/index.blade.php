<x-layout>
    <x-slot:heading>
        Favorites
    </x-slot:heading>
    @push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Mono:wght@400;500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --amber: #f59e0b;
            --amber-lt: #fef3c7;
            --rose: #fb7185;
            --ink: #1c1917;
            --ink-2: #292524;
            --muted: #78716c;
            --rule: rgba(28, 25, 23, 0.08);
            --card-bg: #fffbf7;
        }

        body {
            background: #faf8f5;
        }

        .font-serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        .font-mono {
            font-family: 'DM Mono', monospace;
        }

        .font-sans {
            font-family: 'DM Sans', sans-serif;
        }

        /* ── Page masthead ── */
        .masthead {
            background: var(--ink);
            position: relative;
            overflow: hidden;
        }

        .masthead::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 100% 50%, rgba(245, 158, 11, .12) 0%, transparent 60%),
                radial-gradient(ellipse 50% 80% at 0% 80%, rgba(251, 113, 133, .08) 0%, transparent 55%);
            pointer-events: none;
        }

        /* Decorative large text watermark */
        .masthead-watermark {
            position: absolute;
            right: -2rem;
            top: 50%;
            transform: translateY(-50%);
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 14rem;
            line-height: 1;
            color: rgba(255, 255, 255, .03);
            user-select: none;
            pointer-events: none;
            white-space: nowrap;
        }

        /* ── Stat chips ── */
        .stat-chip {
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 999px;
            padding: .35rem 1rem;
            font-family: 'DM Mono', monospace;
            font-size: .7rem;
            color: rgba(255, 255, 255, .55);
            letter-spacing: .04em;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .stat-chip strong {
            color: rgba(255, 255, 255, .9);
            font-size: .85rem;
        }

        /* ── Sort / filter bar ── */
        .toolbar {
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .sort-btn {
            font-family: 'DM Sans', sans-serif;
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .05em;
            text-transform: uppercase;
            color: var(--muted);
            padding: .4rem .85rem;
            border: 1px solid var(--rule);
            border-radius: 999px;
            background: white;
            cursor: pointer;
            transition: all .15s;
            display: inline-flex;
            align-items: center;
            gap: .35rem;
        }

        .sort-btn.active,
        .sort-btn:hover {
            background: var(--ink);
            color: white;
            border-color: var(--ink);
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 280px;
        }

        .search-box input {
            width: 100%;
            padding: .45rem .85rem .45rem 2.25rem;
            border: 1px solid var(--rule);
            border-radius: 999px;
            font-family: 'DM Sans', sans-serif;
            font-size: .78rem;
            background: white;
            color: var(--ink);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .search-box input:focus {
            border-color: var(--amber);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .12);
        }

        .search-box svg {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            width: 14px;
            height: 14px;
            pointer-events: none;
        }

        /* ── Song cards — grid view ── */
        .song-card {
            background: var(--card-bg);
            border: 1px solid var(--rule);
            border-radius: 1rem;
            overflow: hidden;
            transition: transform .2s ease, box-shadow .2s ease;
            position: relative;
        }

        .song-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 36px rgba(28, 25, 23, .1);
        }

        .song-card-art {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 3.5rem;
            color: rgba(255, 255, 255, .85);
            text-shadow: 0 4px 16px rgba(0, 0, 0, .25);
        }

        .song-card-art::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40%;
            background: linear-gradient(to top, rgba(0, 0, 0, .3), transparent);
        }

        /* Heart Icon Decoration*/
        .heart-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 1rem;
            background: linear-gradient(135deg, #fb7185, #f59e0b);
            box-shadow: 0 8px 24px rgba(251, 113, 133, .35);
        }

        /* Heart toggle button */
        .heart-btn {
            position: absolute;
            top: .65rem;
            right: .65rem;
            z-index: 10;
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, .15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all .2s;
            color: white;
        }

        .heart-btn:hover,
        .heart-btn.active {
            background: white;
            color: var(--rose);
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(251, 113, 133, .35);
        }

        .heart-btn.active svg {
            fill: var(--rose);
        }

        .song-card-body {
            padding: .85rem 1rem;
        }

        .song-card-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--ink);
            line-height: 1.25;
            margin-bottom: .2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .song-card-meta {
            font-family: 'DM Sans', sans-serif;
            font-size: .72rem;
            color: var(--muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .song-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .6rem 1rem;
            border-top: 1px solid var(--rule);
            background: rgba(28, 25, 23, .02);
        }

        .genre-dot {
            font-family: 'DM Mono', monospace;
            font-size: .62rem;
            letter-spacing: .06em;
            color: var(--amber);
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .genre-dot::before {
            content: '';
            display: inline-block;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--amber);
        }

        /* ── Song rows — list view ── */
        .song-row {
            display: flex;
            align-items: center;
            padding: .85rem 1.25rem;
            border-bottom: 1px solid var(--rule);
            background: white;
            transition: background .15s;
            gap: 1rem;
        }

        .song-row:first-child {
            border-radius: .75rem .75rem 0 0;
        }

        .song-row:last-child {
            border-radius: 0 0 .75rem .75rem;
            border-bottom: none;
        }

        .song-row:only-child {
            border-radius: .75rem;
        }

        .song-row:hover {
            background: #fffbf4;
        }

        .song-row-num {
            font-family: 'DM Mono', monospace;
            font-size: .7rem;
            color: var(--muted);
            width: 1rem;
            text-align: right;
            shrink: 0;
        }

        .song-row-art {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: .5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, .9);
            flex-shrink: 0;
        }

        .song-row-info {
            flex: 1;
            min-width: 0;
        }

        .song-row-title {
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: .875rem;
            color: var(--ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .song-row-sub {
            font-size: .72rem;
            color: var(--muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .song-row-duration {
            font-family: 'DM Mono', monospace;
            font-size: .7rem;
            color: var(--muted);
            flex-shrink: 0;
        }

        .song-row-actions {
            display: flex;
            gap: .35rem;
            flex-shrink: 0;
        }

        .row-action-btn {
            width: 1.75rem;
            height: 1.75rem;
            border-radius: .4rem;
            border: 1px solid var(--rule);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            cursor: pointer;
            background: white;
            transition: all .15s;
        }

        .row-action-btn:hover {
            background: var(--ink);
            color: white;
            border-color: var(--ink);
        }

        .row-action-btn.remove:hover {
            background: #fee2e2;
            color: #ef4444;
            border-color: #fecaca;
        }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            font-family: 'DM Sans', sans-serif;
        }

        .empty-heart {
            width: 5rem;
            height: 5rem;
            border-radius: 1.25rem;
            background: linear-gradient(135deg, #fee2e2, #fef3c7);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.25rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 24px rgba(251, 113, 133, .15);
        }

        /* ── Animations ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim {
            animation: fadeUp .45s ease forwards;
            opacity: 0;
        }

        .d1 {
            animation-delay: .05s;
        }

        .d2 {
            animation-delay: .1s;
        }

        .d3 {
            animation-delay: .15s;
        }

        .d4 {
            animation-delay: .2s;
        }

        .d5 {
            animation-delay: .25s;
        }

        /* Grid / list toggle */
        #grid-view {
            display: grid;
        }

        #list-view {
            display: none;
        }

        body.list-mode #grid-view {
            display: none;
        }

        body.list-mode #list-view {
            display: block;
        }

        .view-btn {
            transition: all .15s;
        }

        .view-btn.active {
            background: var(--ink);
            color: white;
        }
    </style>
    @endpush

    @section('content')

    {{-- ══ MASTHEAD ══ --}}
    <div class="masthead">
        <div class="masthead-watermark">♥</div>
        <div class="max-w-screen-2xl mx-auto px-6 py-10 relative z-10">
            <div class="flex flex-col sm:flex-row sm:items-end gap-6 justify-between">

                <div class="anim d1">
                    <div class="heart-icon mb-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </div>
                    <p class="text-xs font-mono text-amber-400/70 uppercase tracking-widest mb-1">Your collection</p>
                    <h1 class="font-serif text-white leading-none"
                        style="font-size: clamp(2.5rem,6vw,4rem);">Favorites
                        @if(isset($genreTitle))
                        <span class="text-4xl md:text-5xl font-serif"> - {{ $genreTitle }}</span>
                        @endif
                    </h1>
                </div>

                <!-- Stats row -->
                <div class="flex flex-wrap gap-2 anim d2 pb-1">
                    <div class="stat-chip">
                        <strong>{{ $favorites->count() }}</strong> songs
                    </div>
                    @if($favorites->count() > 0)
                    <div class="stat-chip">
                        <strong>{{ $favorites->unique('artist')->count() }}</strong> artists
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- == TAB BAR == --}}

    <div class="max-w-screen-2xl mx-auto px-6 border-b-2 border-b-gray-200 flex items-center gap-8 overflow-x-auto">
        <x-genre href="/favorites" :active="request()->is('favorites')">All</x-genre>
        @foreach($allFavGenre as $genre)
        <x-genre href="/favorites/{{ $genre }}" :active="request()->is('favorites/' . $genre)">
            {{ $genre }}
        </x-genre>
        @endforeach
    </div>

    {{-- ══ MAIN CONTENT ══ --}}
    <div class="max-w-screen-2xl mx-auto px-6 py-8">

        @if($favorites->count() > 0)

        {{-- Toolbar --}}
        <div class="toolbar mb-6 anim d2">

            <!-- Search -->
            <div class="search-box">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="favSearch" placeholder="Search favorites…" oninput="filterFavs()">
            </div>

            <!-- Sort -->
            <div class="flex gap-1.5 ml-auto flex-wrap">
                <button class="sort-btn active" onclick="sortFavs('title', this)">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M3 8h12M3 12h8" />
                    </svg>
                    Title
                </button>
                <button class="sort-btn" onclick="sortFavs('artist', this)">Artist</button>
                <button class="sort-btn" onclick="sortFavs('publish', this)">Publish</button>
                <button class="sort-btn" onclick="sortFavs('recent', this)">Recent</button>
            </div>

            <!-- View toggle -->
            <div class="flex gap-1 border border-[var(--rule)] rounded-lg p-0.5 bg-white ml-1">
                <button id="btn-grid" class="view-btn active p-1.5 rounded-md" onclick="setView('grid')" title="Grid view">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </button>
                <button id="btn-list" class="view-btn p-1.5 rounded-md" onclick="setView('list')" title="List view">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- ── GRID VIEW ── --}}
        <div id="grid-view"
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 anim d3"
            data-songs="{{ $favorites->map(fn($s) => ['id'=>$s->id,'title'=>$s->title,'artist'=>$s->artist,'album'=>$s->album,'genre'=>$s->genre,'year'=>$s->year,'duration'=>$s->duration,'added'=>$s->pivot->created_at ?? $s->created_at])->toJson() }}">

            @foreach($favorites as $i => $song)
            <div class="song-card fav-item"
                data-title="{{ strtolower($song->title) }}"
                data-artist="{{ strtolower($song->artist) }}"
                data-genre="{{ strtolower($song->genre ?? '') }}"
                data-publish="{{ $song->published_date }}"
                data-added="{{ $song->pivot->created_at ?? $song->created_at }}">

                <!-- Art -->
                <div class="song-card-art">
                    <form method="post" action="/songs/{{ $song->song_id }}/removeFromFavorite">
                        @csrf @method('PATCH')
                        <button class="heart-btn active"
                            type="submit"
                            title="Remove from favorites">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                        </button>
                    </form>
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $song->img_path) }}" alt="">
                </div>

                <!-- Body -->
                <a href="/songs/{{ $song->song_id}}" class="block">
                    <div class="song-card-body">
                        <p class="song-card-title">{{ $song->title }}</p>
                        <p class="song-card-meta">{{ $song->artist }}</p>
                    </div>
                    <div class="song-card-footer">
                        @if($song->genre)
                        <span class="genre-dot">{{ $song->genre }}</span>
                        @else
                        <span></span>
                        @endif
                        @if($song->year)
                        <span class="font-mono text-[var(--muted)]" style="font-size:.65rem;">{{ $song->year }}</span>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- ── LIST VIEW ── --}}
        <div id="list-view" class="rounded-xl overflow-hidden border border-[var(--rule)] anim d3">
            @foreach($favorites as $i => $song)
            <div class="song-row fav-item"
                data-title="{{ strtolower($song->title) }}"
                data-artist="{{ strtolower($song->artist) }}"
                data-genre="{{ strtolower($song->genre ?? '') }}"
                data-publish="{{ $song->published_date }}"
                data-added="{{ $song->pivot->created_at ?? $song->created_at }}">

                <span class="song-row-num">{{ $loop->iteration }}</span>

                <div class="song-row-info">
                    <a href="/songs/{{ $song->id }}"
                        class="song-row-title hover:text-amber-600 transition-colors">{{ $song->title }}</a>
                    <p class="song-row-sub">{{ $song->artist }}</p>
                </div>

                @if($song->genre)
                <span class="genre-dot hidden sm:flex">{{ $song->genre }}</span>
                @endif

                @if($song->duration)
                <span class="song-row-duration hidden md:block">{{ $song->formatted_duration }}</span>
                @endif

                <div class="song-row-actions">
                    <a href="/songs/{{ $song->song_id }}" class="row-action-btn" title="View">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                    <a href="/songs/{{ $song->song_id }}/edit" class="row-action-btn" title="Edit">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Result count --}}
        <p id="resultCount" class="text-xs text-[var(--muted)] font-mono mt-4 anim d4">
            Showing {{ $favorites->count() }} songs
        </p>

        @else

        {{-- ── EMPTY STATE ── --}}
        <div class="empty-state anim d2">
            <div class="empty-heart">♡</div>
            <h2 class="font-serif text-[var(--ink)] text-2xl mb-2">No favorites yet</h2>
            <p class="text-[var(--muted)] text-sm mb-6 max-w-xs mx-auto">
                Start adding songs to your favorites — just tap the heart on any song.
            </p>
            <a href="{{ route('songs.index') }}"
                class="inline-flex items-center gap-2 bg-[var(--ink)] text-white text-sm font-sans font-semibold px-5 py-2.5 rounded-xl hover:bg-[var(--ink-2)] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                </svg>
                Browse Songs
            </a>
        </div>

        @endif

    </div>

    <script>
        // ── View toggle ──────────────────────────────────
        function setView(mode) {
            document.body.classList.toggle('list-mode', mode === 'list');
            document.getElementById('btn-grid').classList.toggle('active', mode === 'grid');
            document.getElementById('btn-list').classList.toggle('active', mode === 'list');
        }

        // ── Search ───────────────────────────────────────
        function filterFavs() {
            applyFilters();
        }

        function applyFilters() {
            const q = document.getElementById('favSearch').value.toLowerCase();
            let visible = 0;
            document.querySelectorAll('.fav-item').forEach(el => {
                const title = el.dataset.title || '';
                const artist = el.dataset.artist || '';
                const show = !q || title.includes(q) || artist.includes(q);
                el.style.display = show ? '' : 'none';
                if (show && el.closest('#grid-view')) visible++;
            });
            const rc = document.getElementById('resultCount');
            if (rc) rc.textContent = `Showing ${visible} song${visible !== 1 ? 's' : ''}`;
        }

        // ── Sort ─────────────────────────────────────────
        function sortFavs(by, btn) {
            document.querySelectorAll('.sort-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const sortInContainer = (containerId) => {
                const container = document.getElementById(containerId);
                if (!container) return;
                const items = [...container.querySelectorAll('.fav-item')];
                items.sort((a, b) => {
                    console.log(b.dataset);
                    if (by === 'title') return a.dataset.title.localeCompare(b.dataset.title);
                    if (by === 'artist') return a.dataset.artist.localeCompare(b.dataset.artist);
                    if (by === 'publish') return new Date(b.dataset.publish) - new Date(a.dataset.publish)
                    if (by === 'recent') return new Date(b.dataset.added) - new Date(a.dataset.added);
                    return 0;
                });
                items.forEach(item => container.appendChild(item));
            };

            sortInContainer('grid-view');
            sortInContainer('list-view');

            // Re-number list view
            document.querySelectorAll('#list-view .song-row-num').forEach((el, i) => {
                el.textContent = i + 1;
            });
        }

        function updateStatChips() {
            const total = document.querySelectorAll('.fav-item').length;
            const chips = document.querySelectorAll('.stat-chip strong');
            if (chips[0]) chips[0].textContent = total;
        }
    </script>
</x-layout>