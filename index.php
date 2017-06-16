<?php
include "include/all.php";

$musica = new Musica;
$todas  = $musica->all();

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

    <title>Gerador de Playlists</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

    <style>
        body{
            text-transform: capitalize;
        }

    </style>
</head>
<body>
    <div class="col-xs-3">

        <!-- aqui as musicas são cadastradas -->
        <div class="panel panel-default" style="margin-top: 22px;">
            <div class="panel-heading">Cadastrar Música</div>
            <div class="panel-body">
                <?php if (isset($_SESSION['aviso'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['aviso']; ?>
                        <?php unset($_SESSION['aviso']);?>
                    </div>
                <?php endif;?>

                <form class="form" action="cadastrar.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="artista" placeholder="Artista">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="tipo">
                            <option value="">Tipo de Música</option>
                            <option value="agitada">Agitada</option>
                            <option value="transicao">Transição</option>
                            <option value="adoracao">Adoração</option>
                        </select>
                    </div>
                    <button class="btn btn-block btn-primary" name="cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>

        <!-- aqui é gerada uma playlist -->

        <div class="panel panel-default">
            <div class="panel-heading">Gerar Playlist</div>
            <div class="panel-body">
                <form action="gerar.php" method="post" class="form-horizontal">
                 <?php if (isset($_SESSION['empty'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['empty']; ?>
                        <?php unset($_SESSION['empty']);?>
                    </div>
                <?php endif;?>
                    <p>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="agitada" placeholder="Agitada">
                        </div>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="transicao" placeholder="Transição">
                        </div>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="adoracao"" placeholder="Adoração">
                        </div>
                  </p>
                  <?php if (count($musicas) > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($musicas as $musica) {?>
                            <tr>
                                <td><?php echo $musica->nome; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <button class="btn btn-primary" name="gerar">Nova PlayList</button>
                        <button class='btn btn-danger' name='limpar'>Limpar</button></p>
                    </div>
                <?php else: ?>
                    <button class="btn btn-primary btn-block" name="gerar">Gerar PlayList</button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>
<div class="col-xs-6">

    <!-- tabela de musicas cadastradas -->

    <h3>Todas as Músicas</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Artista</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todas as $all) {?>
            <tr>
                <td><i class="fa fa-music"> </i></td>
                <td><?php echo $all->nome; ?></td>
                <td><i class="fa fa-user"></i> <?php echo $all->artista; ?></td>
                <td><?php echo $all->tipo; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script src="assets/jquery/jquery-2.1.1.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
