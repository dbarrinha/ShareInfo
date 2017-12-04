<?php
    session_start();
    $_SESSION["index_pergunta"] = 0;
    $user = "nick nao encontrado";
    if(isset($_SESSION["nick"])){
      $user = $_SESSION["nick"];
    }else{
      header("Location:login.html");
    }
?>

<html>
    <head>
        <title>Novo Questionário</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../resources/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

        <style>
             body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
              }

              main {
                flex: 1 0 auto;
              }
        </style>
    </head>
    
    <body >
        
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!">Perfil</a></li>
          <li><a href="#!">Configurações</a></li>
          <li class="divider"></li>
          <li><a href="#!">Sair</a></li>
        </ul>
        <nav class="z-depth-3 " style="position: fixed;top: 0;overflow: hidden;">
          <div class="nav-wrapper">
              <a href="../index.html" class="brand-logo">Share Info</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="painelUser.php">Painel</a></li>
              <!-- Dropdown Trigger -->
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?= $user ?><i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
          </div>
        </nav>
        <!-- Fim Barra de Navegação-->
        
        
        
        <div class="container"   style="min-height: 700px; margin-top: 65px;">
            <form method="GET"  id="formPrincipal" action="../controller/salvaQuest.php" class="text-center" >
                <div id="questionario"  class="container-fluid " >
                    <div class="input-field col s6">
                        
                        <input id="titulo_questionario" name='titulo_questionario' type="text" required="" class="validate">
                        <label for="titulo_questionario">Título do Questionário</label>
                    </div>
                     
                     
                </div>
                
                
                <button type="button" class="waves-effect waves-light btn"  onclick="novaPergunta()">Nova Pergunta
                    <i class="material-icons right">plus_one</i>
                </button>
                
                <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
                    <i class="material-icons right">send</i>
                </button>
            </form>
             
        </div>   
            <footer class="page-footer">
                <div class="container" >
                  <div class="row">
                    <div class="col l6 s12">
                      <h5 class="white-text">Footer Content</h5>
                      <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                      <h5 class="white-text">Links</h5>
                      
                    </div>
                  </div>
                </div>
                <div class="footer-copyright">
                  <div class="container">
                  © 2014 Copyright Text
                  <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                  </div>
                </div>
              </footer>
        
        <script>
            window.onbeforeunload =function fecharJanela(){  
                return "Você realmente deseja fechar a janela?"  
            }  
            
            function escolheResposta(id_pergunta){
                var valor = $("#menu"+id_pergunta).val();
                var num = $("#num"+id_pergunta).val();
                if(valor == 1 || valor == 2){
                    $("#num"+id_pergunta).show();
                    $("#pergunta"+id_pergunta).html("");
                }
                else {
                    num = 0;
                    $("#num"+id_pergunta).hide();
                    $.get("../controller/questao.php", {
                        tipoPergunta :valor, num : num,
                        id_pergunta :id_pergunta
                    }).done(function (val){
                        $("#pergunta"+id_pergunta).html(val);
                        $('select').material_select();
                    });
                    
                }
            }
            
            function escolheRespostaNum(id_pergunta){
                var num = $("#num"+id_pergunta).val();
                var valor = $("#menu"+id_pergunta).val();
                $.get("../controller/questao.php", {
                        tipoPergunta :valor,
                        num : num,
                        id_pergunta :id_pergunta
                    }).done(function (val){
                        $("#pergunta"+id_pergunta).html(val);
                        $('select').material_select(); 
                    });
                    
            }
            
            function novaPergunta(){
                $.get("../controller/getPergunta.php").done(function (val){
                        $("#questionario").append(val);
                        $('select').material_select();
                        $('.progress').delay(400).fadeOut('slow');   
                    });
                
            }
            
            function removeById(id){
                $("#"+id).remove();
            }
             
            function preLoader(){
                alert("fdfsd");
            }
            
            

        </script>
        <script src="../resources/js/jquery.js" ></script>
        <script src="../resources/js/materialize.js"></script>
        <script src="../resources/js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    </body>
    
</html>

