<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/QuestionarioDao.php';

$questionarioDao = new QuestionarioDao();
$questionario = new Questionario();
$questionario->setIdUsuario(1);
$questionario->setIdTitulo("titulo do quest");

$resultado = $questionarioDao->inserirQuestionario($usuario);
echo $resultado;