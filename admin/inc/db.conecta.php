<?php
require_once('config.php');

$login  = USUARIO;
$senha  = SENHA;
$host 	= SERVIDOR;
$banco 	= BANCO;

try {
  $conn = mysqli_connect($host, $login, $senha, $banco);
} catch (\Throwable $th) {
  throw $th;
}
?>