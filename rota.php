<?php 
session_start();


if(!isset($_SESSION['logado'])){
  header('Location: login/login.php');
}
else{

  include_once('include/include.php');

  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  
  $row = mysqli_fetch_assoc($sql);

  if(!isset($_SESSION['admin'])){
  header('Location: ../perfil/perfil.php');
  }
  else{
    header('Location: ../perfil/perfil-admin.php');
  }
}
?>