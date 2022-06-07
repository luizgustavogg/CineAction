<?php
  session_start();
  include_once("../../include/include.php");
  $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
  $output = "";
  $sql = mysqli_query($conn, "SELECT * FROM produto WHERE nome LIKE '%$searchTerm%'");
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
  }else{
    $output .= "nenhum filme/serie encontrado relacionado ao seu termo de pesquisa";
  }

  echo $output;
?>