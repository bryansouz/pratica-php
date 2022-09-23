<?php
    if(isset($_POST['email'])){
        include('conexao2.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM senhas WHERE email = '$email'";
        $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
        
        $usuario = $sql_exec->fetch_assoc();
        
        if(password_verify($senha, $usuario["senha"])){
            if(!isset($_SESSION)){
                session_start();

                $_SESSION["usuario"] = $usuario["id"];
                header("location: acesso_permitido.php");
            }
        }else{
            echo "<p> Falha ao logar</p>";
        }


    }

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

    <h1>Logar</h1>

    <form action="" method="post">

        <p>Email:     
        <input type="text" name="email"></p>
        
        <p>Senha:
        <input type="password" name="senha"></p>
        <br>
        <button>Enviar</button>
      
    </form>
</body>

</html>