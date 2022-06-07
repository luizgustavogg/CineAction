<?php
  session_start();
  include_once("../../include/include.php");
  $sql = mysqli_query($conn, "SELECT * FROM produto ORDER BY id_prod DESC");
  $output = "";
  if(mysqli_num_rows($sql) < 1){
    $output .= "nenhum filme/serie encontrado";
  }else if(mysqli_num_rows($sql) > 0 ){
    while($row = mysqli_fetch_assoc($sql)){
      $output .= '
      <div class="item-c">
        <img src="../images-prod/' . $row['img'] . '" alt="' . $row['id_prod'] . '">
      </div>
      ';
    }
  }


  echo $output;
?>

