<?php 
session_start();

$id = ++$_SESSION["index_pergunta"];

require '../model/Pergunta.php';
$pergunta = "
    <div id='{$id}' >
                        <div class='row z-depth-1'>  
                        <div class='input-field col s6'>
                            <input id='email' type='text' required='' class='validate' name='titulo_perg{$id}' id='titulo{$id}'>
                            <label for='email'>Pergunta{$id}</label>
                        </div>
                        <div class='input-field col s3'>    
                        <select  id='menu{$id}'  name='tipo_pergunta{$id}'  onchange='escolheResposta({$id})'>
                            <option value=' ' selected='selected'>Escolha a forma de resposta</option>
                            <option value='1' >Única Opção</option>
                            <option value='2'>Multipla Escolha</option>
                            <option value='3'>Discursiva</option>
                        </select>
                        </div>
                         
                        <select  id='num{$id}' class='browser-default input-field col s2 none' style=' display: none; '  onchange='escolheRespostaNum({$id})'>
                            <option value='0' selected='selected' > Escolha o numero de respostas</option>
                            <option value='1' >1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                        </select>
                        <button class='btn waves-effect btn-floating' type='button' onclick='removeById({$id})'>
                          <i class='material-icons right'>delete_forever</i>
                        </button>
                        </div>
                        <div id='pergunta{$id}'>
                        </div> 
                    </div>";

echo $pergunta; 
