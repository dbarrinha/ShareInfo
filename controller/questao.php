<?php

$tipo_pergunta = $_GET['tipoPergunta'];
$num = $_GET['num'];
#tipo 1 = resposta curta
if($tipo_pergunta == 1){
   for($i= 0; $i < $num; $i++){
        echo "<input type='radio' name='op' value='{$i}'> opção ".$i;
    }
}else if($tipo_pergunta == 2){
    for($i= 0; $i < $num; $i++){
        echo "<input type='checkbox' name='op{$i}'> opção ".$i;
    }
}else if($tipo_pergunta == 3){
     echo "<input type='text' name='texto'>";
}else{
    echo "";
}

