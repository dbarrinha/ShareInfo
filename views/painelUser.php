<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

    session_start();
    $user = "nick nao encontrado";
    if(isset($_SESSION["nick"])){
      $user = $_SESSION["nick"];
    }else{
      
      header("Location:login.html");
      //quando for pra login, mostrar uma mensagem lá mandando o usuario logar
    }

     

?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                font: 20px Montserrat, sans-serif;
                line-height: 1.8;
                color: #1abc9c;
            }   
             p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
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
      color: #fff;
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
  
  .newQuest{
      border-style: double;
      background-color: red;
  }
        </style>
    </head>
    <body>
        <!-- Navbar -->
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
    </body>
</html>
