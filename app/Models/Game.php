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
        'developer_id',
        'size_mb',
        'description',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
