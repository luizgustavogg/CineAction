<?php

session_start();

include_once("../../../include/include.php");

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, md5($_POST['senha']));
$senhanv = mysqli_real_escape_string($conn, md5($_POST['senhanv']));


if(!empty($email) && !empty($senha) && !empty($senhanv)){
  if($senha == $senhanv){
    $sqls = mysqli_query($conn, "SELECT senha FROM users WHERE senha = '$senha' AND unique_id = {$_SESSION['unique_id']}");

    if(mysqli_num_rows($sqls) > 0){
      echo "a senha tem que ser diferente da atual";
    }
    else{
  $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' AND unique_id = {$_SESSION['unique_id']}");

  if(mysqli_num_rows($sql) > 0){

    $sql2 = mysqli_query($conn, "UPDATE users SET senha = '$senha' WHERE email = '$email'");
    
    echo "sucesso";

  }
  else{
    echo "Conta não encontrada";
  }
}

}

  else{
    echo "Senha tem q ser iguais";
  }
}else{
  echo "Preencher todos os campos";
}

?>