<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
// use App\Http\Controllers\Controller;

class ProdutoController extends Controller {

	public function lista(){
		$produtos = DB::select('SELECT * FROM produtos');
		$dataView =[
			'produtos' => $produtos
		];

		return view('Produto/listagem')->with($dataView);
	}

	public function detalhes(){
		$idProduto = Request::route('idProduto', '0');

		$produto = DB::select("SELECT * FROM produtos WHERE id = ?", [$idProduto]);

		if(empty($produto)) {
		  return "OPS! PRODUTO NÃO ENCONTRADO!";
		}
		$dataView =[
			'p' => $produto[0]
		];

		return view('Produto/detalhes')->with($dataView);
	}

	public function novo(){
		return view('Produto/novo');
	}

	public function adiciona(){
		$nome = Request::input('nome');
		$quantidade = Request::input('quantidade');
		$valor = Request::input('valor');
		$descricao = Request::input('descricao');

		DB::insert('INSERT INTO produtos (nome, quantidade, valor, descricao) VALUES (?,?,?,?)', [$nome, $quantidade, $valor, $descricao]);
		$dataView =[
			'nome' => $nome
		];
		return redirect('/produtos')->withInput(Request::only('nome'));
	}

	public function listaJson(){
    $produtos = DB::select('SELECT * FROM produtos');
    return response()->json($produtos);
    // return $produtos;
}
}