@push('styles')
<style>
    .hero-bg {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #0f172a 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-bg::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 60% 50% at 70% 50%, rgba(99, 102, 241, 0.18) 0%, transparent 70%),
            radial-gradient(ellipse 40% 60% at 20% 80%, rgba(139, 92, 246, 0.12) 0%, transparent 60%);
        pointer-events: none;
    }

    .hero-bg::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%236366f1' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
    }

    .album-art {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
        box-shadow:
            0 0 0 1px rgba(255, 255, 255, 0.08),
            0 20px 60px rgba(99, 102, 241, 0.4),
            0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .album-art-letter {
        font-family: 'Syne', sans-serif;
        font-weight: 800;
        font-size: 5rem;
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        line-height: 1;
        user-select: none;
    }

    .vinyl-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .genre-pill {
        background: rgba(99, 102, 241, 0.15);
        border: 1px solid rgba(99, 102, 241, 0.3);
        color: #a5b4fc;
        font-family: 'Syne', sans-serif;
        font-weight: 600;
        letter-spacing: 0.06em;
        font-size: 0.7rem;
        text-transform: uppercase;
    }

    .stat-block {
        border-left: 1px solid rgba(255, 255, 255, 0.07);
    }

    .stat-block:first-child {
        border-left: none;
    }

    .detail-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        backdrop-filter: blur(12px);
    }

    .detail-row {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .action-btn {
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: rgba(255, 255, 255, 0.75);
        transition: all 0.2s ease;
        font-family: 'Syne', sans-serif;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.04em;
    }

    .action-btn:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateY(-1px);
    }

    .action-btn-danger {
        border-color: rgba(239, 68, 68, 0.3);
        color: rgba(252, 165, 165, 0.85);
    }

    .action-btn-danger:hover {
        background: rgba(239, 68, 68, 0.1);
        border-color: rgba(239, 68, 68, 0.5);
        color: #fca5a5;
    }

    .action-btn-primary {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-color: transparent;
        color: white;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
    }

    .action-btn-primary:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: transparent;
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
        transform: translateY(-1px);
    }

    .waveform-bar {
        background: rgba(99, 102, 241, 0.35);
        border-radius: 2px;
        animation: wave 1.2s ease-in-out infinite alternate;
    }

    @keyframes wave {
        0% {
            transform: scaleY(0.4);
            opacity: 0.5;
        }

        100% {
            transform: scaleY(1);
            opacity: 1;
        }
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-up-1 {
        animation: fadeSlideUp 0.5s ease forwards;
    }

    .fade-up-2 {
        animation: fadeSlideUp 0.5s 0.08s ease forwards;
        opacity: 0;
    }

    .fade-up-3 {
        animation: fadeSlideUp 0.5s 0.16s ease forwards;
        opacity: 0;
    }

    .fade-up-4 {
        animation: fadeSlideUp 0.5s 0.24s ease forwards;
        opacity: 0;
    }

    .related-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        transition: all 0.2s ease;
    }

    .related-card:hover {
        background: rgba(99, 102, 241, 0.08);
        border-color: rgba(99, 102, 241, 0.25);
        transform: translateY(-2px);
    }
</style>
@endpush
<x-layout>
    <x-slot:heading>
        View
    </x-slot:heading>
    {{-- ══ HERO ══ --}}
    <div class="hero-bg">
        <div class="max-w-screen-2xl mx-auto px-6 py-12 md:py-16 relative z-10">

            <!-- Back link -->
            <a href="/songs"
                class="absolute z-10 top-5 inline-flex items-center gap-1.5 text-md text-slate-400 hover:text-white transition-colors mb-8 group fade-up-1">
                <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back
            </a>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-12">

                {{-- Album Art --}}
                <div class="album-art w-44 h-44 md:w-52 md:h-52 rounded-2xl flex items-center justify-center relative shrink-0 fade-up-1 border border-gray-500">
                    <!-- Vinyl rings decoration -->
                    <div class="vinyl-ring" style="width:130%;height:130%;top:-15%;left:-15%;"></div>
                    <div class="vinyl-ring" style="width:160%;height:160%;top:-30%;left:-30%;"></div>
                    <div class="vinyl-ring" style="width:190%;height:190%;top:-45%;left:-45%;"></div>
                    <img class="relative z-10 object-cover h-[95%] w-[95%] rounded-xl" src="{{ asset('storage/' . $song->img_path) }}" alt="SongCover">
                </div>
                {{-- Song Info --}}
                <div class="flex-1 min-w-0">

                    <!-- Genre pill -->
                    @if($song->genre)
                    <span class="genre-pill inline-block px-3 py-1 rounded-full mb-3 fade-up-2">{{ $song->genre }}</span>
                    @endif

                    <!-- Title -->
                    <h1 class="font-display font-extrabold text-white leading-none mb-2 fade-up-2"
                        style="font-size: clamp(2rem, 5vw, 3.5rem); font-family: 'Syne', sans-serif;">
                        {{ $song->title }}
                    </h1>

                    <!-- Artist -->
                    <p class="text-slate-300 text-lg font-medium mb-1 fade-up-3">{{ $song->artist }}</p>
                </div>

                {{-- Stats row --}}
                <section class="flex flex-col gap-5">
                    <form method="POST" action="/songs/{{ $song->song_id }}/addToFavorite">
                        @csrf
                        @method('PATCH')
                        @if($song->is_favorite)
                        <button class="ms-5 cursor-pointer action-btn action-btn-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-xl">
                            <i class="fa-solid fa-star" style="color: yellow;"></i>
                            Added to favorite
                        </button>
                        @else
                        <button class="ms-5 cursor-pointer action-btn action-btn-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-xl" type="submit">
                            <i class="fa-solid fa-star" style="color: rgb(30, 48, 80);"></i> Add to favorite
                        </button>
                        @endif
                    </form>
                    <div class="flex items-center flex-wrap gap-0 fade-up-4">
                        @if($song->year)
                        <div class="pr-6 stat-block">
                            <p class="text-xs text-slate-500 uppercase tracking-widest font-display font-semibold mb-0.5">Year</p>
                            <p class="text-white font-display font-bold text-lg">{{ $song->year }}</p>
                        </div>
                        @endif

                        @if($song->duration)
                        <div class="px-6 stat-block">
                            <p class="text-xs text-slate-500 uppercase tracking-widest font-display font-semibold mb-0.5">Duration</p>
                            <p class="text-white font-display font-bold text-lg">{{ gmdate('i:s', $song->duration)  }}</p>
                        </div>
                        @endif

                        <div class="{{ ($song->year || $song->duration) ? 'px-6' : 'pr-6' }} stat-block">
                            <p class="text-xs text-slate-500 uppercase tracking-widest font-display font-semibold mb-0.5">Added</p>
                            <p class="text-white font-display font-bold text-lg">{{ $song->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </section>
            </div>

            {{-- Action Buttons (desktop) --}}
            <div class="hidden md:flex gap-2 shrink-0 fade-up-3 mt-10">
                <a href="/songs/{{ $song->song_id }}/edit"
                    class="action-btn action-btn-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-xl">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Song
                </a>
                <form action="/songs/{{ $song->song_id }}/deactivate" method="POST"
                    onsubmit="return confirm('Remove \'{{ addslashes($song->title) }}\'? This cannot be undone.')">
                    @csrf
                    <button type="submit"
                        class="action-btn cursor-pointer action-btn-danger w-full inline-flex items-center gap-2 px-5 py-2.5 rounded-xl">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Remove
                    </button>
                </form>
            </div>

        </div>
    </div>
    </div>

    {{-- ═══════════════════════════════════════════ BODY CONTENT ══ --}}
    <div class="bg-[#0f172a] min-h-screen">
        <div class="max-w-screen-2xl mx-auto px-6 py-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ── Left col: Details + Notes ── --}}
                <div class="lg:col-span-2 space-y-5">

                    {{-- Song Details Card --}}
                    <div class="detail-card rounded-2xl overflow-hidden fade-up-2">
                        <div class="px-6 py-4 border-b border-white/5">
                            <h2 class="font-display font-bold text-white text-sm tracking-wide flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                </svg>
                                Song Details
                            </h2>
                        </div>
                        <div class="divide-y divide-white/5">

                            <div class="detail-row px-6 py-4 flex items-center justify-between">
                                <span class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest">Title</span>
                                <span class="text-white font-medium text-sm">{{ $song->title }}</span>
                            </div>

                            <div class="detail-row px-6 py-4 flex items-center justify-between">
                                <span class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest">Artist</span>
                                <span class="text-white font-medium text-sm">{{ $song->artist }}</span>
                            </div>
                            <div class="detail-row px-6 py-4 flex items-center justify-between">
                                <span class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest">Genre</span>
                                @if($song->genre)
                                <span class="genre-pill px-2.5 py-0.5 rounded-full">{{ $song->genre }}</span>
                                @else
                                <span class="text-slate-600 italic text-sm">—</span>
                                @endif
                            </div>

                            <div class="detail-row px-6 py-4 flex items-center justify-between">
                                <span class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest">Year</span>
                                <span class="text-sm {{ $song->published_date ? 'text-white font-medium' : 'text-slate-600 italic' }}">
                                    {{ $song->published_date->format('d M Y') ?? '—' }}
                                </span>
                            </div>

                            <div class="detail-row px-6 py-4 flex items-center justify-between">
                                <span class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest">Duration</span>
                                <span class="text-sm {{ $song->duration ? 'text-white font-mono font-medium' : 'text-slate-600 italic' }}">
                                    {{ $song->formatted_duration }}
                                </span>
                            </div>

                        </div>
                    </div>

                    {{-- Description Card --}}
                    <div class="detail-card rounded-2xl overflow-hidden fade-up-3">
                        <div class="px-6 py-4 border-b border-white/5">
                            <h2 class="font-display font-bold text-white text-sm tracking-wide flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                Description
                            </h2>
                        </div>
                        <div class="px-6 py-5">
                            @if($song->description)
                            <p class="text-slate-300 text-sm leading-relaxed">{{ $song->description }}</p>
                            @else
                            <p class="text-slate-600 italic text-sm">No description added for this song.</p>
                            @endif
                        </div>
                    </div>

                    {{-- Mobile Action Buttons --}}
                    <div class="flex w-full gap-3 justify-between md:hidden fade-up-4">
                        <a href="/songs/{{ $song->song_id }}/edit"
                            class="w-full action-btn action-btn-primary flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="/songs/{{ $song->song_id }}/deactivate" method="POST" class="block"
                            onsubmit="return confirm('Remove this song?')">
                            @csrf
                            <button type="submit"
                                class="w-fit action-btn action-btn-danger inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Remove
                            </button>
                        </form>
                    </div>

                </div>

                {{-- ── Right col: Meta + Related ── --}}
                <div class="space-y-5">

                    {{-- Record Meta --}}
                    <div class="detail-card rounded-2xl overflow-hidden fade-up-2">
                        <div class="px-6 py-4 border-b border-white/5">
                            <h2 class="font-display font-bold text-white text-sm tracking-wide flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Record Info
                            </h2>
                        </div>
                        <div class="px-6 py-5 space-y-4">
                            <div>
                                <p class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest mb-1">Song ID</p>
                                <p class="text-white font-mono text-sm">#{{ $song->song_id }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest mb-1">Added on</p>
                                <p class="text-white text-sm">{{ $song->created_at->format('d M Y') }}</p>
                                <p class="text-slate-500 text-xs">{{ $song->created_at->format('g:i A') }} · {{ $song->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-display font-semibold text-slate-500 uppercase tracking-widest mb-1">Last updated</p>
                                <p class="text-white text-sm">{{ $song->updated_at->format('d M Y') }}</p>
                                <p class="text-slate-500 text-xs">{{ $song->updated_at->format('g:i A') }} · {{ $song->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Related Songs (same artist) --}}
                    @if(isset($relatedSongs) && $relatedSongs->count() > 0)
                    <div class="detail-card rounded-2xl overflow-hidden fade-up-3">
                        <div class="px-6 py-4 border-b border-white/5">
                            <h2 class="font-display font-bold text-white text-sm tracking-wide flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                More by {{ $song->artist }}
                            </h2>
                        </div>
                        <div class="p-4 space-y-2">
                            @foreach($relatedSongs as $related)
                            <a href="/songs/{{ $related->song_id }}"
                                class="related-card flex items-center gap-3 p-3 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xs font-bold font-display shrink-0">
                                    {{ strtoupper(substr($related->title, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-white text-xs font-semibold truncate">{{ $related->title }}</p>
                                    <p class="text-slate-500 text-xs truncate">{{ $related->genre }}</p>
                                </div>
                                @if($related->duration)
                                <span class="text-slate-600 text-xs font-mono shrink-0">{{ $related->formatted_duration }}</span>
                                @endif
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>