
<div class="col-xs-6" style="padding-top: 25px">
  <div class="row"> 
  <form method="post" class="form-inline" action="index.php?by=id&buscar=">
      <div class="form-group">
        <label class="sr-only" for="exampleInputAmount"></label>
        <div class="input-group">
          <input name="search" type="text" class="form-control" id="exampleInputAmount" placeholder="pesquise uma musica" value="<?php echo $term; ?>">
        </div>
      </div>
      <button name="buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
      <button name="fechar" class="btn btn-danger"><i class="fa fa-close"></i></button>
    </form>
    <?php if (isset($_SESSION['alerta'])) : ?>
      <div class="alert alert-danger">
       <?php echo $_SESSION['alerta']; ?>
       <?php unset($_SESSION['alerta']); ?>
     </div>
   <?php endif ?>
 </div> 
</div>

<div class="row col-xs-6">
  <h3>Todas as Músicas</h3>
  <table class="table table-bordered table-striped" style="width: 750px;">
    <thead>
      <?php if (isset($_POST['search'])){ ?>
        <tr>
        <th><a href="index.php?by=id&buscar=<?php echo $_POST['search']; ?>">Id</a></th>
        <th><a href="index.php?by=nome&buscar=<?php echo $_POST['search']; ?>">Música</a></th>
        <th><i class="fa fa-user&buscar=<?php echo $_POST['search']; ?>"></i> <a href="index.php?by=artista&buscar=<?php echo $_POST['search']; ?>">Artista</a></th>
        <th><a href="index.php?by=tipo&buscar=<?php echo $_POST['search']; ?>">Tipo</a></th>
        <th>ação</th>
      </tr>
      <?php } else{ ?>
      <tr>
        <th><a href="index.php?by=id">Id</a></th>
        <th><a href="index.php?by=nome">Música</a></th>
        <th><i class="fa fa-user"></i> <a href="index.php?by=artista">Artista</a></th>
        <th><a href="index.php?by=tipo">Tipo</a></th>
        <th>ação</th>
      </tr>
      <?php } ?>
    </thead>
    <tbody>
      <?php foreach ($todas as $i => $musica) {?>
      <tr>
        <form action="editar.php" method="post">
          <td><input type="hidden" name ="id" value="<?php echo $musica->id; ?>"></i>
            <input type="hidden" value="<?php echo $i; ?>" name="index">
            <?php echo $musica->id; ?>
          </td>
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
    <?php } ?>
  </tbody>
</table>
</div>
<script src="assets/jquery/jquery-2.1.1.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
