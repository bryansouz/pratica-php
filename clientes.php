<?php
include("conexao.php");
$sql_clientes = "SELECT * FROM clientes";
$query_clientes =  $mysqli->query($sql_clientes) or die($mysqli->$error);
$num_clientes =  $query_clientes->num_rows;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>
    <a href="./index.php">Adicionar cliente</a>
    <h1>Lista de Clientes</h1>
    <p>Estes sãos os clientes cadastrados no sistema:</p>

    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>TELEFONE</th>
            <th>EMAIL</th>
            <th>NASCIMENTO</th>
            <th>HORÁRIO DE CADASTRO</th>
            <th>AÇOES</th>

            
        </thead>

        <?php
            if($num_clientes == 0) { ?>
              <tr>
                <td colspan="7">Nenhum cliente foi cadastrado</td>
              </tr>

        <?php } else{
            while ($clientes = $query_clientes->fetch_assoc()) {


                $horario = date("d-m-Y H:i", strtotime( $clientes["data"]));

                
                $telefone = "";
                if(!empty($clientes["telefone"])){
                    $p9 = substr($clientes["telefone"], 2,1);
                    $p1 = substr($clientes["telefone"], 0, 2);
                    $p2 =  substr($clientes["telefone"], 3, 5);
                    $p3 =  substr($clientes["telefone"], 7, 9);
                    $telefone .= "(" . $p1 . ")";
                    $telefone .= " ". $p9 . " ";
                    $telefone .= $p2 . "-";
                    $telefone .= $p3;
                }

                $nascimento = implode("/", array_reverse(explode('-', $clientes["nascimento"])));
                
            ?>
         <tr>
            <td><?php echo $clientes["id"] ?></td>
            <td><?php echo $clientes["nome"] ?></td>
            <td><?php echo $telefone ?></td>
            <td><?php echo $clientes["email"] ?></td>
            <td><?php echo $nascimento ?></td>
            <td><?php echo $horario ?></td>
            <td>
                <a href="editar_cliente.php?id=<?php echo $clientes["id"] ?>">EDITAR</a>
                <a href="excluir_cliente.php?id=<?php echo $clientes["id"] ?>">EXCLUIR</a>    
            </td>
            
         
        </tr>


        <?php } 
        }
        ?>
    </table>

</body>

</html>