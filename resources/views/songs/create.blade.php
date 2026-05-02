<x-layout>
    <x-slot:heading>
        New song
    </x-slot:heading>
    <!-- Add Song Form (hidden by default) -->
    <form method="POST" action="/songs" enctype="multipart/form-data" class="mb-8 animate-fade-up">
        @csrf
        <div class="bg-white rounded-2xl card-glow p-6">
            <h2 class="font-display font-bold text-slate-800 text-base mb-5 flex items-center gap-2">
                <span class="w-7 h-7 rounded-lg bg-indigo-100 flex items-center justify-center text-sm">🎵</span>
                New Song
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        placeholder="Song title"
                        class="input-focus w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 placeholder-slate-400 transition-all">
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Artist <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="artist" value="{{ old('artist') }}" required
                        placeholder="Artist name"
                        class="input-focus w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 placeholder-slate-400 transition-all">
                    @error('artist')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Genre <span class="text-red-400">*</span>
                    </label>
                    <select name="genre"
                        class="input-focus w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 transition-all">
                        <option value="">Select genre</option>
                        <option value="Pop" {{ old('genre') == 'Pop' ? 'selected' : '' }}>Pop</option>
                        <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                        <option value="Hip-Hop" {{ old('genre') == 'Hip-Hop' ? 'selected' : '' }}>Hip-Hop</option>
                        <option value="Slowed" {{ old('genre') == 'Slowed' ? 'selected' : '' }}>Slowed</option>
                        <option value="Jazz" {{ old('genre') == 'Jazz' ? 'selected' : '' }}>Jazz</option>
                        <option value="Blues" {{ old('genre') == 'Blues' ? 'selected' : '' }}>Blues</option>
                        <option value="Classical" {{ old('genre') == 'Classical' ? 'selected' : '' }}>Classical</option>
                        <option value="Country" {{ old('genre') == 'Country' ? 'selected' : '' }}>Country</option>
                        <option value="Electronic" {{ old('genre') == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                    </select>
                    @error('genre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Published <span class="text-red-400">*</span></label>
                    <input type="date" name="published_date" value="{{ old('published_date') }}"
                        placeholder="e.g. 2024" min="1900-01-01" max="{{ date('Y-m-d') }}"
                        class="input-focus w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 placeholder-slate-400 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Duration <span class="text-red-400">*</span></label>
                    <input type="number" name="duration" value="{{ old('duration') }}"
                        placeholder="e.g. 310 (s)"
                        class="input-focus w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 placeholder-slate-400 transition-all">
                    @error('duration')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Image
                    </label>
                    <div class="flex gap-3">
                        <img id="preview" class="w-40 h-30 object-cover rounded-xl border border-gray-200" src="{{ asset('storage/songs/empty-image.jpg') }}" alt="ImgCover">
                        <input type="file" id="img" name="img" accept="image/*"
                            class="input-focus w-full border border-gray-200 h-fit rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 transition-all">
                    </div>

                    @error('img')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-xs font-display font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Description</label>
                <textarea name="description" rows="2" placeholder="Optional notes about this song..."
                    class="input-focus w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-slate-50 placeholder-slate-400 transition-all resize-none">{{ old('notes') }}</textarea>
            </div>

            <div class="flex items-center gap-3 mt-5">
                <button type="submit"
                    class="btn-primary text-white text-sm font-semibold px-6 py-2.5 rounded-xl">
                    Save Song
                </button>
                <a href="{{ url()->previous() }}"
                    class="text-sm font-semibold text-slate-500 hover:text-slate-700 px-4 py-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition-all">
                    Cancel
                </a>
            </div>
        </div>
    </form>
    <script>
        const imgInput = document.getElementById('img');
        const imgPreview = document.getElementById('preview');
        imgInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        })
    </script>

</x-layout>