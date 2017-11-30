<?php

class Alternativa {
   private $idQuestionario;
   private $seqAlternativa;
   private $seqPergunta;
   private $textoAlternativa;
   
   public function getIdQuestionario(){
      return $this->idQuestionario;
   }
   
   public function getSeqAlternativa(){
      return $this->seqAlternativa;
   }
   
   public function getSeqPergunta(){
      return $this->seqPergunta;
   }
   
   public function getTextoAlternativa(){
      return $this->textoAlternativa;
   }
   
   public function setIdQuestionario($idQuestionario){
      $this->idQuestionario = $idQuestionario;
   }
   
   public function setSeqAlternativa($seqAlternativa){
      $this->seqAlternativa = $seqAlternativa;
   }
   
   public function setSeqPergunta($seqPergunta){
      $this->seqPergunta = $seqPergunta;
   }
   
   public function setTextoAlternativa($textoAlternativa){
      $this->textoAlternativa = $textoAlternativa;
   }
}
