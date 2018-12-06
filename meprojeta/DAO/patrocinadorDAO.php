<?php
require_once('../classes/patrocinador.php');
require_once('absdao.php');

class patrocinadorDao extends dao{

  public function lista () {
      $con = $this->criaConexao();
      $sql = 'SELECT * FROM patrocinador';
      $vetor = array();
      $res = pg_query_params($con, $sql, $vetor);
      $listpatrocinador = array();
      while ($linha = pg_fetch_assoc($res)) {
          $patrocinador = new Patrocinador ($linha['nome'], $linha['tipo']);
          $patrocinador->setIdPatrocinador($linha['idPatrocinador']);
          array_push($listpatrocinador, $patrocinador);
      }

      pg_close($con);
      return $listpatrocinador;
  }
    public function add($patrocinador){
        $conn = $this->criaConexao();
        $sql = 'INSERT INTO patrocinador (nome, tipo) VALUES ($1, $2)';
        $vetor = array($patrocinador->getNome(), $patrocinador->getTipo());
        pg_query_params($conn,$sql,$vetor);
        pg_close($conn);
    }
    public function deletar($id) {
        $conn = $this->criaConexao();
        $sql2 = 'DELETE FROM patrocinador WHERE "idPatrocinador" = $1';
        pg_query_params($conn, $sql2, array($id));
        pg_close($conn);
    }
    public function busca($id) {
        $conn = $this->criaConexao();
        $sql = 'SELECT * FROM patrocinador WHERE "idPatrocinador" = $1';
        $res = pg_query_params($conn, $sql, array($id));
        $linha = pg_fetch_assoc($res);

        $patrocinador = new Patrocinador ($linha['nome'], $linha['tipo']);
        $patrocinador->setIdPatrocinador($linha['idPatrocinador']);

        pg_close($conn);
        return $patrocinador;
    }
}
//$patDao = new patrocinadorDao;
//$pat = new Patrocinador("colgate","fisica");
//$patDao->add($pat);
?>
