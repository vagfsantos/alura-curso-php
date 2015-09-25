<?php 

	require_once('cabecalho.php');
	require_once('banco-categoria.php');
	require_once('banco-produto.php');

	$categorias = listaCategoria($conexao);

	$id = $_GET['id'];

	$produto = buscaProduto($conexao, $id);

	$usado = $produto['usado'] ? "checked='checked'" : "";
?>

	<h1>Alterando produto</h1>

	<form action="altera-produtos.php" method="post">
		
		<input type="hidden" name="id" value="<?=$produto['id']?>"/>
		<table class="table">
			
			<?php include('produto-formulario-base.php');?>
			<tr>
				<td><input class="btn btn-primary" type="submit" value="Alterar"/></td>
			</tr>

		</table>
	</form>

<?php include('rodape.php');?>