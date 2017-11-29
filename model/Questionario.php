<?php
class Questionario {
    
   private $id;
   private $id_usuario;
   private $titulo;

   public function getIdQuestionario(){
      return $this->id;
   }

   public function getIdUsuario(){
      return $this->id_usuario;
   }
   
   public function getIdTitulo(){
      return $this->titulo;
   }
   
   public function setIdQuestionario($idQuestionario){
      $this->id = $idQuestionario;
   }

   public function setIdUsuario($idUsuario){
      $this->id_usuario = $idUsuario;
   }
   
   public function setIdTitulo($titulo){
      $this->titulo = $titulo;
   }
   
}

