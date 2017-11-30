<?php

$tipo_pergunta = $_GET['tipoPergunta'];
$num = $_GET['num'];
$id = $_GET['id_pergunta'];

$string = "";
if($tipo_pergunta == 1){
   for($i= 1; $i <= $num; $i++){
        $string .=  "<input type='radio' disabled='disabled' style='display:  block' class='tamG' name='id_alt{$i}' ><input type='text' name='txt_alt{$i},{$id}'>";
    }
        $string .= "<input type='hidden' value='{$num}' name='tam{$id}'>";
        echo $string;
}else if($tipo_pergunta == 2){
    for($i= 1; $i <= $num; $i++){
        $string .=  "<input  type='checkbox' disabled='disabled' class='tamG' style='display: block' name='id_alt{$i}' > <input type='text' name='txt_alt{$i},{$id}'>";
    }
    $string .= "<input type='hidden' value='{$num}' name='tam{$id}'>";
    echo $string;
}else if($tipo_pergunta == 3){
     $string .=  "<input type='text' class='pergunta' name='texto,{$id}'>";
     $string .= "<input type='hidden' value='{$num}' name='tam{$id}'>";
     echo $string;
}else{
    echo "";
}

