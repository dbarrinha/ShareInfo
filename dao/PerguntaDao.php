<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Pergunta.php';

class PerguntaDao {
   
   public function atualizarPergunta(Pergunta $pergunta){
      $idQuestionario = $pergunta->getIdQuestionario();
      $seqPergunta = $pergunta->getSequenciaPergunta();
      $idTipoPergunta = $pergunta->getIdTipoPergunta();
      $obrigatorio = $pergunta->getObrigatorio();
      $tituloPergunta = $pergunta->getTituloPergunta();
        
      $query = "UPDATE pergunta SET tipo_pergunta=?, obrigatorio=? "
              . "WHERE id_questionario=? AND sequencia_pergunta=? AND titulo_pergunta =?" ;
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiis", $idTipoPergunta, $obrigatorio, $idQuestionario, $seqPergunta,$tituloPergunta);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function deletarPergunta($idQuestionario, $seqPergunta){        
      $query = "DELETE FROM pergunta WHERE id_questionario=? AND sequencia_pergunta=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("ii",$idQuestionario, $seqPergunta);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function inserirPergunta(Pergunta $pergunta){
      $idQuestionario = $pergunta->getIdQuestionario();
      $sequenciaPergunta = $pergunta->getSequenciaPergunta();
      $idTipoPergunta = $pergunta->getIdTipoPergunta();
      $obrigatorio = $pergunta->getObrigatorio();
      $tituloPergunta = $pergunta->getTituloPergunta();
      
      $query = "INSERT INTO pergunta VALUES (?,?,?,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiis", $idQuestionario, $sequenciaPergunta,$tituloPergunta, $idTipoPergunta, $obrigatorio );
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function getPerguntaById($idQuestionario, $seqPergunta){        
      $query = "SELECT * FROM pergunta WHERE id_questionario=? AND sequencia_pergunta=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("ii",$idQuestionario, $seqPergunta);
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
      $query = "SELECT * FROM pergunta WHERE id_questionario=? ORDER BY sequencia_pergunta ASC";
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
