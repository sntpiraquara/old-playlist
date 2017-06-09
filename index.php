<?php 
include "include/all.php";
$musica = new Musica;
$todas = $musica->all();

if (!isset($_SESSION['musicas'])) {
	$_SESSION['musicas'] = [];	
}

$musicas = [];
$musicas = $_SESSION['musicas'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>gerador de playlist</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
	<script src="assets/jquery/jquery-2.1.1.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
	<style>
body{
	text-transform: capitalize;
}
		
	</style>
</head>
<body>
	<div class="col-xs-3">
		<h3>cadastrar musicas</h3>
		<?php if (isset($_SESSION['aviso'])) {
			echo $_SESSION['aviso'];
			unset($_SESSION['aviso']);
		} ?>
		<form action="cadastrar.php" method="post">
				<p><input type="text" name="nome" placeholder="nome"></p>
				<p><input type="text" name="artista" placeholder="artista"></p>
				<p>tipo: 
				<select name="tipo">
					<option value="agitada">agitada</option>
					<option value="transicao">transição</option>
					<option value="adoracao">adoração</option>
				</select></p>
				<p><button class="btn btn-primary" name="cadastrar">enviar</button></p>
		</form>
	</div>
	<div class="col-xs-3">
		<form action="gerar.php" method="post">
			<p><h3>playList</h3>
			
				<button class="btn btn-primary" name="gerar">criar playList</button>
			</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>nome</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($musicas as $musica) {?>
					<tr>
						<td><?php echo $musica->nome; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p><button class="btn btn-primary" name="limpar">limpar</button></p>
		</form>
	</div>
	<div class="col-xs-6">
	<h3>todas as musicas</h3>
		<table class="table table-striped">
			<thead>
				<tr>
				<th></th>
					<th>Nome</th>
					<th>artista</th>
					<th>tipo</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($todas as $all) { ?>
				<tr>
				<td><i class="fa fa-music"> </i></td>
					<td><?php echo $all->nome; ?></td>
					<td><i class="fa fa-user"></i> <?php echo $all->artista; ?></td>
					<td><?php echo $all->tipo; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>


