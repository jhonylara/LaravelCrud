<?php


namespace App\Services;


use App\Serie;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $qtdEpisdios
    ) : serie {

        $serie = Serie::create(['nome' => $nomeSerie]);


        for ($i = 1; $i <= $qtdTemporadas; $i ++) {
            $temporadas = $serie->temporadas()->create([
                'numero' => $i
            ]);

            for ($j = 1; $j <= $qtdEpisdios; $j ++) {
                $episodios = $temporadas->episodios()->create([
                    'numero' => $j
                ]);
            }
        }

        return $serie;
    }
}
