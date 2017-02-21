<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use App\Http\Requests\ProdutoRequest;
// use App\Http\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller {

	public function lista(){
		// $produtos = DB::select('SELECT * FROM produtos');
		$produtos = Produto::all();
		$dataView =[
			'produtos' => $produtos
		];

		return view('Produto/listagem')->with($dataView);
	}

	public function detalhes($idProduto){
		// $produto = DB::select("SELECT * FROM produtos WHERE id = ?", [$idProduto]);
		$produto = Produto::find($idProduto);

		if(empty($produto)) {
		  return "OPS! PRODUTO NÃO ENCONTRADO!";
		}
		$dataView =[
			'p' => $produto
		];
		return view('Produto/detalhes')->with($dataView);
	}

	public function remove($idProduto){
		$produto = Produto::find($idProduto);
		if(empty($produto)) {
		  return "OPS! PRODUTO NÃO ENCONTRADO!";
		}else{
			$produto->delete($produto);	
		}
	
		return redirect()->action('ProdutoController@lista');
	}

	public function novo(){
		return view('Produto/novo');
	}

	public function adiciona(ProdutoRequest $produtoRequest){
		// $params = Request::all();
		// $produto = new Produto($params);
		// // $produto->nome = Request::input('nome');
		// // $produto->quantidade = Request::input('quantidade');
		// // $produto->valor = Request::input('valor');
		// // $produto->descricao = Request::input('descricao');
		// $produto->save();
		Produto::create($produtoRequest->all());
		return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
	}


	public function alterar(ProdutoRequest $produtoRequest, $idProduto){
		$produto = Produto::find($idProduto);
		if(empty($produto)) {
		  return "OPS! PRODUTO NÃO ENCONTRADO!";
		}else{
			$dataView =[
				'p' => $produto
			];
			if (Request::isMethod('post')){
				$produto->fill($produtoRequest->all());
				$produto->save();  
				return redirect('/produtos')->action('ProdutoController@detalhes', $idProduto)->withInput(Request::only('nome'));
			}
		}
		return view('Produto/alterar')->with($dataView)->withInput();
	}

	public function listaJson(){
    $produtos = DB::select('SELECT * FROM produtos');
    return response()->json($produtos);
    // return $produtos;
}
}