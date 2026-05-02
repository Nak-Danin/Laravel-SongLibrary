<?php

namespace App\Http\Controllers;

use App\Models\Song;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSongs   = Song::active()->count();
        $totalArtists = Song::active()->distinct('artist')->count('artist');
        $totalGenres  = Song::active()->distinct('genre')->count('genre');
        $recentCount  = Song::active()->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $songs = Song::active()->latest()->take(10)->get();

        return view('songs.dashboard', compact(
            'totalSongs',
            'totalArtists',
            'totalGenres',
            'recentCount',
            'songs'
        ));
    }
}
