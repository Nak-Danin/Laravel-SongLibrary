<?php

namespace App\Http\Controllers;

use App\Models\Song;

$allFavGenre = Song::active()
    ->favorite()
    ->distinct()
    ->pluck('genre');

class FavoritesController extends Controller
{
    private function getGenre()
    {

        return Song::active()
            ->favorite()
            ->distinct()
            ->pluck('genre');
    }

    public function index()
    {
        $favorites = Song::active()->favorite()->get();
        return view('favorites.index', [
            'favorites' => $favorites,
            'allFavGenre' => $this->getGenre()
        ]);
    }

    public function filterGenre(string $genre)
    {
        $favorites = Song::active()->favorite()->where('genre', $genre)->get();

        return view('favorites.index', [
            'favorites' => $favorites,
            'allFavGenre' => $this->getGenre(),
            'genreTitle' => $genre
        ]);
    }

    public function addToFavorite(Song $song)
    {
        $song->update(
            [
                'is_favorite' => true
            ]
        );
        return redirect('/songs/' . $song->song_id);
    }

    public function removeFromFavorite(Song $song)
    {
        $song->update(
            [
                'is_favorite' => false
            ]
        );
        return redirect('/favorites');
    }
}
