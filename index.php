<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/UsuarioDao.php';

$usuarioDao = new UsuarioDao();
$usuario = new Usuario();
$usuario->setIdUsuario(2);
$usuario->setNome("Nilson Corno");
$usuario->setEmail("email2@email.com");
$usuario->setNick("meunick2");
$usuario->setSenha("senha1232");

$resultado = $usuarioDao->atualizarUsuario($usuario);
echo json_encode($resultado);