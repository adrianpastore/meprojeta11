<?php
require_once('../classes/projeto.php');
require_once('../classes/empresa.php');
require_once('../DAO/empresaDAO.php');
require_once('../DAO/absdao.php');

class projetoDao extends dao{
    public function lista() {
        $conn = $this->criaConexao();
        $sql = 'SELECT * FROM projetos';
        $res = pg_query($conn,$sql);
        $projetos = array();
        while($projeto = pg_fetch_assoc($res)){
          $p = new Projeto ($projeto['nome'], $projeto['descricao']);
          $p->setIdProjeto($projeto['idProjeto']);
          $e = new EmpresaDao ();
          $p->setEmpresa($e->buscanome($projeto['CNPJ']));
          array_push($projetos,$p);
        }
        return $projetos;
    }
    public function add ($projeto) {
     $con = $this->criaConexao();
     $sql = 'INSERT INTO projetos (nome, descricao, "CNPJ") VALUES ($1,$2,$3) RETURNING "idProjeto"';
     $vetor = array($projeto->getNome(), $projeto->getDesc(), $projeto->getEmpresa()->getcnpj());

     $res = pg_query_params($con,$sql,$vetor);
     $linha = pg_fetch_assoc($res);
     $projeto->setIdProjeto(intval($linha['idProjeto']));

     pg_close($con);
   }

    public function deletar($id) {
        $conn = $this->criaConexao();
        $sql2 = 'delete from projetos where "idProjeto" = $1';
        pg_query_params($conn, $sql2, array($id));
        pg_close($conn);
    }

    public function busca($id) {
        $conn = $this->criaConexao();
        $sql = 'SELECT * FROM projetos WHERE "idProjeto" = $1';
        $res = pg_query_params($conn, $sql, array($id));
        $linha = pg_fetch_assoc($res);
        $e = new EmpresaDao();
        $projeto = new Projeto ($linha['nome'], $linha['descricao']);
        $projeto->setIdProjeto($linha['idProjeto']);
        $projeto->setEmpresa($e->busca($linha['CNPJ']));
        return $projeto;
    }
}

/*$empresadao = new EmpresaDao;
$emp = new Empresa('CodeGirl', '23514412',  'Rua dos Rosários, 789, blc 301');
$empresadao->add($emp);
echo "<br>";
echo "<br>";
echo "<br>";



$proj = new Projeto('Tecnologia e acessibilidade', 'Desenvolver um programa voltado para a inclusão social');
$proj->setEmpresa($emp);
$projetodao = new projetoDao;
$projetodao->add($proj);
var_dump($proj);
var_dump($emp);
echo "<br>";
echo "<br>";
echo "<br>";
//var_dump($proj);
*/
?>
