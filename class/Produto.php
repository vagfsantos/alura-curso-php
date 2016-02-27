<?php

	class Produto {
		private $id;
		private $nome;
		private $preco;
		private $descricao;
		private $categoria;
		private $usado;
		private $isbn;
		private $tipoProduto;

		public function valorComDesconto($valor = 0.05){
			if($valor > 0 && $valor < 1){
				$this -> preco -= $this -> preco * $valor;
				return $this -> preco;
			}
		}

		public function calculaImposto(){
			return $this -> getPreco() * 0.195;
		}

		public function isLivro(){
			return $this -> tipoProduto == "Livro";
		}

		// get e set ID
		public function getId(){
			return $this -> id;
		}

		public function setId($id){
			$this -> id = $id;
		}

		// get e set NOME
		public function getNome(){
			return $this -> nome;
		}

		public function setNome($nome){
			$this -> nome = $nome;
		}

		// get e set PRECO
		public function getPreco(){
			return $this -> preco;
		}

		public function setPreco($preco){
			$this -> preco = $preco;
		}

		// get e set DESCRIÇÃO
		public function getDescricao(){
			return $this -> descricao;
		}

		public function setDescricao($desc){
			$this -> descricao = $desc;
		}

		// get e set CATEGORIA
		public function getCategoria(){
			return $this -> categoria;
		}

		public function setCategoria($categoria){
			$this -> categoria = new Categoria();
		}

		// get e set CATEGORIA ID
		public function getCategoriaId(){
			return $this -> categoria -> getId();
		}

		public function setCategoriaId($id){
			$this -> categoria -> setId($id);
		}

		// get e set CATEGORIA NOME
		public function getCategoriaNome(){
			return $this -> categoria -> getNome();
		}

		public function setCategoriaNome($nome){
			$this -> categoria -> setNome($nome);
		}

		// get e set USADO
		public function getUsado(){
			return $this -> usado;
		}

		public function setUsado($usado){
			$this -> usado = $usado;
		}


		// get e set ISBN
		public function getISBN(){
			return $this -> isbn;
		}

		public function setISBN($isbn){
			$this -> isbn = $isbn;
		}


		// get e set tipoProduto
		public function getTipoProduto(){
			return $this -> tipoProduto;
		}

		public function setTipoProduto($tipoProduto){
			$this -> tipoProduto = $tipoProduto;
		}
	}

?>