<?php

include("lib/conexao.php");


$sql_code = "SELECT * FROM relatorio";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$num = $sql_query->num_rows;


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Ficha de treino</title>
</head>

<body>
    <nav class="ficha">
        <h1>Ficha de Treinamento Online</h1>
        
            <div class="treinoName">
                <h1>Nome do treino</h1>
            </div>

            <div class="Microciclo">A<span> <input type="button" value="+"> </span></div>

    </nav>

        <div class="bloco">
            <p>
                <a href="./exercicios.php"> adicionar exercicio</a>
                <table class="table">
                            <thead>
                                <tr>
                                    <th>exercicio</th>
                                    <th>séries</th>
                                    <th>repetições</th>
                                    <th>carga</th>
                                    <th>Instruções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num == 0) { ?>
                                <tr>
                                    <td colspan="5">Nenhum exercicio foi cadastrado</td>
                                </tr>
                                <?php } else {
                                    
                                    while ($exercicio = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $exercicio['id_exercicio']; ?></th>
                                            <td><?php echo $exercicio['series'] ?></td>
                                            <td><?php echo  $exercicio['repeticoes'],'x' ?></td>
                                            <td> - <?php echo ($exercicio['carga']),'kg' ?></td>
                                            <td><a href="index.php?p=editar_exercicio&id=<?php echo $exercicio['id']; ?>">editar</a> | <a href="index.php?p=deletar_exercicio&id=<?php echo $exercicio['id']; ?>">deletar</a></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
            </p>
        </div>





    </div>
    
</body>
</html>