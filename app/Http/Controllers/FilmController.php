<?php

namespace App\Http\Controllers;

use App\Film;
use App\Services\FilmServiceInterface;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    public function index()
    {
        $films = Film::all();
        return view('search', compact('films'));
    }

    public function search(Request $request, FilmServiceInterface $filmService)
    {
        try {
            $films = $filmService->getFilms($request->get('word'));
            return view('results', compact('films'));
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    public function searchById($id, FilmServiceInterface $filmService)
    {
        try {
            $film = $filmService->getFilmById($id);
            return view('result', compact('film'));
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }
    }

}
