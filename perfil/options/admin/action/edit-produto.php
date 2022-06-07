<?php

  include_once("../../../../include/include.php");

  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
  $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
  $id_prod = mysqli_real_escape_string($conn, $_POST['id_prod']);

  if(!empty($nome) && !empty($descricao) && !empty($categoria)){
    (strlen($descricao) > 60) ? $msg = substr($descricao, 0, 28).'...' : $msg = $descricao;
    if(isset($_FILES['image'])){ //se o arquivo for carregado
      $img_name = $_FILES['image']['name']; //recebendo upload do usuário img name
      $img_type = $_FILES['image']['type']; //recebendo upload do usuário img type
      $tmp_name = $_FILES['image']['tmp_name']; // este nome temporário é usado para salvar/mover arquivo em nossa pasta
    
      // explorar imagem e obter a última extensão como png jpg
      $img_explode = explode(".", $img_name);
      $img_ext = end($img_explode); // aqui temos a extensão de um usuário carregado arquivo img
    
      $extensions = ['png', 'jpeg', 'jpg']; //these are some valid img ext and we've store them in array

      if(in_array($img_ext, $extensions) === true){ // se o usuário carregado img  é combinado com quaisquer extensões da extensions
        $time = time(); // isso nos devolverá o tempo atual
                        // precisamos deste tempo, porque quando você faz o upload do usuário img para em nossa pasta, renomeamos o arquivo de usuário com o tempo atual
                        // então todo o arquivo de imagem terá um nome único
          // mova o img do usuário carregado para nossa pasta particular
          $new_img_name = $time.$img_name;

          if(move_uploaded_file($tmp_name, "../../../../images-prod/".$new_img_name)){
            
      $sql = mysqli_query($conn, "SELECT * FROM produto WHERE nome = '$nome'");

      if(mysqli_num_rows($sql) > 0){ //se o e-mail já existe

          echo "$nome - ja existe um produto com esse nome!";
          
      }else{
        $random_id = rand(time(), 10000000);

        $nome = strtoupper($nome); // Transformar a String nome em caixa alta
        

        $sql2 = mysqli_query($conn, "UPDATE produto SET nome = '$nome', descricao = '$msg', categoria = '$categoria', img = '$new_img_name' WHERE id_prod = '$id_prod'");
        if($sql2){
          echo 'sucesso';
        }  
        else{
          echo "algo deu errado";
        }
      }
    
    }
    else{ echo "não achei a paste de image";
    }
  }
    else{
      echo "Não foi possivel mandar a image pro banco de dados";
    }
  }
    else{
      echo "a foto tem q ser png, jpeg ou jpg";
    }
  }
  else{
    echo "preencher todos campos";
  }
?>