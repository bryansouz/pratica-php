<?php
    
    include('conexao.php');
    include('./PHPMailer/mail.php');
    if(isset($_POST['email'])){

        include('conexao.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha_uncrip = $_POST['senha'];
        $telefone =  $_POST["telefone"];
        $data = implode("-", array_reverse(explode('/', $_POST["data"])));

        $senha = password_hash( $_POST['senha'], PASSWORD_DEFAULT);
        
        $sql_code = $mysqli->query("INSERT INTO senhas (email, senha, nome) VALUES('$email', '$senha', '$nome')") or die($mysqli->error);
        if($sql_code){
            email($email, 'Email de confirmação', 
                "<h1>Parabéns sua conta foi criada com sucesso</h1>
                <p>LOGIN: $email;</p>
                <p>SENHA: $senha_uncrip;</p>
                <a href=\"http://localhost/workspace-curso/Project%232/index.php\">Clique Aqui</a>"    
            );
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
        <h1>Cadastrar novo Cliente</h1>
        <?php   var_dump($usuario); ?>

    <form action="" method="post">
        
        <p>Nome:     
        <input type="text" name="nome"></p>

        <p>Email:     
        <input type="text" name="email"></p>
        
        <!-- Adicionar telefone e data no mySQL -->
        <p>Telefone:     
        <input type="text" name="nome"></p>

        <p>Data de Nascimento:     
        <input type="text" name="nome"></p>

        <p>Senha:
        <input type="password" name="senha"></p>
        <br>
        <button>Enviar</button>
        <a href="sair.php">Sair</a>
        
    </form>
</body>

</html>