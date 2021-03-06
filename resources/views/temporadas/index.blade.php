@extends('layout')

@section('cabecalho')
    Temporadas de {{ $serie->nome  }}
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-info">
            {{ $mensagem }}
        </div>
    @endif
    <div>
        <ul class="list-group">
            @foreach($temporadas as $temporada)
                <li class="list-group-item d-flex justify-content-between  align-items-center">
                    <a href="/temporadas/{{ $temporada->id }}/episodios">
                        Temporada {{ $temporada->numero }}
                    </a>
                    <span class="badge badge-secondary">
    {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
    </div>
@endsection
