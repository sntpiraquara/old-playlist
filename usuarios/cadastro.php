<?php 
$title = "Cadastre-se!";
include '../include/all.php';
include "../assets/header.php"; 
?>
<h2>cadastre-se!</h2>
<hr>
<div class="container">
	<?php if (isset($_SESSION['cadAviso'])) {
		echo $_SESSION['cadAviso'];
	} ?>
	<form action="cadastrar.php" method="post">
		<p>
			<div class="input-group input-group-lg">
				<span class="input-group-addon" id="sizing-addon1">
					<i class="fa fa-user"></i>
				</span>
				<input type="text" class="form-control" placeholder="Nome" aria-describedby="sizing-addon1" name="nome">
			</div>
			<?php if (temErro('nome')) {echo temErro('nome');} ?>
		</p>
		<p>
			<div class="input-group input-group-lg">
				<span class="input-group-addon" id="sizing-addon1">
					<i class="fa fa-envelope"></i>
				</span>
				<input type="text" class="form-control" placeholder="E-mail" aria-describedby="sizing-addon1" name="email">
			</div>
			<?php if (temErro('email')) {echo temErro('email');} ?>
		</p>
		<p>
			<div class="input-group input-group-lg">
				<span class="input-group-addon" id="sizing-addon1">
					<i class="fa fa-lock"></i>
				</span>
				<input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon1" name="senha" maxlength="8">
			</div>
			<?php if (temErro('senha')) {echo temErro('senha');} ?>
		</p>
		<p>
			<input type="submit" value="cadastrar" class="btn btn-primary">
		</p>
	</form>
</div>
<hr>
<a href="login.php" class="btn btn-danger">voltar ao login</a>
</body>
<?php if (isset($_SESSION['erros']) || isset($_SESSION['cadAviso'])) {
	unset($_SESSION['erros']);
	unset($_SESSION['cadAviso']);
} ?>
</html>