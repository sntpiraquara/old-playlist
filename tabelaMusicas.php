
<div class="row col-xs-6">
    <h3>Todas as Músicas</h3>
    <table class="table table-bordered table-striped" style="width: 750px;">
        <thead>
            <tr>
                <th><a href="index.php?by=id">Id</a></th>
                <th><a href="index.php?by=nome">Nome</a></th>
                <th><i class="fa fa-user"></i><a href="index.php?by=artista">Artista</a></th>
                <th><a href="index.php?by=tipo">Tipo</a></th>
                <th>ação</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($todas as $musica) {?>
            <tr>
                <form action="editar.php" method="post">
                    <td><input type="text" name="id" value="<?php echo $musica->id; ?>"
                    style="width: 20px;" readonly="readonly"> </i></td>
                    <td><input type="text" name="nome" value="<?php echo $musica->nome; ?>"></td>
                    <td><input type="text" name="artista" value="<?php echo $musica->artista; ?>"></td>
                    <td>
                     <select class="form-control" name="tipo">
                        <option <?php if($musica->tipo == 'adoracao') { 
                            echo 'selected';  
                            }  ?> value="adoracao">adoração</option>

                        <option <?php if ($musica->tipo == 'transicao') {
                            echo "selected";
                             } ?> value="transicao">transição</option>
    
                        <option <?php if ($musica->tipo == 'agitada') {
                            echo "selected";
                             } ?> value="agitada">agitada</option>
                     </select>

            </td>
            <td>
                <a href="excluir.php?id=<?php echo $musica->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                <button name="editar" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
            </td>
        </form>
    </tr>
    <?php }?>
</tbody>

</table>
</div>

<script src="assets/jquery/jquery-2.1.1.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
