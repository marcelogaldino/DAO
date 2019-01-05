<?php

require_once("config.php");

$user = new Usuario();

$user->LoadById(3);

echo $user;

//$sql = new Sql();
//$users = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($users);

?>