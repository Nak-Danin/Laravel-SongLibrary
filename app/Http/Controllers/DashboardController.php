<?php

namespace App\Http\Controllers;

use App\Models\Song;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSongs   = Song::where('is_active', true)->count();
        $totalArtists = Song::distinct('artist')->count('artist');
        $totalGenres  = Song::distinct('genre')->count('genre');
        $recentCount  = Song::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $songs = Song::where('is_active', true)->latest()->take(10)->get();

        return view('songs.dashboard', compact(
            'totalSongs',
            'totalArtists',
            'totalGenres',
            'recentCount',
            'songs'
        ));
    }
}
