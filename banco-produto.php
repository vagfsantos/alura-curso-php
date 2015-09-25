<?php
require_once('conecta.php');
function insereProduto($conexao, Produto $produto){
		$produto -> nome = mysqli_real_escape_string($conexao, $produto -> nome);
		$produto -> descricao = mysqli_real_escape_string($conexao, $produto -> descricao);
		$produto -> usado = mysqli_real_escape_string($conexao, $produto -> usado);
		$produto -> preco = mysqli_real_escape_string($conexao, $produto -> preco);
		$produto -> categoria_id = mysqli_real_escape_string($conexao, $produto -> categoria_id);

		$adicionar = "insert into produtos(nome, preco, descricao, categorias_id, usado) values ('{$produto -> nome}', {$produto -> preco}, '{$produto -> descricao}', '{$produto -> categoria_id}', {$produto -> usado})";
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
        categorias_id= {$produto -> categoria_id}, usado = {$produto -> usado} where id = '{$produto -> id}'";
    return mysqli_query($conexao, $query);
}



function listaProdutos($conexao){
	$query = mysqli_query($conexao, 'select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categorias_id');
	$lista = array();
	while($produto = mysqli_fetch_assoc($query)){
		array_push($lista, $produto);
	}

	return $lista;
}


function removeProduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	mysqli_query($conexao, $query);
}



function buscaProduto($conexao, $id){
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}