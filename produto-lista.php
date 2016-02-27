<?php
	require_once('cabecalho.php');
	require_once('banco-produto.php');
	require_once('class/Produto.php');
	require_once('class/Categoria.php');


$produtos = listaProdutos($conexao); ?>


<table class="table table-striped table-bordered">
	<?php
		foreach($produtos as $produto):
	?>
		
		<tr>
			<td><?=$produto -> getNome() ?></td>
			<td><?=$produto -> getPreco() ?></td>
			<td><?=$produto -> valorComDesconto(0.1)?></td>
			<td><?=substr($produto -> getDescricao(), 0, 40).'...'?></td>

			<td><?=$produto -> getCategoriaNome() ?></td>
			<td>
				<?php
					if($produto->isLivro()){
						echo "ISBN".$produto -> getISBN();
					}
				?>

			</td>
			<td><a class="btn btn-primary" href="produto-alterar-formulario.php?id=<?=$produto -> getId() ?>">Alterar</a></td>
			<td>
				<form action="remove-produto.php"  method="post">
					<input type="hidden" name="id" value="<?=$produto -> getId() ?>"/>
					<button class="btn btn-danger">Remover</button>
				</form>
			</td>
		</tr>


	<?php
		endforeach
	?>
</table>

<?php
	include('rodape.php');
?>