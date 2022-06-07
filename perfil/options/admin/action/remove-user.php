<?php

require('../../../../include/include.php');

session_start();
    
$id = $_GET['user_id'];

$sqlSelect = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$id'");

if(mysqli_num_rows($sqlSelect)){
   
  $sqledit = "DELETE FROM users WHERE user_id = '$id'";

  $resultEdit = $conn->query($sqledit);

  echo "
  <script>
      alert('Conta Apagada com sucesso!');
      location.href='../registro-user.php';
  </script>";
  
}
else{
  echo"
  <script>
    alert('não foi possivel');
    location.href='../registro-user.php';
  </script>
  ";
}
?>