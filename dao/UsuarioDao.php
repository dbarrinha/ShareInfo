<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Usuario.php';

class UsuarioDao {
   
   public function atualizarUsuario(Usuario $usuario){
      $idUsuario = $usuario->getIdUsuario();
      $nome = $usuario->getNome();
      $email = $usuario->getEmail();
      $nick = $usuario->getNick();
      $senha = $usuario->getSenha();
        
      $query = "UPDATE usuario SET nome=?, email=?, nick=?, senha=? WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssssi", $nome, $email, $nick, $senha, $idUsuario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function deletarUsuario($idUsuario){        
      $query = "DELETE FROM usuario WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idUsuario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function inserirUsuario(Usuario $usuario){
      $nome = $usuario->getNome();
      $email = $usuario->getEmail();
      $nick = $usuario->getNick();
      $senha = $usuario->getSenha();
        
      $query = "INSERT INTO usuario VALUES (NULL,?,?,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssss", $nome, $email, $nick, $senha);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
   }
   
   public function getUsuarioById($idUsuario){        
      $query = "SELECT * FROM usuario WHERE id=?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idUsuario);
      if($stmt->execute()){
         $resultado = $stmt->get_result();
         $arrayObjeto = $resultado->fetch_array(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayObjeto;
      }
      return false;
   }
   
   public function getUsuarioByNickSenha($nick,$senha){        
      $query = "SELECT * FROM usuario WHERE nick=? and senha =?";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("ss", $nick,$senha);
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
