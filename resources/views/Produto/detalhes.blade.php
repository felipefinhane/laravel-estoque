@extends('layouts.main')

@section('viewContent')
<h1>Detalhes do produto {{$p->nome}}</h1>
<ul>
	<li><b>Valor:</b> R$ {{$p->valor}}</li>
	<li><b>Descrição:</b> {{$p->descricao or "SEM DESCRIÇÃO"}}</li>
	<li><b>Quantidade em estoque:</b> {{$p->quantidade}}</li>
</ul>
<a href="{{action('ProdutoController@alterar', $p->id)}}" class="btn btn-warning pull-right">Editar</a></h4>
@stop