<?php

require('../../../../include/include.php');

session_start();
    
$id = $_GET['user_id'];

$sqlSelect = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$id'");
$admin = "ADMIN";

if(mysqli_num_rows($sqlSelect)){
    $sqlSelect2 = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$id' AND status = '$admin'");

    if(mysqli_num_rows($sqlSelect2)){
      echo "
      <script>
          alert('Essa conta ja e admin!');
          location.href='../registro-user.php';
      </script>";
    }
    else{
  $sqledit = "UPDATE users SET status = '$admin' WHERE user_id = '$id'";

  $resultEdit = $conn->query($sqledit);

  echo "
  <script>
      alert('Conta Transformada em Admin com sucesso!');
      location.href='../registro-user.php';
  </script>";
    }
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