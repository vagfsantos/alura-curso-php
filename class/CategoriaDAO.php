<?php 

	class CategoriaDAO{
		private $conexao;

		function __construct($conexao){
			$this -> conexao = $conexao;
		}


		public function listaCategoria($conexao){
			$categorias = array();
			$query = "select * from categorias";

			$resultado = mysqli_query($conexao, $query);

			while($listaDeCategorias = mysqli_fetch_assoc($resultado)){
				$categoria = new Categoria;
				$categoria->setId( $listaDeCategorias["id"] );
				$categoria->setNome( $listaDeCategorias["nome"] );

				array_push($categorias, $categoria);
			}

			return $categorias;
		}
	}

?>