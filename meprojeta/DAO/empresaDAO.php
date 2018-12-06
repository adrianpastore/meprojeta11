<?php
require_once('../classes/empresa.php');
require_once('../DAO/absdao.php');

class EmpresaDao extends dao{
  public function lista() {
  $conn = $this->criaConexao();
        $res = pg_query($conn, 'SELECT * FROM empresa');
        $empresas = array();
        while($empresa = pg_fetch_assoc($res)){
            array_push($empresas,$empresa);
        }
        pg_close($conn);
        return $empresas;
    }
  public function add($empresa){
      $conn = $this->criaConexao();
      $sql = 'INSERT INTO empresa (nome, "CNPJ", endereço) VALUES ($1, $2, $3)';
      $vetor = array($empresa->getNome(), $empresa->getcnpj(),  $empresa->getEndereco());
      pg_query_params($conn,$sql,$vetor);
      pg_close($conn);
  }
    public function deletar($id) {
        $conn = $this->criaConexao();
        $sql2 = 'DELETE FROM empresa WHERE "idEmpresa" = $1';
        pg_query_params($conn, $sql2, array($id));
        pg_close($conn);
    }
    public function buscanome($cnpj) {
       $conn = $this->criaConexao();
       $sql3 = 'SELECT nome FROM empresa WHERE "CNPJ" = $1';
       $vetor2 = array($cnpj);
       $res = pg_query_params($conn,$sql3,$vetor2);
       while($empresa1 = pg_fetch_assoc($res)){
           $empresa = $empresa1;
       }
       pg_close($conn);
       return $empresa;
   }
   public function busca ($cnpj) {
     $con = $this->criaConexao();
     $sql = 'SELECT * FROM empresa WHERE "CNPJ"=$1';

     $res = pg_query_params($con, $sql, array($cnpj));
     $linha = pg_fetch_assoc($res);
           $empre = new Empresa($linha['nome'], $linha['CNPJ'], $linha['endereço']);
     pg_close($con);
     return $empre;
   }
   public function alterar($codigo, $novoNome, $novoCNPJ, $novoEndereco){
     $conn = $this->criaConexao();
     $sql4 = 'UPDATE empresa SET nome = $2, "CNPJ" = $3, endereço = $4 WHERE "idEmpresa" = $1';
     $vetor3 = array($codigo, $novoNome, $novoCNPJ, $novoEndereco);
     pg_query_params($conn,$sql4,$vetor3);
     pg_close($conn);
 }
}
//$empdao = new EmpresaDao;
//$empresa = new Empresa('progra(Maria)', '94563441',  'Avenida das Marias, 261');
//$empdao->add($empresa);
//$empdao->lista();
//var_dump($empdao->lista());
//$emp1 = new Empresa('aaaab', '98745869854', 'ddwi bloc 5b');
//$empdao->add($emp1);
?>
