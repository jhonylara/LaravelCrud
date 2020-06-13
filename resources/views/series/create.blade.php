@extends('layout')

@section('cabecalho')
    Adicionar Séries
@endsection

@section('conteudo')

@include('erros', ['errors' => $errors])

<form method="POST">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome"> Nome </label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas"> N. Temporadas </label>
            <input type="text" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
        <div class="col col-2">
            <label for="qtd_episodios"> N. episodios </label>
            <input type="text" class="form-control" name="qtd_episodios" id="qtd_episodios">
        </div>
    </div>
    <button class="btn btn-primary mt-2"> Adicionar </button>
</form>
@endsection
