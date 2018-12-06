<?php
class Projeto{
  private $idProjeto;
  private $nome;
  private $desc;
  private $empresa;
  private $patrocinadores;

  public function __construct($nome, $desc){
      $this->nome=$nome;
      $this->desc=$desc;
      $this->patrocinadores = array();
  }
  //Getter's
  public function getIdProjeto(){return $this->idProjeto;}
  public function getNome(){return $this->nome;}
  public function getDesc(){return $this->desc;}
  public function getEmpresa(){return $this->empresa;}

  //Setter's
  public function setIdProjeto($idProjeto){$this->idProjeto = $idProjeto;}
  public function setNome($nome){$this->nome = $nome;}
  public function setDesc($desc){$this->desc = $desc;}
  public function setEmpresa($empresa){$this->empresa = $empresa;}

  public function getPatrocinadores(){return $this->Patrocinadores;}
  public function setPatrocinadores($Patrocinadores){$this->Patrocinadores = $Patrocinadores;}
  public function addPatrocinador($patrocinador){array_push($this->Patrocinadores,$patrocinador);}
}



?>
