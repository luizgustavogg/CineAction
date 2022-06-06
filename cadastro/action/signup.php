<?php
  session_start();

  include_once("../../include/include.php");
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
  $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));

  if(!empty($nome) && !empty($senha) && !empty($email) && !empty($cpf)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //Se o email for valido
      $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
      if(mysqli_num_rows($sql) > 0){ //se o e-mail já existe
          echo "$email - Este email ja existe!";
      }else{
        
        $status = "USUARIO";
        $random_id = rand(time(), 10000000);

        $nome = strtoupper($nome); // Transformar a String nome em caixa alta

        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, nome, email, cpf, senha, status)
                                      VALUES('$random_id', '$nome', '$email', '$cpf', '$senha', '$status') ");
        if($sql2){ //se esses dados inseridos

          $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
          if(mysqli_num_rows($sql3) > 0 ){
            $row = mysqli_fetch_assoc($sql3);
            $_SESSION['unique_id'] = $row['unique_id']; // usando esta sessão usamos unique_id de usuário em outro arquivo php
            $_SESSION['logado'] = true;
            $_SESSION['nome'] = $row['nome'];
            echo "sucesso";
          }
        }  
        else{
          echo "Algo deu errado!"; 
        }
        }
  }
    else{
      echo "Email precisa ser valido"; 
    }
  } 
  else{
    echo "preencher todos campos";
  }
?>