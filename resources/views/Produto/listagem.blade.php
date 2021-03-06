@extends('layouts.main')

@section('viewContent')
	@if(empty($produtos))
		<div class="alert alert-danger">
		  Você não tem nenhum produto cadastrado.
		</div>
	@else
		@if(old('nome'))
			<div class="alert alert-success">
		  	PRODUTO {{old('nome')}} ADICIONADO COM SUCESSO!
			</div>
		@endif
		<h1>Listagem de produtos</h1>
		<table class="table table-striped table-bordered table-hover">
		  @foreach ($produtos as $p)
		  <tr class="{{$p->quantidade <= 1 ? 'danger' : ''}}">
		    <td>{{$p->nome}}</td>
		    <td>{{$p->valor}}</td>
		    <td>{{$p->descricao or "SEM DESCRIÇÃO"}}</td>
		    <td>{{$p->tamanho}}</td>
		    <td>{{$p->quantidade}}</td>
		    <td>
		    	<a href="/produtos/detalhes/{{$p->id}}">
		    	  <span class="glyphicon glyphicon-search"></span>
					</a>
		    </td>
		    <td>
		    	<a href="/produtos/remove/{{$p->id}}">
		    	  <span class="glyphicon glyphicon-trash"></span>
					</a>
		    </td>
		  </tr>
		  @endforeach
		</table>
	@endif
	<h4><span class="label label-danger pull-right">Um ou menos itens no estoque</span></h4>
@stop