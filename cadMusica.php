   <div class="col-xs-3">

        
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
