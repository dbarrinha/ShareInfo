<?php

$tipo_pergunta = $_GET['tipoPergunta'];
$num = $_GET['num'];
$id = $_GET['id_pergunta'];

$string = "";
if($tipo_pergunta == 1){
   for($i= 1; $i <= $num; $i++){
        $string .=  "<div class='row'><input type='radio' class='col s6' disabled='disabled'  name='id_alt{$i}' >"
        . "<label for='email'>Alternativa{$i}</label>"
        . "<input class='col s6' type='text' name='txt_alt{$i},{$id}'></div>";
    }
        $string .= "<input type='hidden' value='{$num}' name='tam{$id}'>";
        echo $string;
}else if($tipo_pergunta == 2){
    for($i= 1; $i <= $num; $i++){
        $string .=  "<div class='row'><input  type='checkbox' class='col s6' disabled='disabled' style='display: block' name='id_alt{$i}' > "
        . "<label for='email'>Alternativa{$i}</label>"
        . "<input class='col s6' type='text' name='txt_alt{$i},{$id}'></div>";
    }
    $string .= "<input type='hidden' value='{$num}' name='tam{$id}'>";
    echo $string;
}else if($tipo_pergunta == 3){
     $string .=  "<input type='text' disabled='disabled'  name='texto,{$id}'>";
     $string .= "<input type='hidden' value='{$num}' name='tam{$id}'>";
     echo $string;
}else{
    echo "";
}

