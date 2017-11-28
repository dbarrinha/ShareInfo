<?php 
//$id_pergunta = $_GET["id_pergunta"];
$id= 2;
$pergunta = "<hr/>
    <div id='{$id}'>
                        <input class='form-control' type='text' id='titulo{$id}' placeholder='Pergunta' >
                        <select  id='menu{$id}' class='form-control bg-3'   onchange='escolheResposta()'>
                            <option value=' ' selected='selected'>Escolha a forma de resposta</option>
                            <option value='1' >Única Opção</option>
                            <option value='2'>Multipla Escolha</option>
                            <option value='3'>Discursiva</option>
                        </select>
                        <select  id='num{$id}' class='form-control bg-3' style='display:none'  onchange='escolheRespostaNum()'>
                            <option value='0' selected='selected' > Escolha o numero de respostas</option>
                            <option value='1' >1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                        </select>
                        <div id='pergunta{$id}'>
                        </div> 
                    </div>";

echo $pergunta;