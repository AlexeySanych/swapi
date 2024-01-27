<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeworld extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'name',
        'created',
        'url',
    ];

    public function people()
    {
        return $this->hasMany(People::class);
    }
}
