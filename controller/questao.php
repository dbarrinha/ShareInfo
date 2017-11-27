<?php

$tipo_pergunta = $_GET['tipoPergunta'];
$num = $_GET['num'];



if($tipo_pergunta == 1){
   for($i= 1; $i <= $num; $i++){
        echo "<input type='radio' style='display:  block' class='tamG' name='op' value='{$i}'><input type='text' name='op{$i}-r'>";
    }
}else if($tipo_pergunta == 2){
    for($i= 1; $i <= $num; $i++){
        echo "<input type='checkbox' class='tamG' style='display: block' name='op{$i}' > <input type='text' name='op{$i}-r'>";
    }
}else if($tipo_pergunta == 3){
     echo "<input type='text' class='pergunta' name='texto'>";
}else{
    echo "";
}

