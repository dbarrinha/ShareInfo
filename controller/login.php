<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
  
  $nick = $_POST['nick'];
  $entrar = $_POST['entrar'];
  $senha = $_POST['senha'];
  $con = ConexaoBD::getConexao();  
  
    if (isset($entrar)) {
        //$usuarioDao = new UsuarioDao();
        //$usuario = $usuarioDao->getUsuarioByNick($nick);
             
      $query = "SELECT * FROM usuario WHERE nick = '$nick' AND senha = '$senha'";
      $stmt = $con->prepare($query);
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            if (mysqli_num_rows($resultado) <=0){
              echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../views/login.html';</script>";
              die();
            }else{
              setcookie("nick",$nick);
              $_SESSION["index_pergunta"] = 0;
              $_SESSION["nick"] = $nick;
              //atribuir o id na sessao tbm
              header("Location:../views/painelUser.php");
            }
        }
    }
?>
