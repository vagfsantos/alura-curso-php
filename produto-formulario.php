<?php 

	require_once('cabecalho.php');
	require_once('banco-categoria.php');
	require_once('logica-usuario.php');

	$categorias = listaCategoria($conexao);
	$produto = array("nome" => "", "preco" => "", "categoria_id" => 1, "descricao" => "");
	$usado = false;
			
	verificaUsuario();
?>

	<h1>Formulário de cadastro</h1>

	<form action="adiciona-produtos.php" method="post">
		
		<table class="table">
			
			<?php include('produto-formulario-base.php');?>

			<tr>
				<td><input class="btn btn-primary" type="submit"/></td>
			</tr>

		</table>
	</form>

<?php include('rodape.php');?>