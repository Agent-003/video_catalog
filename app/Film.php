<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     * Class Film
     * @package App
     *
     * @property string $title
     * @property string $year
     * @property string $genre
     * @property string $director
     * @property string $runtime
     * @property string $poster
     * @property string $plot
     * @property string $actors
     * @property string $imdb_id
     */

class Film extends Model
{
    protected $fillable = [
        'title',
        'year',
        'genre',
        'director',
        'runtime',
        'plot',
        'poster',
        'actors',
        'imdb_id'
    ];
}
