<?php

class Alternativa {
   private $idAlternativa;
   private $idPergunta;
   private $textoAlternativa;
   
   public function getIdAlternativa(){
      return $this->idAlternativa;
   }
   
   public function getIdPergunta(){
      return $this->idPergunta;
   }
   
   public function getTextoAlternativa(){
      return $this->textoAlternativa;
   }
   
   public function setIdAlternativa($idAlternativa){
      $this->idAlternativa = $idAlternativa;
   }
   
   public function setIdPergunta($idPergunta){
      $this->idPergunta = $idPergunta;
   }
   
   public function setTextoAlternativa($textoAlternativa){
      $this->textoAlternativa = $textoAlternativa;
   }
}
