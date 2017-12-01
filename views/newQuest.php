<?php
    session_start();
    $_SESSION["index_pergunta"] = 0;
    $user = "nick nao encontrado";
    if(isset($_SESSION["nick"])){
      $user = $_SESSION["nick"];
    }else{
      
      header("Location:login.html");
      //quando for pra login, mostrar uma mensagem lá mandando o usuario logar
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Novo Questionário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../resources/js/jquery.js"></script>
        <style>
            
            body {
                font: 20px Montserrat, sans-serif;
                line-height: 1.8;
                color: #1abc9c;
            }
            p {font-size: 16px;}
            .margin {margin-bottom: 45px;
                     color: black;
            }
            .bg-1 { 
                background-color: lightcoral; /* Green */
                color: black;
            }
            .bg-2 { 
                background-color: #474e5d; /* Dark Blue */
                color: #ffffff;
            }
            .bg-3 { 
                background-color: #ffffff; /* White */
                color: #555555;
            }
            .bg-4 { 
                background-color: #2f2f2f; /* Black Gray */
                color: #1abc9c;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 5px;
                background-color: #33ccff !important;
            }
            .navbar-nav  li a:hover {
                color: #1abc9c !important;
            }
            .tamG{
                width: 20px;
                height: 20px;
                
            }
            .newAsk{
                color: black;
                background-color:aliceblue;
                text-decoration:infotext; 
                width: 100%;
                
                    
            }
        </style>
        <script>
            
            
        </script>
    </head>
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Share Info</a>
                <a class="navbar-brand" href="painelUser.php">Painel</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a  href="newQuest.php">NOVO QUESTIONÁRIO!</a></li>
                  <li><a><?= $user ?></a></li>
                  <li><a href="/controller/logout.php">Sair</a></li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="bg-1">
            <form method="GET" id="formPrincipal" action="../controller/salvaQuest.php" class="text-center">
                <div id="questionario" class="container-fluid " >
                    <h3 class="margin text-center">Qual sua pergunta?</h3>
                    <input id='titulo_questionario' name="titulo_questionario" required="">
                    
                    
                </div>
                <input type="button" class="newAsk" value="Nova Pergunta +" onclick="novaPergunta()">
                <input type="submit" class="btn-lg" value="Envia">
            </form>
            
            
        </div> 
        <script>
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
                    });
            }
            
            function novaPergunta(){
                $.get("../controller/newQuest.php").done(function (val){
                        $("#questionario").append(val);
                    });
            }
        </script>
    </body>
    
</html>

