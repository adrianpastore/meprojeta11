<?php require('../base/header.php'); ?>


<h3 class="display-4 text-center"> Cadastro de Vagas </h3>
<hr class="bg-dark mb-4 w-25">
<div class="form-group">
    <div class="container container mt-4 mb-5">


      <div style="display:inline-flex;">
        <button id="maisVaga" type="submit" class="btn btn-primary mb-2" name="maisVagas" style="margin-right:10px;">Nova Vaga +</button>
        <button id="menosVaga" type="submit" class="btn btn-primary mb-2" name="menosVagas">Excluir Vaga - </button>
      </div>

      <br><br>

      <form action="../inserir/vaga.php" method="post">
        <div class="todasvagas" name="todasVagas">
          <div id="1" class="cadastro" name="vagas">
            <h4>Vaga [0]</h4><br>
              <div class="form-group">
                <label>Nome da vaga:</label>
                <input name="nomeVaga[0]" type="text" class="form-control" placeholder="Vaga">
              </div>
              <div class="form-group">
                <label>Função:</label><br>
                <textarea name="funcaoVaga[0]" rows="3" cols="80" style="resize: none" class="form-control" placeholder="Descreva as funções que deverãoo ser exercidas nesta vaga"></textarea>
              </div>
              <div class="form-group">
                <label>Salário:</label>
                <input type="number" name="salarioVaga[0]" min="0" value="" class="form-control" placeholder="Informe o salário"><br>
              </div>
              <hr>
          </div>
        </div>
        <div id="alert" style="display:none;"class="alert alert-warning" role="alert">
          <strong>Eeeii!</strong> Seu projeto precisa ter pelo menos uma vaga!
          <button id = "butClose" type="button" class="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input id="cadastrar" name="cadastrar" class="btn btn-outline-info" type="submit" value="Cadastrar">
      </form>

    </div>
</div>




<?php require('../base/footer.php'); ?>
