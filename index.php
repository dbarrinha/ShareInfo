<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/PerguntaDao.php';

function teste(){
   $pergDao = new PerguntaDao();
   $perg = new Pergunta();
   
   $perg->setIdPergunta(3);
   $perg->setIdQuestionario(1);
   $perg->setSequenciaPergunta(2);
   $perg->setIdTipoPergunta(3);
   $perg->setObrigatorio(1);
   
   $resultado = $pergDao->atualizarPergunta($perg);
   echo $resultado;
}

teste();