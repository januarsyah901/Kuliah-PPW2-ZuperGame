<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'size_mb',
        'description',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }
}
