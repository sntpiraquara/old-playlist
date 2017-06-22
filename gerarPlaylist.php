       
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
    <div class="form-group">    
      <label for="tipo1" class="col-sm-5 control-label">Agitada</label>
      <div class="col-sm-5">
        <input  
        type="number" 
        class="form-control" 
        name="agitada" 
        id="tipo1">
      </div>

      <label for="tipo2" class="col-sm-5 control-label">Transição</label>
      <div class="col-sm-5">
        <input  
        type="number" 
        class="form-control" 
        name="transicao" 
        id="tipo2"o">
      </div>

      <label for="tipo3" class="col-sm-5 control-label">Adoração</label>
      <div class="col-sm-5">
        <input  
        type="number" 
        class="form-control" 
        name="adoracao" 
        id="tipo3"">
      </div>
    </div>
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
<div>
  <a href="../usuarios/logout.php" class="btn btn-danger">sair</a>
</div>
</div>
