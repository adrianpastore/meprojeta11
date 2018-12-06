<?php require('../base/header.php'); ?>

<h3 class="display-4 text-center"> Patrocinadores </h3>
<hr class="bg-dark mb-4 w-25">
<div class="container container mt-4 mb-5">
    <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th class="th">ID PATROCINADOR</th>
            <th class="th">ID PROJETO</th>
            <th class="th">valor Investimento</th>
            <th class="th"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once('../DAO/projetoPat.php');
          $ppdao = new projPatDao;
          $projpats = $ppdao->lista();
          foreach($projpats as $pp) { ?>
            <tr>
                  <td><?php echo $pp->getpatrocinador()->getNome()?></td>
                  <td><?php echo $pp->getprojeto()->getNome()?></td>
                  <td><?php echo 'R$ '.$pp->getvalorinvestimento()?></td>
                  <td>
                    <a href="../alterar/patrocinador.php?idProjeto=<?php echo $pp->getIdPatrocinador() ?>"><input name"editar" class="btn btn-outline-info" type="submit" value="Editar"></a>
                    <a href="../deletar/patrocinador.php?idProjeto=<?php echo $pp->getIdPatrocinador() ?>"><input name="excluir" class="btn btn-outline-info" type="submit" value="Excluir"></a>
                  </td>
              </tr>
              <?php } ?>
        </tbody>
      </table>
</div>


<?php require('../base/footer.php'); ?>
