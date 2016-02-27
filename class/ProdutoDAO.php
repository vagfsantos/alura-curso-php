<?php

	class ProdutoDAO{

		private $conexao;

		function __construct($conexao){
			$this -> conexao = $conexao;
		}

		public function insereProduto(Produto $produto){
			$produto -> setNome( mysqli_real_escape_string($this -> conexao, $produto -> getNome()) );
			$produto -> setDescricao( mysqli_real_escape_string($this -> conexao, $produto -> getDescricao()) );
			$produto -> setUsado( mysqli_real_escape_string($this -> conexao, $produto -> getUsado()) );
			$produto -> setPreco( mysqli_real_escape_string($this -> conexao, $produto -> getPreco()) );
			$produto -> setCategoriaId( mysqli_real_escape_string($this -> conexao, $produto -> getCategoriaId()) );

			$produto -> setISBN( mysqli_real_escape_string($this -> conexao, $produto -> getISBN()) );
			$produto -> setTipoProduto( mysqli_real_escape_string($this -> conexao, $produto -> getTipoProduto()) );

			$adicionar = "insert into produtos(nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$produto -> getNome()}', {$produto -> getPreco()}, '{$produto -> getDescricao()}', '{$produto -> getCategoriaId()}', {$produto -> getUsado()}), '{$produto -> getISBN()})', '{$produto -> getTipoProduto()})'";
			return mysqli_query($this -> conexao, $adicionar);
		}




		public function alteraProduto(Produto $produto) {
			$produto -> setNome( mysqli_real_escape_string($this -> conexao, $produto -> getNome()) );
			$produto -> setDescricao( mysqli_real_escape_string($this -> conexao, $produto -> getDescricao()) );
			$produto -> setUsado( mysqli_real_escape_string($this -> conexao, $produto -> getUsado()) );
			$produto -> setPreco( mysqli_real_escape_string($this -> conexao, $produto -> getPreco()) );
			$produto -> setCategoriaId( mysqli_real_escape_string($this -> conexao, $produto -> getCategoriaId()) );
			$produto -> setId( mysqli_real_escape_string($this -> conexao, $produto -> id) );

		    $query = "update produtos set nome = '{$produto -> getNome()}', preco = {$produto -> getPreco()}, descricao = '{$produto -> getDescricao()}', categoria_id= {$produto -> getCategoriaId()}, usado = {$produto -> getUsado()} where id = '{$produto -> getId()}'";
		    return mysqli_query($this -> conexao, $query);
		}



		public function listaProdutos(){
			$query = mysqli_query($this -> conexao, 'select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id');
			$lista = array();
			while($produto_atual = mysqli_fetch_assoc($query)){
				$produto = new Produto;
				$produto -> setCategoria( new Categoria() );
				$produto -> setId( $produto_atual["id"] );
				$produto -> setNome( $produto_atual["nome"] );
				$produto -> setPreco( $produto_atual["preco"] );
				$produto -> setDescricao( $produto_atual["descricao"] );
				$produto -> setUsado( $produto_atual["usado"] );
				$produto -> setISBN( $produto_atual["isbn"] );
				$produto -> setTipoProduto( $produto_atual["tipoProduto"] );

				$produto -> setCategoriaId( $produto_atual["categoria_id"] );
				$produto -> setCategoriaNome( $produto_atual["categoria_nome"] );

				array_push($lista, $produto);
			}
			return $lista;
		}


		public function removeProduto($id){
			$query = "delete from produtos where id = {$id}";
			mysqli_query($this -> conexao, $query);
		}


		public function buscaProduto(Produto $produto){
			$query = "select * from produtos where id = {$produto->getId()}";
			$resultado = mysqli_query($this -> conexao, $query);
			return mysqli_fetch_assoc($resultado);
		}
	}

?>