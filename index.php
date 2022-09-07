<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=g, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <a href="./enviar.php">enviar</a>
    <form action="" method="post">
        Nome: <input type="text" name="nome">

        <br>
        <br>
        Email: <input type="text" name="email">

        <br>
        <br>
        Genero:
        <input type="radio" value="Masculino" name="genero" checked> Masculino
        <input type="radio" value="Feminino" name="genero"> Feminino
        <input type="radio" value="Outros" name="genero"> Outros



        <button name="enviado" type="submit">Enviar</button>
    </form>

    <h1>Dados enviados</h1>
    <?php


    if(isset($_POST["enviado"])){
    echo "Seu nome é: " . $_POST["nome"];
    echo "<br><br>";
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
        echo "<p class='error'>Preencha o campo email </p>";
    }else{ 
        echo "Seu email é: ".$_POST["email"];
    };
    echo "<br><br>";
    echo "Genero: " . $_POST["genero"];

}
    ?>

    <script>

        let inp = document.querySelectorAll("input");
        let body = document.getElementsByName("body");
        console.log(body);
        console.log(inp);
        inp.forEach(e =>{
            e.required = true
          
        })
    </script>
</body>

</html>