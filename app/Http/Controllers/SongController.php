<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::active()->get();
        return view('songs.index', [
            'songs' => $songs
        ]);
    }

    public function show(Song $song)
    {
        $relatedSongs = Song::active()->where('artist', $song->artist)
            ->where('song_id', '!=', $song->song_id)
            ->limit(5)->get();
        return view('songs.show', [
            'song' => $song,
            'relatedSongs' => $relatedSongs
        ]);
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'genre' => ['required'],
            'artist' => ['required'],
            'duration' => ['required'],
            'description' => ['nullable', 'string', 'max:1000'],
            'published_date' => ['required', 'date'],
            'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $imagePath = "songs/empty-image.jpg";

        if (request()->hasFile('img')) {
            $imagePath = request()->file('img')->store('songs', 'public');
        }

        Song::create([
            'title' => request('title'),
            'genre' => request('genre'),
            'artist' => request('artist'),
            'duration' => request('duration'),
            'description' => request('description'),
            'published_date' => request('published_date'),
            'img_path' => $imagePath,
            'is_favorite' => false,
            'is_active' => true
        ]);
        return redirect('/songs');
    }

    public function edit(Song $song)
    {
        return view('songs.edit', [
            'song' => $song
        ]);
    }

    public function update(Song $song)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'genre' => ['required'],
            'artist' => ['required'],
            'duration' => ['required'],
            'description' => ['nullable', 'string', 'max:1000'],
            'published_date' => ['required', 'date'],
            'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $song->img_path;

        if (request()->hasFile('img')) {
            $imagePath = request()->file('img')->store('songs', 'public');
        }

        $song->update(
            [
                'title' => request('title'),
                'genre' => request('genre'),
                'artist' => request('artist'),
                'duration' => request('duration'),
                'description' => request('description'),
                'published_date' => request('published_date'),
                'img_path' => $imagePath,
            ]
        );
        return redirect('/songs/' . $song->song_id);
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return redirect('/songs');
    }

    public function deactivate(Song $song)
    {
        $song->update(
            [
                'is_active' => false
            ]
        );
        return redirect('/');
    }
}
