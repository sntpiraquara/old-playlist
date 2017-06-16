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

        <!-- aqui as musicas são cadastradas -->

        <h3>Cadastrar Musica</h3>
        <?php if (isset($_SESSION['aviso'])) {
            echo $_SESSION['aviso'];
            unset($_SESSION['aviso']);
        }?>
        <form action="cadastrar.php" method="post">
            <p><input type="text" name="nome" placeholder="Nome"></p>
            <p><input type="text" name="artista" placeholder="Artista"></p>
            <p>Tipo:
                <select name="tipo">
                    <option value="agitada">Agitada</option>
                    <option value="transicao">Transição</option>
                    <option value="adoracao">Adoração</option>
                </select></p>
                <p><button class="btn btn-primary" name="cadastrar">Salvar</button></p>
            </form>
        </div>
        <div class="col-xs-3">

            <!-- aqui é gerada uma playlist -->

            <form action="gerar.php" method="post">
                <p>
                    <h3>PlayList</h3>
                    <button class="btn btn-primary" name="gerar">Criar PlayList</button>
                </p>
                <table class="table table-striped">
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
                <?php 
                $count = count($musica->nome);
                if ($count > 0) {
                    echo "<p><button class='btn btn-danger' name='limpar'>Limpar</button></p>";
                } ?>
            </form>
        </div>
        <div class="col-xs-6">

            <!-- tabela de musicas cadastradas -->

            <h3>Todas as Músicas</h3>
            <table class="table table-striped">
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
    </body>
    </html>
