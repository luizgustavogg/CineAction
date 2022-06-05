<?php

session_start();

include_once("../../../include/include.php");

$email = mysqli_real_escape_string($conn, $_POST['email']);
$emailnv = mysqli_real_escape_string($conn, $_POST['emailnv']);


if(!empty($email) && !empty($emailnv)){
  if(filter_var($emailnv, FILTER_VALIDATE_EMAIL)){ //Se o email for valido

  $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' AND unique_id = {$_SESSION['unique_id']}");

  if(mysqli_num_rows($sql) > 0){

    $sql2 = mysqli_query($conn, "UPDATE users SET email = '$emailnv' WHERE email = '$email'");
    
    echo "sucesso";

  }
  else{
    echo "Conta não encontrada";
  }
}
  else{
    echo "email tem que ser valido";
  }
}else{
  echo "Preencher todos os campos";
}

?>