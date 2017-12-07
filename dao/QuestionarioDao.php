<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Questionario.php';

class QuestionarioDao {
   
   public function atualizarQuestionario(Questionario $questionario){
      $idQuestionario = $questionario->getIdQuestionario();
      $idUsuario = $questionario->getIdUsuario();
      $titulo = $questionario->getIdTitulo();
        
      $query = "UPDATE questionario SET id_usuario=?, titulo=? WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("isi", $idUsuario, $titulo, $idQuestionario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return false;
   }
   
   public function deletarQuestionario($idPergunta){        
      $query = "DELETE FROM questionario WHERE id=?";
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
   
   public function inserirQuestionario(Questionario $questionario){
      $idUsuario = $questionario->getIdUsuario();
      $titulo = $questionario->getIdTitulo();
        
      $query = "INSERT INTO questionario VALUES (NULL,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("is", $idUsuario, $titulo);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return false;
   }
   
   public function getQuestionarioById($idQuestionario){        
      $query = "SELECT * FROM questionario WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idQuestionario);
      if($stmt->execute()){
         $resultado = $stmt->get_result();
         $arrayObjeto = $resultado->fetch_array(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayObjeto;
      }
      return false;
   }
   
   public function getUltimoQuestionarioByIdUser($iduser){        
      $query = "SELECT * FROM questionario q WHERE q.id_usuario = ? ORDER BY q.id DESC LIMIT 1";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $iduser);
      if($stmt->execute()){
         $resultado = $stmt->get_result();
         $arrayObjeto = $resultado->fetch_array(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayObjeto;
      }
      return false;
   }
   
   public function getQuestionarioByIdUser($iduser){        
      $query = "SELECT * FROM questionario q WHERE q.id_usuario = ? ORDER BY q.id ";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $iduser);
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
