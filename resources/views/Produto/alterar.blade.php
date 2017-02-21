@extends('layouts.main')

@section('viewContent')
	<h1>Alterar produto</h1>

	<form class="" action="{{action('ProdutoController@alterar', $p->id)}}" method="post">
		<div class="form-group">
			<label>Nome</label>
			<input type="hidden" name="id" class="form-control" value="{{$p->id}}">
			<input type="text" name="nome" class="form-control" value="{{$p->nome}}">
		</div>
		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valor" class="form-control" value="{{$p->valor}}">
		</div>
		<div class="form-group">
			<label>Quantidade</label>
			<input type="text" name="quantidade" class="form-control" value="{{$p->quantidade}}">
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea name="descricao" class="form-control">{{$p->descricao}}"</textarea>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<button class="btn btn-primary" type="submit">Salvar</button>
	<form>
@stop