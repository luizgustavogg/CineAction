<?php

require('../../../../include/include.php');

session_start();
    
$id = $_GET['id_prod'];

$sqlSelect = mysqli_query($conn, "SELECT * FROM produto WHERE id_prod = '$id'");

if(mysqli_num_rows($sqlSelect)){
   
  $sqledit = "DELETE FROM produto WHERE id_prod = '$id'";

  $resultEdit = $conn->query($sqledit);

  echo "
  <script>
      alert('Produto Apagado com sucesso!');
      location.href='../registro-prod.php';
  </script>";
  
}
else{
  echo"
  <script>
    alert('não foi possivel');
    location.href='../registro-prod.php';
  </script>
  ";
}
?>