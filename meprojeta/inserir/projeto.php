<?php
  require_once('../classes/projeto.php');
  require_once('../DAO/projetoDAO.php');
  require_once('../classes/empresa.php');
  require_once('../DAO/empresaDAO.php');
  require_once('../classes/projetoPat.php');
  require_once('../DAO/projetoPat.php');
  require_once('../classes/patrocinador.php');
  require_once('../DAO/patrocinadorDAO.php');

  $newEmp = new EmpresaDao();
  $e = $newEmp->busca($_POST['empresa']);
  $novoProjeto = new Projeto($_POST['nomeProjeto'],$_POST['descricao']);
  $novoProjeto->setEmpresa($e);
  $newProj = new projetoDao();
  $newProj->add($novoProjeto);

//  var_dump($novoProjeto->getIdProjeto());

  $patrocinador = new patrocinadorDao();
  $projpat = new projPatDao();
  $pats = $_POST['pat'];
  $valins = $_POST['valorinvestimento'];
  foreach($pats as $pat) {
      foreach ($valins as $valin) {
        $x = new ProjetoPat();
        $x->setvalorinvestimento($valin);
        $x->setprojeto($novoProjeto);
        $x->setpatrocinador($patrocinador->busca($pat));
        $projpat->add($x);
      }
    }



  require_once('../cadastros/vagas.php');
