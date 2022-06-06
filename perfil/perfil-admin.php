<?php
    include_once('../include/include.php');
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style-perfil.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>



<body>

<?php include_once('../vlogado.php'); ?>

<nav>
    <div class="nav-itens">
      <div class="nav-logo">
        <a href="../index.php"><img src="../img/logo.jpg" alt=""></a>
      </div>
      <ul class="main-nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="catalogo/catalogo.php">Catalogo</a></li>
      </ul>

      <ul class="main-nav profile">
        <li><a href="../rota-index.php"><?php echo $outputnome; ?></a></li>
      </ul>
    </div>
</nav>

    <section class="perfil">
        <div class="perfil-content">
            <div class="perfil-title" id="perfil">

                <h2>Menu de Perfil</h2>
                <div class="perfil-wrapper">
                    <div class="perfil-details">
                        <div class="perfil-itens">
                            <div class="group">
                                <label class="label">Nome</label>
                                <label class="label"><?php echo $row['nome']; ?></label>

                            </div>
                        </div>

                        <div class="perfil-itens">
                            <div class="group">
                                <label class="label">CPF</label>
                                <label class="label"><?php echo $row['cpf']; ?></label>

                            </div>
                        </div>

                        <div class="perfil-itens">
                            <div class="group">
                                <label class="label">Email</label>
                                <label class="label"><?php echo $row['email']; ?></label>

                            </div>
                        </div>

                        <div class="perfil-itens">
                            <div class="group">
                                <label class="label">Senha</label>
                                <label class="label">**********</label>
                            </div>
                        </div>

                        <div class="perfil-itens">
                            <div class="group">
                                <a href="logout.php">Deslogar a conta</a>
                            </div>
                        </div>
                    </div>

                    <div class="perfil-links">
                        <div class="group2">
                            <a href="options/edit-nome.php">Alterar Nome da Conta</a>
                            <a href="options/edit-email.php">Alterar Email da conta</a>
                            <a href="options/edit-senha.php">Alterar Senha</a>
                            <a href="options/admin/produtos.php">Cadastrar Produto</a>
                            <a href="options/edit-remove.php">Excluir a conta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>