<?php require('../base/header.php'); ?>


<h3 class="display-4 text-center"> Cadastro de Empresas </h3>
<hr class="bg-dark mb-4 w-25">
<div class="container container mt-4 mb-5">
    <div class="container">

      <form action="../alterar/empresaAltera.php?idEmpresa=<?php echo $_GET['idEmpresa']?>" method="POST">
        <div class="form-group">
          <label>Nome da Empresa ou Instituição:</label>
          <input name="nomeEmpresa" type="text" class="form-control" placeholder="<?php echo $_POST['nomeEmpresa']?>">
        </div>
        <div class="form-group">
          <label>CNPJ:</label>
          <input name="cnpj" type="text" maxlength="14" class="form-control" placeholder="<?php echo $_POST['cnpj']?>">
        </div>
        <div class="form-group">
          <label>Endereço:</label>
          <input name="enderecoEmpresa" type="text" class="form-control" placeholder="<?php echo $_POST['enderecoEmpresa']?>">
        </div>
        <input name="alterar" class="btn btn-outline-info" type="submit" value="Alterar">
      </form>

    </div>
</div>


<?php require('../base/footer.php'); ?>
