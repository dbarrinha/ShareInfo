<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Alternativa.php';

class AlternativaDao {
   public function inserirAlternativa(Alternativa $alternativa){
      $idAlternativa = $alternativa->getIdAlternativa();
      $idPergunta = $alternativa->getIdPergunta();
      $textoAlternativa = $alternativa->getTextoAlternativa();
        
      $query = "INSERT INTO alternativa VALUES (?,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iis", $idAlternativa, $idPergunta, $textoAlternativa);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return false;
    }
}
