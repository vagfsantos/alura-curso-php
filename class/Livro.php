<?php
	class Livro extends Produto{
		public $isbn;
	}

	public function calculaImposto(){
		return $this -> getPreco() * 0.065;
	}
?>