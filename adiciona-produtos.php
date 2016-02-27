<?php
	require_once('conecta.php');
	require_once('cabecalho.php');
	require_once('logica-usuario.php');

	verificaUsuario();

	$produto = new Produto();
	$produto -> setCategoria( new Categoria() );
	$produto -> setNome( $_POST["nome"] );
	$produto -> setPreco( $_POST["preco"] );
	$produto -> setDescricao( $_POST["descricao"] );
	$produto -> setCategoriaId( $_POST["categoria_id"] );

	if($_POST["tipoProduto"] == "Livro"){
		$produto -> isbn = $_POST["isbn"];
	} else{
		$produto -> isbn = null;
	}
	
	if(array_key_exists("usado", $_POST)){
		$usado = "true";
	} else{ $usado = "false";}
	
	$produto -> setUsado( $usado );

	$produtoDAO = new ProdutoDAO($conexao);
	
	if($produtoDAO -> insereProduto($produto)){
		?> <p class="text-success">O produto <?php  echo $produto -> getNome();?> no valor de R$<?php echo $produto -> getPreco(); ?> foi adicionado com sucesso!</p>
	
	<?php } 

	else{ $erro = mysqli_error($conexao); ?> 
		<p class="text-danger">O produto <?php  echo $produto -> getNome();?> NÃO foi adicionado! <?=$erro?></p> 
	<?php }

?>


<?php include('rodape.php');?>