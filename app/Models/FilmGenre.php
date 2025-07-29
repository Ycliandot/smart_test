<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    use HasFactory;

    protected $table = 'film_genres';

    protected $fillable = [
        'film_id',
        'genre_id',
    ];
}
