<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'gender'
    ];

    public function people()
    {
        return $this->hasMany(People::class);
    }
}
