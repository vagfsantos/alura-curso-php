<?php
	require_once('class/Produto.php');
	require_once('cabecalho.php');
	require_once('banco-produto.php');
	require_once('logica-usuario.php');

	verificaUsuario();

	$produto = new Produto();

	$produto -> nome = $_POST["nome"];
	$produto -> preco = $_POST["preco"];
	$produto -> descricao = $_POST["descricao"];
	$produto -> categoria_id = $_POST["categoria_id"];
	
	if(array_key_exists("usado", $_POST)){
		$usado = "true";
	} else{ $usado = "false";}
	
	$produto -> usado = $usado;
	
	if(insereProduto($conexao, $produto)){
		?> <p class="text-success">O produto <?php  echo $produto -> nome;?> no valor de <?php echo $produto -> preco?> foi adicionado com sucesso!</p>
	
	<?php } 

	else{ $erro = mysqli_error($conexao); ?> 
		<p class="text-danger">O produto <?php  echo $produto -> nome;?> NÃO foi adicionado! <?=$erro?></p> 
	<?php }

?>


<?php include('rodape.php');?>