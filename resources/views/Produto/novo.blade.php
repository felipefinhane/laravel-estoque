@extends('layouts.main')

@section('viewContent')
	<h1>Novo produto</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
	<form class="" action="/produtos/adiciona" method="post">
		<div class="form-group">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" value="{{old('nome')}}" >
		</div>
		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valor" class="form-control" value="{{old('valor')}}">
		</div>
		<div class="form-group">
			<label>Quantidade</label>
			<input type="text" name="quantidade" class="form-control" value="{{old('quantidade')}}">
		</div>
		<div class="form-group">
			<label>Tamanho</label>
			<input type="text" name="tamanho" class="form-control" value="{{old('tamanho')}}">
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea name="descricao" class="form-control">{{old('descricao')}}</textarea>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<button class="btn btn-primary" type="submit">Adicionar</button>
	<form>
@stop