<?php
class TipoPergunta {
    
   private $id;
   private $nomeTipo;
   
   public function getIdTipoPergunta(){
      return $this->id;
   }
   
   public function getNomeTipoPergunta(){
      return $this->nomeTipo;
   }
      
   public function setIdTipoPergunta($idPergunta){
      $this->id = $idPergunta;
   }
   
   public function setNomeTipoPergunta($nomeTipoPergunta){
      $this->nomeTipo = $nomeTipoPergunta;
   }
   
   
   
}
