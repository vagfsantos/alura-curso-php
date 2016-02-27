<?php
require_once('conecta.php');
require_once('class/Produto.php');
require_once('class/Categoria.php');

function insereProduto($conexao, Produto $produto){
	$produto -> setNome( mysqli_real_escape_string($conexao, $produto -> getNome()) );
	$produto -> setDescricao( mysqli_real_escape_string($conexao, $produto -> getDescricao()) );
	$produto -> setUsado( mysqli_real_escape_string($conexao, $produto -> getUsado()) );
	$produto -> setPreco( mysqli_real_escape_string($conexao, $produto -> getPreco()) );
	$produto -> setCategoriaId( mysqli_real_escape_string($conexao, $produto -> getCategoriaId()) );

	$adicionar = "insert into produtos(nome, preco, descricao, categoria_id, usado) values ('{$produto -> getNome()}', {$produto -> getPreco()}, '{$produto -> getDescricao()}', '{$produto -> getCategoriaId()}', {$produto -> getUsado()})";
	return mysqli_query($conexao, $adicionar);
}




function alteraProduto($conexao, Produto $produto) {
	$produto -> setNome( mysqli_real_escape_string($conexao, $produto -> getNome()) );
	$produto -> setDescricao( mysqli_real_escape_string($conexao, $produto -> getDescricao()) );
	$produto -> setUsado( mysqli_real_escape_string($conexao, $produto -> getUsado()) );
	$produto -> setPreco( mysqli_real_escape_string($conexao, $produto -> getPreco()) );
	$produto -> setCategoriaId( mysqli_real_escape_string($conexao, $produto -> getCategoriaId()) );
	$produto -> setId( mysqli_real_escape_string($conexao, $produto -> id) );

    $query = "update produtos set nome = '{$produto -> getNome()}', preco = {$produto -> getPreco()}, descricao = '{$produto -> getDescricao()}', categoria_id= {$produto -> getCategoriaId()}, usado = {$produto -> getUsado()} where id = '{$produto -> getId()}'";
    return mysqli_query($conexao, $query);
}



function listaProdutos($conexao){
	$query = mysqli_query($conexao, 'select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id');
	$lista = array();
	while($produto_atual = mysqli_fetch_assoc($query)){
		$produto = new Produto;
		$produto -> setCategoria( new Categoria() );
		$produto -> setId( $produto_atual["id"] );
		$produto -> setNome( $produto_atual["nome"] );
		$produto -> setPreco( $produto_atual["preco"] );
		$produto -> setDescricao( $produto_atual["descricao"] );
		$produto -> setUsado( $produto_atual["usado"] );
		
		$produto -> setCategoriaId( $produto_atual["categoria_id"] );
		$produto -> setCategoriaNome( $produto_atual["categoria_nome"] );

		array_push($lista, $produto);
	}
	return $lista;
}


function removeProduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	mysqli_query($conexao, $query);
}


function buscaProduto($conexao, Produto $produto){
	$query = "select * from produtos where id = {$produto->getId()}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}