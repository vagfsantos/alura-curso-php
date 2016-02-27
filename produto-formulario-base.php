

<tr>
	<td>Produto</td>
	<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"/></td>
</tr>

<tr>
	<td>Preço</td>
	<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"/></td>
</tr>

<tr>
	<td></td>
	<td>
		<input type="checkbox" name="usado" value="<?=$produto['usado']?>" />Usado
	</td>
</tr>

<tr>
	<td>Categoria</td>
	<td>
		<select name="categoria_id" class="form-control">
			<?php
				foreach($produto['categoria'] as $categoria):

					$verificar = $produto['categoria'] == $produto['categoria_id'];
					$selecionar = $verificar ? "selected='selected'" : ""; 
				?>
					<option value="<?=$produto['categoria_id']?>">
						<?=$produto['categoria'] ?>
					</option>
					
			<?php endforeach?>
		</select>
	</td>
</tr>

<tr>
	<td>Descricao</td>
	<td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
</tr>

<tr>
	<td>Tipo do produto</td>
	<td>
		<select class="form-control" name="tipoProduto">
			<option value="Livro">Livro</option>
			<option value="Produto">Produto</option>
		</select>
	</td>
</tr>

<tr>
	<td>ISBN (caso seja um livro)</td>
	<td><input class="form-control" type="text" name="isbn" /></td>
</tr>