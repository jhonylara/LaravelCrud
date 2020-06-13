<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class Episodios extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;
        $mensagem = $request->session()->get('mensagem');

        return view('episodios.index',
        [
            'episodios' => $episodios,
            'temporadaId' => $temporadaId,
            'mensagem' => $mensagem
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;


        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });

        $temporada->push();

        $request->session()->flash('mensagem', 'Episodios marcados como assistido' );

        return redirect()->back();
    }
}
