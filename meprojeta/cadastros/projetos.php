<?php require('../base/header.php'); ?>


<h3 class="display-4 text-center"> Cadastro de Projetos </h3>
<hr class="bg-dark mb-4 w-25">
<div class="container container mt-4 mb-5">
    <div class="container">
      <form action="../inserir/projeto.php" method="post" name="cadastroProj">
          <div class="form-group">
            <label>Empresa Responsável:</label>
              <select required name="empresa" class="form-control" id="empresa" >
                <option value="" disabled selected>Selecionar</option>
                  <?php
                    require_once('../DAO/empresaDAO.php');
                    $emp = new EmpresaDao();
                    $listEmp = $emp->lista();
                    foreach($listEmp as $e) {
                        echo
                        '<option value='.$e['CNPJ'].'>'.$e['nome'] .'  ('.$e['CNPJ'].')'.'</option>';
                    }
                  ?>
              </select>
          </div>
          <div class="form-group">
            <label>Nome do Projeto</label>
            <input required name="nomeProjeto" type="text" class="form-control" placeholder="Projeto">
          </div>
          <div class="form-group">
            <label>Descrição:</label><br>
            <textarea required name="descricao" rows="8" cols="80" class="form-control" placeholder="Descreva o projeto"></textarea>
          </div>
          <div class="form-group">
            <label>Etapa:</label>
            <select name="tipoEtapa" class="form-control">
              <option value="1">Fase Inicial</option>
              <option value="2">Fase de Desenvolvimento</option>
              <option value="3">Fase de Finalização</option>
            </select>
          </div>
          <div class="form-group">
            <label>Data de início da etapa:</label><br>
            <input type="date" name="dataInicio" value="" class="form-control">
          </div>
          </select>
          <div class="form-group">
            <label>Previsão de término da etapa para:</label><br>
            <input type="date" name="dataPrevisaoTermino" value="" class="form-control">
          </div>

          <hr>
          <div style="display:inline-flex;">
            <h4>Patrocinadores</h4>
            <button disabled id="maisPat" class="btn btn-primary mb-2" name="maisPat">Novo Patrocinador +</button>
            <button id="menosPat" type="submit" class="btn btn-primary mb-2" name="menosPat">Excluir - </button>
          </div>

          <div id ="todospat" class="todospat" name="todosPatrocinadores">
            <div id="patrocinador" class="pat" name="patrocinador">
              <label class="patro">Patrocinador [0]:</label>
              <select required name="pat[0]" class="selectPats form-control" >
                  <option value="null" selected>Nenhum</option>
                    <?php
                      require_once('../DAO/patrocinadorDAO.php');
                      $pat = new patrocinadorDao();
                      $listPat = $pat->lista();
                      foreach($listPat as $p) { ?>
                          <option value="<?php echo $p->getIdPatrocinador()?>">
                          <?php echo $p->getNome()?>
                          (<?php echo $p->getTipo()?>)
                        </option>;
                      <?php } ?>
              </select>
              <div class="form-group">
                <label>Valor do investimento:</label>
                <div class="invest">
                  <input  name="valorinvestimento[0]" type="number" class="invest form-control" placeholder="Valor do Investimento em reais">
                </div>
              </div>
              <hr>

            </div>
          </div>

        <br>
        <div id="alert" style="display:none;"class="alert alert-warning" role="alert">
          <strong>Eeeii!</strong> Seu projeto precisa ter pelo menos uma vaga!
          <button id = "butClose" type="button" class="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input id="cadastrar" name="cadastrar" class="btn btn-outline-info" type="submit" value="Cadastrar Projeto">

      </form>
      <br>

    </div>
</div>

<?php require('../base/footer.php'); ?>
