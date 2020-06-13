<?php


namespace App\Http\Controllers;


use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Series extends Controller
{

    function listSeries(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );

        $request->session()->flash(
            'mensagem',
            sprintf('Serie %s com %s temporadas e %s episodios salva com sucesso',
                $serie->id . ' - ' . $serie->nome,
                $request->qtd_temporadas,
                $request->qtd_episodios
            )
        );

        return redirect()->route('listar_series');

    }

    public function remove(Request $request, RemovedorDeSerie $removedorDeSerie)
    {

        /** @var Serie $serie */
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash(
            'mensagem',
            sprintf('Serie %s removida com sucesso', $nomeSerie)
        );

        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();

    }
}
