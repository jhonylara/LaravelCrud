<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();

        $serie = $criadorDeSerie->criarSerie(
            'Nome de teste', 2, 2
        );

        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertDatabaseHas('series', ['nome' => $serie->nome]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serie->id]);

        $this->assertTrue(true);
    }
}
