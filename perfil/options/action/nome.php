<?php

session_start();

include_once("../../../include/include.php");

$email = mysqli_real_escape_string($conn, $_POST['email']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);


if(!empty($email) && !empty($nome)){
  $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' AND unique_id = {$_SESSION['unique_id']}");

  if(mysqli_num_rows($sql) > 0){
    $nome = strtoupper($nome); // Transformar a String nome em caixa alta
    
    $sql2 = mysqli_query($conn, "UPDATE users SET nome = '$nome' WHERE email = '$email'");
    
    echo "sucesso";

  }
  else{
    echo "Conta não encontrada";
  }
}else{
  echo "Preencher todos os campos";
}

?>