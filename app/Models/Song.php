<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $primaryKey = 'song_id';
    protected $guarded = [];
    protected $casts = [
        'published_date' => 'date',
    ];
    public function getFormattedDurationAttribute()
    {
        if (!$this->duration) return "-";
        $minute = floor($this->duration / 60);
        $second = $this->duration % 60;
        if ($second == 0) return $minute . 'mn';
        return $minute . 'mn' . str_pad($second, 2, '0', STR_PAD_LEFT) . 's';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFavorite($query)
    {
        return $query->where('is_favorite', true);
    }
}
