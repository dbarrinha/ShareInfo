<?php
class Resposta {
    
   private $idQUestionario;
   private $seqAlternativa;
   private $seqPergunta;
   private $idUsuario;

   public function getIdQuestionario(){
      return $this->idQUestionario;
   }
   
   public function getSeqAlternativa(){
      return $this->seqAlternativa;
   }

   public function getSeqPergunta(){
      return $this->seqPergunta;
   }

   public function getIdUsuario(){
      return $this->idUsuario;
   }

   public function setIdQuestionario($idQuestionario){
      $this->idQUestionario = $idQuestionario;
   }
   
   public function setSeqAlternativa($seqAlternativa){
      $this->seqAlternativa = $seqAlternativa;
   }

   public function setSeqPergunta($seqPergunta){
      $this->seqPergunta = $seqPergunta;
   }

   public function setIdUsuario($idUsuario){
      $this->idUsuario = $idUsuario;
   }

}