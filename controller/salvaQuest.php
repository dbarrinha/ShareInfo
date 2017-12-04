<?php
session_start();
/*titulo_questionario=titulo+questionario
&titulo_perg1=pergunta+1
&txt_alt1,1=alt1+-+1
&txt_alt2,1=alt2+-+1
&tam1=2
&titulo_perg2=pergunta+2
&txt_alt1,2=alt1+-+2
&txt_alt2,2=alt2+-+2
&txt_alt3,2=alt+3+-+2
&tam2=3*/

require_once '../dao/QuestionarioDao.php';
require_once '../model/Questionario.php';


$titulo_questionario = $_GET["titulo_questionario"];
$id_usuario = $_SESSION["id_user"];
//---------------------------------------------------
$questionarioDao = new QuestionarioDao;
$questionario = new Questionario();
$questionario->setIdUsuario($id_usuario);
$questionario->setIdTitulo($titulo_questionario);
//Salva e pega o id, pode melhorar
$questionarioDao->inserirQuestionario($questionario);
$id_questionario = $questionarioDao->getUltimoQuestionarioByIdUser($id_usuario)["id"];
//---------------------------------------------------

$numero_de_perguntas = $_SESSION["index_pergunta"];

for( $i = 1 ; $i <= $numero_de_perguntas ; $i++){
    if (isset($_GET["titulo_perg" . $i])) {
        $titulo_pergunta = $_GET["titulo_perg" . $i];
    } else {
        continue;
    }
    
    if (isset($_GET["tam".$i])) {
        $numero_de_alternativas = $_GET["tam".$i];
    } else {
        continue;
    }

    if (isset($_GET["tipo_pergunta".$i])) {
        $titulo_pergunta = $_GET["tipo_pergunta".$i];
    } else {
        continue;
    }
    
    for($j = 1 ; $j <= $numero_de_alternativas ; $j++){
        $texto_alternativa = $_GET["txt_alt".$j.",".$i];
    }
}
//header("Location:../views/newQuest.php");


