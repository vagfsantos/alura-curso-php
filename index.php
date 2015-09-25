<?php include('cabecalho.php'); include('logica-usuario.php');?>
				<h1>BEM VINDOS!</h1>
				<h2>login</h2>

				<?php
				if(usuarioEstaLogado()):?>
					<p class="alert-success">Voce está logado como <?=usuarioLogado()?>.</p>
					<a href="logout.php" class="btn btn-primary">Logout</a>
				<?php else:?>
				<form action="login.php" method="post">
					<table class="table">
						<tr>
							<td>Email <input class="form-control" type="email" name="email"/></td>
						</tr>

						<tr>
							<td>Senha <input class="form-control" type="password" name="senha"/></td>
						</tr>

						<tr>
							<td><button class="btn btn-primary">Login</button></td>
						</tr>
					</table>
				</form>
			<?php endif; ?>
<?php include('rodape.php');?>
		