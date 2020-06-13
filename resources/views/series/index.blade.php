@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-info">
            {{ $mensagem }}
        </div>
    @endif
    @auth
    <a href="{{ route('form_criar_serie') }}"  class="btn btn-dark mb-2"> Adicionar </a>
    @endauth
    <div>
        <ul class="list-group">
            @foreach($series as $serie)
                <li class="list-group-item d-flex justify-content-between  align-items-center">

                    <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                    <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                        <input type="text" class="form-control" value="{{ $serie->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                                OK
                            </button>
                            @csrf
                        </div>
                    </div>



                    <a href="/series/{{ $serie->id }}/temporadas"  class="btn btn-info mr-1 float-right"> Ver Temporadas </a>
                    @auth
                    <a href="#" onclick="toggleinput({{ $serie->id }})"  class="btn btn-info mr-1 float-right"> Editar  </a>
                    <form action="/series/remover/{{ $serie->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                        @endauth
                </li>
            @endforeach
        </ul>
    </div>
    <div>
    </div>
    <script>
        function toggleinput(serieId) {
            let nomeSerie = document.getElementById(`nome-serie-${serieId}`);
            let inputSerie = document.getElementById(`input-nome-serie-${serieId}`);
            if(nomeSerie.hasAttribute('hidden')){
                nomeSerie.removeAttribute('hidden')
                inputSerie.hidden = true
            } else {
                inputSerie.removeAttribute('hidden')
                nomeSerie.hidden = true
            }
        }

        function editarSerie(serieId) {
            let nomeEditado = document.querySelector(`#input-nome-serie-${serieId} > input`).value
            let url = `/series/${serieId}/editaNome`
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('nome', nomeEditado)
            formData.append('_token', token)

            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                toggleinput(serieId)
                document.getElementById(`nome-serie-${serieId}`).textContent = nomeEditado
            });
        }
    </script>

@endsection
