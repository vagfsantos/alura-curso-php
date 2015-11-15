<?php
require_once('conecta.php');
require_once('class/Produto.php');
require_once('class/Categoria.php');

function insereProduto($conexao, Produto $produto){
		$produto -> nome = mysqli_real_escape_string($conexao, $produto -> nome);
		$produto -> descricao = mysqli_real_escape_string($conexao, $produto -> descricao);
		$produto -> usado = mysqli_real_escape_string($conexao, $produto -> usado);
		$produto -> preco = mysqli_real_escape_string($conexao, $produto -> preco);
		$produto -> categoria -> id = mysqli_real_escape_string($conexao, $produto -> categoria -> id);

		$adicionar = "insert into produtos(nome, preco, descricao, categoria_id, usado) values ('{$produto -> nome}', {$produto -> preco}, '{$produto -> descricao}', '{$produto -> categoria -> id}', {$produto -> usado})";
		return mysqli_query($conexao, $adicionar);
	}




function alteraProduto($conexao, Produto $produto) {
	$produto -> nome = mysqli_real_escape_string($conexao, $produto -> nome);
	$produto -> descricao = mysqli_real_escape_string($conexao, $produto -> descricao);
	$produto -> usado = mysqli_real_escape_string($conexao, $produto -> usado);
	$produto -> preco = mysqli_real_escape_string($conexao, $produto -> preco);
	$produto -> categoria_id = mysqli_real_escape_string($conexao, $produto -> categoria_id);
	$produto -> id = mysqli_real_escape_string($conexao, $produto -> id);

    $query = "update produtos set nome = '{$produto -> nome}', preco = {$produto -> preco}, descricao = '{$produto -> descricao}', 
        categoria_id= {$produto -> categoria_id}, usado = {$produto -> usado} where id = '{$produto -> id}'";
    return mysqli_query($conexao, $query);
}



function listaProdutos($conexao){
	$query = mysqli_query($conexao, 'select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id');
	$lista = array();
	while($produto_atual = mysqli_fetch_assoc($query)){
		$produto = new Produto;
		$produto -> categoria = new Categoria;
		$produto -> id = $produto_atual["id"];
		$produto -> nome = $produto_atual["nome"];
		$produto -> preco = $produto_atual["preco"];
		$produto -> descricao = $produto_atual["descricao"];
		$produto -> usado = $produto_atual["usado"];
		
		$produto -> categoria-> id = $produto_atual["categoria_id"];
		$produto -> categoria-> nome = $produto_atual["categoria_nome"];

		array_push($lista, $produto);
	}
	return $lista;
}


function removeProduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	mysqli_query($conexao, $query);
}



function buscaProduto($conexao, $produto){
	$query = "select * from produtos where id = {$produto->id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}