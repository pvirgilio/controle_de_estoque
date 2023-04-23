@extends('layouts.app')

@section('title', 'Cadastro de Produtos')

@section ('content')
<div class="container mt-5">
    <h1>Cadastro de produtos</h1>
    <hr>
    <form action="{{route('salvar-produtos')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" placeholder="Digite o nome do produto...">
            </div>
            <br>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input class="form-control" type="number" name="valor" step="0.01" min="0.00" max="2000.00" placeholder="Digite o valor do produto...">
            </div>
            <br>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input class="form-control" type="number" name="quantidade" placeholder="Digite a quantidade do produto..." require>
            </div>
            <br>
            <div class="form-group">
                <label for="validade">validade</label>
                <input class="form-control" type="date" name="validade" require>
            </div>
            <br>
            <div class="form-group">
                <input class="btn btn-primary " type="submit" name="submit" value="Salvar">
                <a href="{{route('produtos-view')}}" class="btn btn-success ">Voltar</a>
            </div>


        </div>
    </form>
</div>

@endsection