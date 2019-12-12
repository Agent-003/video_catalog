<?php

namespace App\Services;

use App\Film;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\Array_;

interface FilmServiceInterface
{

    /**
     * Получить один фильм.
     *
     * @param string $title
     * @return Film
     */
    public function getFilm(string $title): Film;

    public function getFilms(string $word): array;

    public function getFilmById(string $word): Film;
}
