<?php
class Pergunta {
    
   private $idQuestionario;
   private $tituloPergunta;
   private $sequenciaPergunta;
   private $idTipoPergunta;
   private $obrigatorio;
      
   public function getIdQuestionario(){
      return $this->idQuestionario;
   }
   
   public function getTituloPergunta(){
       return $this->tituloPergunta;
   }

   public function getSequenciaPergunta(){
      return $this->sequenciaPergunta;
   }
   
   public function getIdTipoPergunta(){
      return $this->idTipoPergunta;
   }
   
   public function getObrigatorio(){
      return $this->obrigatorio;
   }
      
   public function setIdQuestionario($idQuestionario){
      $this->idQuestionario = $idQuestionario;
   }
   
   public function setTituloPergunta($tituloPergunta){
       $this->tituloPergunta = $tituloPergunta;
   }

      public function setSequenciaPergunta($sequenciaPergunta){
      $this->sequenciaPergunta = $sequenciaPergunta;
   }
   
   public function setIdTipoPergunta($tipoPergunta){
      $this->idTipoPergunta = $tipoPergunta;
   }
   
   public function setObrigatorio($obrigatorio){
      $this->obrigatorio = $obrigatorio;
   }
   
   
}
