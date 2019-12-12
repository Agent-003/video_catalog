<?php

namespace App\Services;

use App\Film;
use GuzzleHttp\Client;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use function Couchbase\defaultDecoder;

class FilmService implements FilmServiceInterface
{

    /** @var Client $httpClient */
    private $httpClient;


    public function __construct()
    {
        $this->httpClient = new Client(
            [
                'base_uri' => 'http://www.omdbapi.com'
            ]
        );
    }

    /**
     * Получить один фильм.
     *
     * @param string $title
     * @return Film
     * @throws \Exception
     */
    public function getFilm(string $title): Film
    {
        $film = Film::where('title', 'like', '%' . $title. '%')->first();
        if ($film) {
            return $film;
        }
        $apiFilm = $this->getApiFilmByTitle($title);
        $foundedFilm = new Film();
        $foundedFilm->title = $apiFilm['Title'];
        $foundedFilm->year = $apiFilm['Year'];
        $foundedFilm->genre = json_encode(explode(',', $apiFilm['Genre']));
        $foundedFilm->director = $apiFilm['Director'];
        $foundedFilm->runtime = $apiFilm['Runtime'];
        $foundedFilm->plot = $apiFilm['Plot'];
        $foundedFilm->actors = json_encode(explode(',', $apiFilm['Actors']));
        $foundedFilm->imdb_id = $apiFilm['imdbID'];
        $foundedFilm->poster = $apiFilm['Poster'];
        $foundedFilm->save();
        return $foundedFilm;
    }

    public function getFilms(string $word): array
    {
        $apiFilm = $this->getApiFilms($word);

        return $apiFilm;
    }

    /**
     * Поиск фильма по imdbID
     *
     * @param string $imdb_id
     * @return mixed
     * @throws \Exception
     */
    public function getFilmById(string $imdb_id): Film
    {
        $film = Film::where('imdb_id', $imdb_id)->first();

        if ($film) {
            return $film;
        }

        $apiFilm = $this->getApiFilmById($imdb_id);
        $foundedFilm = new Film();
        $foundedFilm->title = $apiFilm['Title'];
        $foundedFilm->year = $apiFilm['Year'];
        $foundedFilm->genre = json_encode(explode(',', $apiFilm['Genre']));
        $foundedFilm->director = $apiFilm['Director'];
        $foundedFilm->runtime = $apiFilm['Runtime'];
        $foundedFilm->plot = $apiFilm['Plot'];
        $foundedFilm->actors = json_encode(explode(',', $apiFilm['Actors']));
        $foundedFilm->imdb_id = $apiFilm['imdbID'];
        $foundedFilm->poster = $apiFilm['Poster'];
        $foundedFilm->save();
        return $foundedFilm;
    }

    /**
     * @param string $title
     * @return array
     * @throws \Exception
     */
    private function getApiFilmByTitle(string $title): array
    {
        $request = $this->httpClient->get(
            '',
            [
                'query' => [
                    'apikey' => config('app.omdb_api_key'),
                    't' => $title
                ]
            ]
        );
        $response = json_decode($request->getBody()->getContents(), true);
        if ($response['Response'] === 'False') {
            throw new \Exception('Film not found');
        }
        return $response;
    }

    /**
     * @param string $imdb_id
     * @return array
     * @throws \Exception
     */
    private function getApiFilmById(string $imdb_id): array
    {
        $request = $this->httpClient->get(
            '',
            [
                'query' => [
                    'apikey' => config('app.omdb_api_key'),
                    'i' => $imdb_id
                ]
            ]
        );
        $response = json_decode($request->getBody()->getContents(), true);
        if ($response['Response'] === 'False') {
            throw new \Exception('Film not found');
        }
        return $response;
    }

    /**
     * Поиск по слову
     *
     * @param string $word
     * @return array
     * @throws \Exception
     */
    private function getApiFilms(string $word): array
    {
        $request = $this->httpClient->get(
            '',
            [
                'query' => [
                    'apikey' => config('app.omdb_api_key'),
                    's' => $word
                ]
            ]
        );

        $response = json_decode($request->getBody()->getContents(), true);

        if ($response['Response'] === 'False') {
            throw new \Exception('Film not found');
        }

//        if ($response['Error']=="Too many results.") {
//            $foundedFilm = $this->getFilm($word);
//            return $foundedFilm;
//        } elseif ($response['Response'] === 'False'){
//            throw new \Exception('Film not found');
//        }


        return $response["Search"];
    }

}
