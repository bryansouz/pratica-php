<?php
    if(isset($_POST["confirmar"])){
        include("conexao.php");
        $id = intval($_GET['id']); 
        $sql_code = "DELETE FROM clientes WHERE id = '$id'";
        $query_clientes = $mysqli->query($sql_code) or die($mysqli->error);

        if($sql_code){
            echo "<p>Retornar aos clientes</p><br>
            <a href='./clientes.php'>Voltar</a>";
            die();
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
</head>

<body>
    <h1>Deseja realmente excluir</h1>
    <?php echo var_dump($_POST); ?>
    <form action="" method="post">
        <a href="./clientes.php">Não</a>
        <button name="confirmar" value="sim" type="submit">sim</button>
    </form>

</body>

</html>