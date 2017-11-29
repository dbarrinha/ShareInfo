<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Pergunta.php';

class PerguntaDao {
   
   public function atualizarPergunta(Pergunta $pergunta){
      $idPergunta = $pergunta->getIdPergunta();
      $idQuestionario = $pergunta->getIdQuestionario();
      $sequenciaPergunta = $pergunta->getSequenciaPergunta();
      $idTipoPergunta = $pergunta->getIdTipoPergunta();
      $obrigatorio = $pergunta->getObrigatorio();
        
      $query = "UPDATE pergunta SET id_questionario=?, sequencia_pergunta=?, "
              . "tipo_pergunta=?, obrigatorio=? WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiii", $idQuestionario, $sequenciaPergunta,$idTipoPergunta, $obrigatorio, $idPergunta);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return false;
   }
   
   public function deletarPergunta($idPergunta){        
      $query = "DELETE FROM pergunta WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idPergunta);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return false;
   }
   
   public function inserirPergunta(Pergunta $pergunta){
      $idQuestionario = $pergunta->getIdQuestionario();
      $sequenciaPergunta = $pergunta->getSequenciaPergunta();
      $idTipoPergunta = $pergunta->getIdTipoPergunta();
      $obrigatorio = $pergunta->getObrigatorio();
        
      $query = "INSERT INTO pergunta VALUES (NULL,?,?,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiii", $idQuestionario, $sequenciaPergunta,$idTipoPergunta, $obrigatorio);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return false;
   }
   
   public function getPerguntaById($idPergunta){        
      $query = "SELECT * FROM pergunta WHERE id=?";
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
   
   public function getPerguntasByQuestionario($idQuestionario){        
      $query = "SELECT * FROM pergunta WHERE id_questionario=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idQuestionario);
      if($stmt->execute()){
         $resultado = $stmt->get_result();
         $arrayObjeto = $resultado->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayObjeto;
      }
      return false;
   }
   
}
