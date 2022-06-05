<?php

session_start();

include_once("../../../include/include.php");

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);


if(!empty($email) && !empty($senha)){

  $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND unique_id = {$_SESSION['unique_id']}");

  if(mysqli_num_rows($sql) > 0){

    $sql2 = mysqli_query($conn, "DELETE FROM users WHERE email = '$email' and senha = '$senha' AND unique_id = {$_SESSION['unique_id']}");
    
    echo "sucesso";
  }
  else{
    echo "Conta não encontrada";
  }

}else{
  echo "Preencher todos os campos";
}

?>