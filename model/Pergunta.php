<?php
class Pergunta {
    
   private $id;
   private $idQuestionario;
   private $sequenciaPergunta;
   private $idTipoPergunta;
   private $obrigatorio;
   
   public function getIdPergunta(){
      return $this->id;
   }
   
   public function getIdQuestionario(){
      return $this->idQuestionario;
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
   
   public function setIdPergunta($idPergunta){
      $this->id = $idPergunta;
   }
   
   public function setIdQuestionario($idQuestionario){
      $this->idQuestionario = $idQuestionario;
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
