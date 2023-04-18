@extends('layouts.app')

@section('title', 'Editar produtos')

@section ('content')
    <div class="container mt-5">
        <h1>Editar produto</h1>
        <hr>
        <form action="{{route('atualizar-produtos', ['id' => $produtos->id])}}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text"   name="nome" value="{{$produtos->nome}}" placeholder="Digite o nome do produto...">
                </div>
                <br>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input class="form-control" type="number"   name="valor" value="{{$produtos->valor}}" step="0.01" min="0.00" max="1000.00"       placeholder="Digite o valor do produto...">
                </div>
                <br>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input class="form-control" type="number"   name="quantidade" value="{{$produtos->quantidade}}" placeholder="Digite a quantidade do produto...">
                </div>
                <br>
                <div class="form-group">
                    <label for="validade">Validade</label>
                    <input class="form-control" type="date"   name="validade" value="{{$produtos->validade}}">
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Atualizar">
                    <a href="{{route('produtos-view')}}" class="btn btn-primary">Voltar</a>
                </div>
            
            </div>
        </form>
    </div>

@endsection