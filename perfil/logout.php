<?php
  session_start();
  if(isset($_SESSION['unique_id'])){

        session_unset();
        session_destroy();
        header("location: ../index.php");
  }
  else{
    header('Location: ../index.php');
  }
?>