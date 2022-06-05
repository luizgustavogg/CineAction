<?php 
session_start();


if(!isset($_SESSION['logado'])){
  $outputnome = "login";
}
else{
  include_once('../../include/include.php');

  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

  $row = mysqli_fetch_assoc($sql);

  $outputnome = $row['nome'];
}

?>

<nav>
    <div class="nav-itens">
      <div class="nav-logo">
        <a href="../../index.php"><img src="../../img/logo.jpg" alt=""></a>
      </div>
      <ul class="main-nav">
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../../catalogo/catalogo.html">Catalogo</a></li>
      </ul>

      <ul class="main-nav profile">

        <li><a href="rota.php"><?php echo $outputnome; ?> </a></li>
      </ul>
    </div>
  </nav>