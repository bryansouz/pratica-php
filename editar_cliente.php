<?php

include("conexao.php");
$id = intval($_GET["id"]); 
$sql_clientes = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_clientes) or die($mysqli->error);
$clientes = $query_cliente->fetch_assoc();


var_dump($clientes);

if (count($_POST) > 0) {
    
    
    echo "<h1>Dados enviados</h1>";

    global $error;
    global $result;
    $error = false;
    $emailPost = $_POST["email"];
    $nomePost = $_POST["nome"];
    $telefonePost =  $_POST["telefone"];


    function limpar_texto($str)
    {
        return preg_replace("/[^0-9]/", "", $str);
    };



    if (strlen($telefonePost) > 12 || strlen($telefonePost) < 8) {
        $telefonePost = false;
        $error .= "O telefone deve ser preenchido no padrão <em>''(51) 9999-9999''</em><br>";
    } else {
        $telefonePost = limpar_texto($telefonePost);
    };


    if (filter_var($emailPost, FILTER_VALIDATE_EMAIL) == false) {
        $emailPost = false;
        $error .= "Preencha o campo email<br>";
    } else {
    };

    if (preg_match('/\d+/', $nomePost) > 0) {
        $nomePost = false;
        $error .= "Complete seu nome corretamente<br>";
    } else {
    }

    $dataPost = $_POST["data"];

    if ($error) {
        $result .= "<p class='error'> ERRO: $error <br>";
        echo $result;  
    } else if(!$error){

        $result = "deu certo";
        $sql_code = "UPDATE clientes
        SET nome = '$nomePost',
        telefone = '$telefonePost',
        email = '$emailPost',
        nascimento = '$dataPost' 
        WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if ($deu_certo) {

            echo "<p class='sucess'> Cliente atualizado com sucesso</p>";

            if (isset($_POST["enviado"])) {
                echo "<p>Nome: " . $nomePost . "</p> <br>";
                echo "<p> Telefone: " . $telefonePost . "</p> <br>";
                echo "<p> Seu email é: " . $emailPost . "</p> <br>";
                echo $dataPost;
                unset($emailPost, $nomePost, $telefonePost);
            }
            ;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=g, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }

        .sucess {
            color: green;
        }
    </style>
</head>

<body>

    <?php echo formatar_date($clientes["nascimento"])?>

    <a href="./clientes.php">Lista de Clientes</a>
    <form action="" method="post">
        <p>Nome: <input type="text" value="<?php echo $clientes["nome"]?>" name="nome"></p>

        <p>Email: <input type="text" name="email" value="<?php echo $clientes["email"]?>"></p>
        
        <p>Telefone: <input name="telefone" type="number" value="<?php echo $clientes["telefone"] ?>"></p>

        <p>Data de Nascimento: <input type="date" value="<?php echo $clientes["nascimento"]?>" name="data" id=""></p>

        <button name="enviado" type="submit">Enviar</button>


    </form>



    <script>
        let inp = document.querySelectorAll("input");
        let body = document.getElementsByName("body");
        console.log(body);
        console.log(inp);
        inp.forEach(e => {
            e.required = true

        })
    </script>
</body>

</html>