@extends('layouts.main')

@section('viewContent')
	<h1>Novo produto</h1>

	<form class="" action="/produtos/adiciona" method="post">
		<div class="form-group">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control">
		</div>
		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valor" class="form-control">
		</div>
		<div class="form-group">
			<label>Quantidade</label>
			<input type="text" name="quantidade" class="form-control">
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea name="descricao" class="form-control"></textarea>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<button class="btn btn-primary" type="submit">Adicionar</button>
	<form>
@stop