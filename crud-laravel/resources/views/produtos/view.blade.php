@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section ('content')


<div class="container mt-5">
  <div class="row">
    <div class="col-sm-8">
      <h1>Produtos Cadastrados</h1>
    </div>
    <form action="{{route ('buscar-produtos')}}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="pesquisa" class="form-control" placeholder="Buscar produtos" aria-label="Buscar produtos">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            <a href="{{route('produtos-view')}}" class="btn btn-outline-secondary" >Cancelar</a>

        </div>

    </form>
    <div class="col-sm-4">
      <a href="{{route('home-inicio')}}" class="btn btn-primary ">Voltar</a>
      <a href="{{route('produtos-cadastro')}}" class="btn btn-success">Cadastrar produto</a>
      
    </div>
  </div>
  <table class="table table-striped">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Valor</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Validade</th>
        <th scope="col">...</th>
        <th scope="col">...</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produtos as $produto)
      <tr>
        <th>{{$produto->id}}</th>
        <th>{{$produto->nome}}</th>
        <th>R$ {{$produto->valor}}</th>
        <th>{{$produto->quantidade}}</th>
        <th>{{$produto->validade}}</th>
        <th class="d-flex">
          <a href="{{ route('editar-produtos', ['id' => $produto->id ]) }}" class=" btn btn-primary me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>

          </a>

          <form action="{{route ('excluir-produtos', ['id' => $produto-> id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
              </svg>
            </button>

          </form>
        </th>

      </tr>
      
      @endforeach


    </tbody>
  </table>
  
</div>

<!--Função busca de produtos -->
@if ($produtos->count() > 0)
    @foreach ($produtos as $produto)
        <!-- exibir informações do produto -->
    @endforeach
@else
    <p class="text-center">Nenhum produto encontrado.</p>
@endif

<!-- Referente ao botão de cancelamento de caracteres -->
<script>
  document.getElementById("cancelar-busca").addEventListener("click", function() {
    document.getElementsByName("pesquisa")[0].value = "";
  });
</script>


@endsection