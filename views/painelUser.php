<?php
    session_start();
    require_once '../dao/QuestionarioDao.php';
    
    $_SESSION["index_pergunta"] = 0;
    $user = "nick nao encontrado";
    if(isset($_SESSION["nick"]) ){
      $user = $_SESSION["nick"];
      $id_user = $_SESSION["id_user"];
    }else{
      header("Location:login.html");
    }
    
    
            
?>

<html>
    <head>
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
          <li><a href="../controller/logout.php">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
        <nav class="z-depth-3 " >
          <div class="nav-wrapper container">
              <a href="../index.html" class="brand-logo">Share Info</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="newQuest.php">Novo Questionário</a></li>
                <li><a href="painelUser.php">Painel</a></li>
              <!-- Dropdown Trigger -->
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?= $user ?><i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
          </div>
        </nav>
        </div>
        <!-- Fim Barra de Navegação-->
            <?php 
                $questionarioDao = new QuestionarioDao();
                $questionarios = $questionarioDao->getQuestionarioByIdUser($id_user);
                
            ?>
        
        
        <div class="container"   style="min-height: 700px; margin-top: 65px;">
            <div class="row">
            <?php foreach( $questionarios as $questionario){ ?>
            <div class="col s3">
              <div class="card">
                <div class="card-panel teal">
                  <span class="white-text"><?= $questionario["titulo"]?></span>
                </div>
                <div class="card-action">
                    <a  href="#">Editar</a>
                </div>
              </div>
            </div>
            <?php }?>
            </div>  
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
        
        
        <script src="../resources/js/jquery.js" ></script>
        <script src="../resources/js/materialize.js"></script>
        <script src="../resources/js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    </body>
    
</html>