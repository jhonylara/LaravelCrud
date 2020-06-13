<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{

    use RefreshDatabase;

    /** @var $serie Serie */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();

        $criador = new CriadorDeSerie();
        $this->serie = $criador->criarSerie(
            'Testinho',
            3,
            4
        );

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals($this->serie->nome, $nomeSerie);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
