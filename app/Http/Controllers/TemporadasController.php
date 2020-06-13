<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Serie;
use phpDocumentor\Reflection\Types\Collection;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;

        return view('temporadas.index', compact('temporadas', 'serie'));
    }

}
