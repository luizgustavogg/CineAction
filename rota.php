<?php session_start();
if(!isset($_SESSION['logado'])){
  header('Location: login/login.php');
}
else{
  header('Location: ../perfil/perfil.php');
}
?>