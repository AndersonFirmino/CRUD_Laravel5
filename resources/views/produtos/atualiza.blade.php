@extends('layout.principal')
@section('conteudo')

<h1>Atualizar Produto</h1>

<form action="{{action('ProdutoController@fazerAtualizacao', $dados->id) }}" method="POST" >

{{-- Proteção do laravel contra atacks csrf, sem este tokem não da para usar o POST --}}
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <div class="box">
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" value="{{$dados->nome}}">
    </div>

    <div class="form-group">
      <label for="descricao">Descricao</label>
      <input type="text" name="descricao" class="form-control" value="{{$dados->descricao}}">
    </div>
    <div class="form-group">
      <label for="valor">Valor</label>
      <input type="text" name="valor" class="form-control" value="{{$dados->valor}}">
    </div>
    <div class="form-group">
      <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" class="form-control" value="{{$dados->quantidade}}">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
  </div>
</form>


@stop