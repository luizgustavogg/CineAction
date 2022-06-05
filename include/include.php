<?php

$conn = mysqli_connect("localhost", "root", "");

if($conn){
  mysqli_select_db($conn, "cineaction");
}else{
  die("error");
}
?>