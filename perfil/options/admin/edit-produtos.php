<?php
    include_once('../../../include/include.php');
session_start();
  if(!isset($_SESSION['logado'])){
    $outputnome = "login";
  }
  else{
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  
    $row = mysqli_fetch_assoc($sql);

    if(!isset($_SESSION['admin'])){
        header('Location: perfil.php');
    }
    else{
    $outputnome = $row['nome'];
    }
  }
  $id = $_GET['id_prod'];

  $sqlselect = mysqli_query($conn, "SELECT * FROM produto WHERE '$id'");

  $row2 = mysqli_fetch_assoc($sqlselect);

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
          <div class="card-title" id="produtos">
            <h2>Editar produto</h2>
            <form method="" action="" enctype="multipart/form-data">
            <div class="error-txt"></div>
            <div class="card-itens">
              <div class="input-group">
                <label class="input-label">Nome do Produto</label>
                <input type="text" name="nome" class="input" value="<?php echo $row2['nome'] ?>">
              </div>
            </div>
    
            <div class="card-itens">
              <div class="input-group">
                <label class="input-label">Descrição</label>
                <input type="text" name="descricao" class="input" value="<?php echo $row2['descricao'] ?>">
              </div>
            </div>

            <div class="card-itens">
                <div class="input-file">
                <label>Categoria</label>
              </div>
                <select name="categoria" class="input-select">
                  <option value="drama">Drama</option>
                  <option value="acao">Ação</option>
                  <option value="romance">Romance</option>
                </select>
            </div>
 
            <div class="card-itens">
                <div class="input-group">
                <div class="input-file">
                  <label>Imagem do produto</label>
                  <input type="file" name="image" class="input">
                  <p>De preferencia na resolução  largura como 341 pixel e comprimento de 192 pixel </p>
                </div>

              </div>

              <div class="input-group">
                <button>Enviar</button>
              </div>
            </div>
            <div class="termos">
              <p>Esta página é protegida pelo Google reCAPTCHA para garantir que você não é um robô. <a href="">Saiba
                  mais.</a></p>
            </div>

            <input type="text" name="id_prod" value="<?php echo $id ?>">
            </form>
          </div>
    
        </div>
      </section>
      <script src="../../../assets/script/perfil/edit-produto.js"></script>
</body>
</html>