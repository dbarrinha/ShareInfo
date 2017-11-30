<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/TipoPergunta.php';

class TipoPerguntaDao {
   
   public function atualizarTipoPergunta(TipoPergunta $tipoPergunta){
      $idTipoPergunta = $tipoPergunta->getIdTipoPergunta();
      $nomeTipo = $tipoPergunta->getNomeTipoPergunta();
      
      $query = "UPDATE tipo_pergunta SET nome_tipo=? WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("si", $nomeTipo, $idTipoPergunta);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function deletarTipoPergunta($idTipoPergunta){
      
      $query = "DELETE FROM tipo_pergunta WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idTipoPergunta);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function inserirTipoPergunta(TipoPergunta $tipoPergunta){
      $id = $tipoPergunta->getIdTipoPergunta();
      $nomeTipo = $tipoPergunta->getNomeTipoPergunta();
        
      $query = "INSERT INTO tipo_pergunta VALUES (?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("is", $id, $nomeTipo);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function getTipoPerguntaById($idPergunta){        
      $query = "SELECT * FROM tipo_pergunta WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idPergunta);
      if($stmt->execute()){
         $resultado = $stmt->get_result();
         $arrayObjeto = $resultado->fetch_array(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayObjeto;
      }
      return false;
   }
      
}
