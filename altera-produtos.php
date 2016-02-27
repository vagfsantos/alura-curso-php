<?php
	require_once('class/Produto.php');
	require_once('class/Categoria.php');
	require_once('cabecalho.php');
	require_once('banco-produto.php');
	
	$produto = new Produto();
	$produto -> setCategoria( new Categoria() );
	$produto -> setId( $_POST["id"] );
	$produto -> setNome( $_POST["nome"] );
	$produto -> setPreco( $_POST["preco"] );
	$produto -> setDescricao( $_POST["descricao"] );
	$produto -> setCategoriaId( $_POST["categoria_id"] );
	
	$usado = '';
	if(array_key_exists("usado", $_POST)){
		$usado = "true";
	} else{ $usado = "false";}

	$produto -> setUsado( $usado );
	
	if(alteraProduto($conexao, $produto)){
		?> <p class="text-success">O produto <?php  echo $produto -> getNome();?> no valor de <?php echo $produto -> getPreco(); ?> foi alterado com sucesso!</p>
	
	<?php } 

	else{ $erro = mysqli_error($conexao); ?> 
		<p class="text-danger">O produto <?php  echo $produto -> getNome();?> NÃO foi alterado! <?=$erro?></p> 
	<?php }

?>


<?php require_once('rodape.php');?>