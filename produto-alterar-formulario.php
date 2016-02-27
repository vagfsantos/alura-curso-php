<?php 
	require_once('class/Produto.php');
	require_once('cabecalho.php');
	require_once('banco-categoria.php');
	require_once('banco-produto.php');

	$categorias = listaCategoria($conexao);

	$produtoPego = new Produto();
	$produtoPego -> setId( $_GET['id'] );

	$produto = buscaProduto($conexao, $produtoPego);

	$usado = $produto -> getUsado() ? "checked='checked'" : "";
?>

	<h1>Alterando produto</h1>

	<form action="altera-produtos.php" method="post">
		
		<input type="hidden" name="id" value="<?=$produto -> getId()?>"/>
		<table class="table">
			
			<?php include('produto-formulario-base.php');?>
			<tr>
				<td><input class="btn btn-primary" type="submit" value="Alterar"/></td>
			</tr>

		</table>
	</form>

<?php include('rodape.php');?>