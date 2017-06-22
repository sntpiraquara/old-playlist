<?php 
$title = "Login!";
include "../assets/header.php"; 
include '../include/all2.php';
?>
<div class="container">
	<h2>login</h2>
	<div class="col-xs-12">
		<form action="logar.php" method="post" class="">
			<p>
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1">
						<i class="fa fa-user"></i>
					</span>
					<input type="text" class="form-control" placeholder="E-mail" aria-describedby="sizing-addon1" name="email">
				</div>
				<?php if (temErro('email')) {  echo temErro('email'); } ?>
			</p>
			<p>
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1">
						<i class="fa fa-lock"></i>
					</span>
					<input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon1" name="senha">
				</div>
				<?php if (temErro('senha')) {echo temErro('senha');} ?>
			</p>
			<input type="submit" value="entrar" class="btn btn-primary">
		</div>
	</form>
</div>
<hr>
<div class="col-sm-3">
	<a href="cadastro.php" class="btn btn-danger">cadastrar-se</a>
</div>
</body>
<?php if (isset($_SESSION['erros']) || isset($_SESSION['cadAviso'])) {
	unset($_SESSION['erros']);
	unset($_SESSION['cadAviso']);
} ?>
</html>