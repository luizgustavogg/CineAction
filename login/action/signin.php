<?php
session_start();

include_once("../../include/include.php");

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, md5($_POST['senha']));


if(!empty($email) && !empty($senha)){

  //verificar os usuários inseridos e senha combinada com banco de dados qualquer e-mail de linha de tabela e senha

  $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'");

  if(mysqli_num_rows($sql) > 0){ //se as credenciais dos usuários coincidiram
    $row = mysqli_fetch_assoc($sql);

      $_SESSION['unique_id'] = $row['unique_id']; // usando esta sessão usamos unique_id de usuário em outro arquivo php
      $_SESSION['logado'] = true;

      
      echo "sucesso";
  }else{
    echo "Email ou Senha não está correto";
  } 
}
else{
  echo "todos os campos são necessários";
}
?>