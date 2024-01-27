<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    public $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'birth_year',
        'gender_id',
        'homeworld_id',
        'created',
        'url',
    ];

    public function prunable()
    {
        return static::where('deleted_at', '<=', now()->subHour());
    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function homeworld()
    {
        return $this->belongsTo(Homeworld::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
