<?php

include("lib/conexao.php");
$exercicios_query = $mysqli->query("SELECT * FROM exercicios") or die($mysqli->error);

if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'];
    $series = $_POST['series'];
    $rep = $_POST['repeticoes'];
    $carga = $_POST['carga'];
    $obs = $_POST['obs'];

    $sql_code = "INSERT INTO relatorio (id_usuario, id_exercicio, series, repeticoes, carga, obs) VALUES(
        'nome',
        '$nome', 
        '$series', 
        '$rep',
        '$carga',
        '$obs'
        )";

        $insert = $mysqli->query($sql_code);

        if(!$insert)
            echo "Falha ao inserir no banco de dados: " . $mysqli->error;
        else
            echo 'foi';
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> <?php include('style.css'); ?> </style>
    <title> Ficha de treino</title>
</head>

<body>
    <nav class="ficha">
        <h1>Ficha de Treinamento Online</h1>

        <a href="./index.php">ficha de treino</a>
        <div class="treinoName">
            <h1>Nome do treino</h1>
        </div>
        <input type="text" placeholder="Nome do Exericicio">

        <h1>Grupo Muscular</h1>
        <select>
            <option value="peito">Peito</option>
            <option value="peito">Costas</option>
            <option value="peito">Braço</option>
            <option value="peito">Ombro</option>
            <option value="peito">Coxa</option>
            <option value="peito">Glúteos</option>
            <option value="peito">Abdomen</option>
            <option value="peito">Panturrilhas</option>
        </select>

    </nav>

    <div class="bloco">
        <h1>Lista de Exercicios</h1>
        <a href="./exercicios.php"> adicionar exercicio</a>

        <ul class="ul">
            <?php while ($exercicios = $exercicios_query->fetch_assoc()) { ?>

                <li> <input type="submit" class="btn" value="<?php echo $exercicios["nome"] ?>"> </li>


                <div class="modal">

                    <form action="" method="POST" enctype="multipart/form-data">

                        <h5><?php echo $exercicios["nome"] ?></h5>

                        <div>
                            <input type="hidden" value="<?php echo $exercicios["nome"] ?>" name="nome" class="form-control">
                        </div>

                        <div>
                            <label for="">Séries</label>
                            <input type="number" value="3" name="series" class="form-control">
                        </div>

                        <div>
                            <label for="">Repetições</label>
                            <input type="number" value="15" name="repeticoes" class="form-control">
                        </div>

                        <div>
                            <label for="">Carga</label>
                            <input type="number" value="60" name="carga" class="form-control">
                        </div>

                        <div>
                            <label for="">Instruçoes</label>
                            <input type="text" value="" name="obs" class="form-control">
                        </div>

                        <span class="btn-close">Voltar</span> 
                        <button type="submit" name="enviar" value="1" class="">Salvar</button>



                    </form>
                </div>


            <?php } ?>
        </ul>

    </div>
                <script>
                    <?php include('script.js'); ?>
                </script>
</body>

</html>