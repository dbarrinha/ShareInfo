<?php
session_start();

echo var_dump($_GET);
$titulo_questionario = $_GET["titulo_questionario"];
//$id_usuario = $_SESSION["id_user"];
echo 'Questionario: '.$titulo_questionario;
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

header("Location:../views/newQuest.php");

echo "<script>alert({$string})</script>";