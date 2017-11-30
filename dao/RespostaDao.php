<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Resposta.php';

class RespostaDao {
   
   public function atualizarResposta(Resposta $resposta){
      
      $resultadoDeletar = $this->deletarResposta($resposta);
      if($resultadoDeletar===TRUE){
         $resultadoInserir = $this->inserirResposta($resposta);
         if($resultadoInserir===TRUE){
            return TRUE;
         }else{
            return $resultadoInserir;
         }
         
      }else{
         return $resultadoDeletar;
      }
   }
   
   public function deletarResposta(Resposta $resposta){
      $idQuestionario = $resposta->getIdQuestionario();
      $seqPergunta = $resposta->getSeqPergunta();
      $seqAlternativa = $resposta->getSeqAlternativa();
      $idUsuario = $resposta->getIdUsuario();
      
      $query = "DELETE FROM resposta WHERE id_pergunta=? AND seq_pergunta=? "
              . "AND seq_alternativa=? AND id_usuario=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiii", $idQuestionario, $seqPergunta, $seqAlternativa, $idUsuario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function inserirResposta(Resposta $resposta){
      $idQuestionario = $resposta->getIdQuestionario();
      $seqPergunta = $resposta->getSeqPergunta();
      $seqAlternativa = $resposta->getSeqAlternativa();
      $idUsuario = $resposta->getIdUsuario();
        
      $query = "INSERT INTO resposta VALUES (?,?,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiii", $idQuestionario, $seqPergunta, $seqAlternativa, $idUsuario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function getRespostaBy(Resposta $resposta){    
      $idQuestionario = $resposta->getIdQuestionario();
      $seqPergunta = $resposta->getSeqPergunta();
      $seqAlternativa = $resposta->getSeqAlternativa();
      $idUsuario = $resposta->getIdUsuario();
      
      $query = "SELECT * FROM resposta WHERE id_pergunta=? AND seq_pergunta=? "
              . "AND seq_alternativa=? AND id_usuario=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiii", $idQuestionario, $seqPergunta, $seqAlternativa, $idUsuario);
      if($stmt->execute()){
         $resultado = $stmt->get_result();
         $arrayObjeto = $resultado->fetch_array(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayObjeto;
      }
      return false;
   }
   
   public function getRespostaByQuestionario($idQuestionario){        
      $query = "SELECT * FROM resposta WHERE id_questionario=?";
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
