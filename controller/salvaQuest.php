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
echo var_dump($_GET);
$titulo_questionario = $_GET["titulo_questionario"];
$id_usuario = $_SESSION["id_user"];

$questionario = new Questionario;
$questionarioDao = new QuestionarioDao;

$questionario->setIdTitulo($titulo_questionario);
$questionario->setIdUsuario($id_usuario);
$questionarioDao->inserirQuestionario($questionario);

$numero_de_perguntas = $_SESSION["index_pergunta"];

for( $i = 1 ; $i <= $numero_de_perguntas ; $i++){
    $titulo_pergunta = $_GET["titulo_perg".$i];
    $numero_de_alternativas = $_GET["tam".$i];
    $titulo_pergunta = $_GET["tipo_pergunta".$i];
    for($j = 1 ; $j <= $numero_de_alternativas ; $j++){
        $texto_alternativa = $_GET["txt_alt".$j.",".$i];
    }
}
$string = "Questionário Salvo com Sucesso!";

//header("Location:../views/newQuest.php");

echo "<script>alert({$string})</script>";
