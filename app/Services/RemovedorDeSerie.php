<?php


namespace App\Services;


use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId)
    {
        $nomeSerie = '';

        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removerTemporada($serie);
        });

        return $nomeSerie;
    }

    /**
     * @param $serie
     */
    private function removerTemporada($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
        });
        $serie->delete();
    }

    /**
     * @param Temporada $temporada
     * @throws \Exception
     */
    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
        $temporada->delete();
    }

}
