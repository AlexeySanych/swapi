<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'title',
        'episode_id',
        'release_date',
        'created',
        'url',
    ];

    public function people()
    {
        return $this->belongsToMany(People::class);
    }
}
