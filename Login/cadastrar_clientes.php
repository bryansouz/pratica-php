<?php
    
    include('conexao2.php');
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION["usuario"])){
         die("<p>Clique <a href='login_usuario.php'>AQUI</a> para logar</p>");
    }
    if(isset($_POST['email'])){
        include('conexao2.php');
        $email = $_POST['email'];
        $senha = password_hash( $_POST['senha'], PASSWORD_DEFAULT);
        $nome = "fulano";

        $mysqli->query("INSERT INTO senhas (email, senha, nome) VALUES('$email', '$senha', '$nome')") or die($mysqli->error);


    
    }   

    $id = $_SESSION["usuario"];
    $sql_code = $mysqli->query("SELECT * FROM senhas WHERE id = '$id'") or die($mysqli->error);
    
    $usuario = $sql_code->fetch_assoc();
    $nome_do_usuario =  $usuario['nome'];
 
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        form input[name="senha"]{
        margin: 10px 0 10px 0 ;
        }
    </style>
</head>

<body>  
        <h3>Bem-vindo <?php echo $nome_do_usuario ?></h3>
        <h1>Cadastrar novo Cliente</h1>
        <?php   var_dump($usuario); ?>

    <form action="" method="post">

        <p>Email:     
        <input type="text" name="email"></p>
        
        <p>Senha:
        <input type="password" name="senha"></p>
        <br>
        <button>Enviar</button>
        <a href="sair.php">Sair</a>
        
    </form>
</body>

</html>