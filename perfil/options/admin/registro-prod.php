<?php
    include_once('../../../include/include.php');
    session_start();
      if(!isset($_SESSION['logado'])){
        header('Location: ../../perfil.php');
      }
      else{
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      
        $row = mysqli_fetch_assoc($sql);
    
        if(!isset($_SESSION['admin'])){
            header('Location: ../../perfil.php');
        }
        else{
        $outputnome = $row['nome'];
        }
      }

    $sql = "SELECT * FROM produto";

$result2 = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
  <link rel="stylesheet" href="../../../assets/css/style-card.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <body>

    <nav>
        <div class="nav-itens">
          <div class="nav-logo">
            <a href="../../../index.php"><img src="../../../img/logo.jpg" alt=""></a>
          </div>
          <ul class="main-nav">
            <li><a href="../../../index.php">Home</a></li>
            <li><a href="../../../catalogo/catalogo.php">Catalogo</a></li>
          </ul>
    
          <ul class="main-nav profile">
    
            <li><a href="../rota.php"><?php echo $row['nome']; ?></a></li>
          </ul>
        </div>
      </nav>
      <section class="card">
        <div class="card-content">
          <div class="card-title" id="registro">
        <h3 id='h3r'>Registro de produtos</h3>

        <div class="table-se">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col">id_prod</th>
                        <th scope="col" class="col">prod_unique_id</th>
                        <th scope="col" class="col">Nome</th>
                        <th scope="col" class="col">descricao</th>
                        <th scope="col" class="col">categoria</th>
                        <th scope="col" class="col">img</th>
                        <th scope="col" class="col">Editar</th>
                        <th scope="col" class="col">Apagar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
    while($user = mysqli_fetch_assoc($result2)){
        $id = $user['id_prod'];
        $prod_unique_id = $user['prod_unique_id'];
        $nome = $user['nome'];
        $descricao = $user['descricao'];
        $categoria = $user['categoria'];
        $img = $user['img'];
        $edit = "edit-produtos.php?id_prod=$id";
        $remove = "action/remove-prod.php?id_prod=$id";
        
        echo"
        <tr>
            
        <td>$id</td>
        <td>$prod_unique_id</td>
        <td>$nome</td>
        <td>$descricao</td>
        <td>$categoria</td>
        <td>$img</td>
        <td>
        <a href='$edit'>
        <button class='btn-delet'>
        editar
        </button>
        </td>
        <td>
        <a href='$remove'>
        <button class='btn-delet'>
        apagar
        </button>
        </a>
        </td>
        <tr>";
        }
        
    ?>
                </tbody>
            </table>
        </div>

        </div>
      </div>
      </section>
    </body>

</html>