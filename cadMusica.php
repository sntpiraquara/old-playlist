<!-- sumary -->
   <!-- Thiago You -->
   <!-- Branch: fix#001 -->
   <!-- Mudanças: Validações e estruturação do HTML -->
   <!-- Delete estes comentários de cabeçalho ou marcados com (delete) caso usem este branch -- >
   <!-- Cuidado com a identação e não esqueça de fechar todas as divs -->
   <!-- estruturei a grid e o layout sem conhecer qual a idéia conceitual que vcs possuem em mente e sem
        nem testar, então não sei se realmente esta se comportanto como esperado
   -->
   <!-- tente evitar deixar muitos espaços em branco, muitos deles (muitos mesmo) podem afetar o desempenho -->
   <!-- utilize a anotação ./ dentro de comentário quando necessário para indicar o fim de alguns blocos. Ajuda na leitura -->
<!-- sumary -->

<!-- row e col costumam andar juntas -->
<div class="row">
   <!-- Definindo o comportamento em diferentes grids torna a aplicação muito mais responsiva (delete) -->
   <!-- O tamanho desejado éra mesmo 3/12? (delete) -->
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <!-- h1 é uma tag semantica e nao de tamanho, por isso a troca de size -->
            <h1 class="font20">Cadastrar Música</h1>
         </div>
         <!-- ./panel-headin -->
         <div class="panel-body">
            
            <?php if (isset($_SESSION['aviso'])): ?>
               <div class="alert alert-danger">
                  <!-- se o PHP estiver configurado é melhor utilizar as short tags que são mais performáticas (delete) -->
                  <?php echo $_SESSION['aviso']; ?>
                  <?php unset($_SESSION['aviso']); ?>
               </div>
            <?php endif; ?>

            <!-- Não esqueça de atribuir ID para elementos como inputs e outros que poderão ter interação com JS ou CSS (delete) -->
            <!-- a seleção pelo ID é muito mais performática do que por outro atributo (delete) -->
            <form id="submit-form" class="form" action="cadastrar.php" method="post">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                     <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input id="nome" class="form-control" type="text" name="nome" placeholder="Nome">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                     <div class="form-group">
                        <label for="artista">Artista:</label>
                        <input id="artista" class="form-control" type="text" name="artista" placeholder="Artista">
                     </div>
                  </div>
               </div>
               <!-- ./form-group-inputs -->
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="form-group">
                        <label for="tipo">Tipo de Música:</label>
                        <select id="tipo" class="form-control" name="tipo">
                           <option value="" disabled selected>Selecione o Tipo</option>
                           <option value="agitada">Agitada</option>
                           <option value="transicao">Transição</option>
                           <option value="adoracao">Adoração</option>
                        </select>
                     </div>
                  </div>
               </div>
               <!-- ./form-group-select -->
               <!-- talvez esse button seja melhor posicionado em um panel footer (delete)-->
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-offset-3">
                     <button class="btn btn-block btn-primary btn-flat" name="cadastrar"><i class="fa fa-save"></i>&nbsp; Cadastrar</button>
                  </div>
               </div>
            </form>
         </div>
         <!-- ./panel-body -->
      </div>
      <!-- ./panel -->
   </div>
   <!-- ./main-div -->
</div>
<!-- ./main-row -->
