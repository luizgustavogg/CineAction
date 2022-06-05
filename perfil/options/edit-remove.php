<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/style-card.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
  <?php include_once ('nav.php')?>

  <section class="card">
    <div class="card-content">
      <div class="card-title" id="login">
        <h2>Excluir a Conta</h2>
        <form method="" action="">
        <div class="error-txt"></div>
        <div class="card-itens">
          <div class="input-group">
            <label class="input-label">Email</label>
            <input type="email" name="email" class="input">
          </div>
        </div>

        <div class="card-itens">
          <div class="input-group">
            <label class="input-label">Senha</label>
            <input type="password" name="senha" class="input">
          </div>

          <div class="input-group">
            <button>Enviar</button>
          </div>
        </div>
        <div class="termos">
          <p>Esta página é protegida pelo Google reCAPTCHA para garantir que você não é um robô. <a href="">Saiba
              mais.</a></p>
        </div>
</form>
      </div>

    </div>
  </section>
  <script src="../../assets/script/perfil/remove.js"></script>
</body>

</html>