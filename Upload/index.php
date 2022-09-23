<?php
include("conexao.php");

if(isset($_GET["deletar"])){  
    $id = intval($_GET["deletar"]);
    $sql_selecte = "SELECT * FROM path WHERE id = '$id'";
    $sql_fo = $mysqli->query($sql_selecte) or die($mysqli->error);
    $arquivo_deletar = $sql_fo->fetch_assoc();

    if(unlink($arquivo_deletar["diretorio"]))
    $sql_delete = $mysqli->query("DELETE FROM path WHERE id = '$id'") or die($mysqli->error);

    if($sql_delete){
        echo "<p>Foto $id excluida com sucesso</p><br>";

    }
    }


function enviarArquivo($error, $size, $name, $tmp_name) {
 
    include("conexao.php");

    if($error)
        die("Falha ao enviar arquivo");

    if($size > 2097152)
        die("Arquivo muito grande!! Max: 2MB"); 

    $pasta = "Arquivos/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = rand();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if ($deu_certo) {
        $mysqli->query("INSERT INTO path (nome, diretorio, date_upload) VALUES('$nomeDoArquivo', '$path', NOW())") or die($mysqli->error);
        return true;
        
    } else
        return false;
        
};

if (isset($_FILES['arquivo'])) {
    $arquivos = $_FILES['arquivo'];
    
    $tudo_certo = true;
    foreach($arquivos['name'] as $index => $arq) {

        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos["tmp_name"][$index]);
        var_dump($arquivos['name']);
    }  
    if(!$deu_certo){
        $tudo_certo = false;
        echo "<p>Falha ao enviar um ou mais arquivos!";
    }
    if($tudo_certo)
        echo "<p>Todos os arquivos foram enviados com sucesso!";

}
$sql_code = "SELECT * FROM path";
$sql_fotos = $mysqli->query($sql_code) or die($mysqli->error);
$num_fotos =  $sql_fotos->num_rows;



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Upload de Arquivos</h1>

    <form method="POST" enctype="multipart/form-data" action="">
        <p>
            <label>Selecione um arquivo:</label>
        </p>
        <input type="file" multiple name="arquivo[]">

        <button type="submit">Enviar Arquivo</button>
    </form>

    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>PREVIEW</th>
            <th>NOME</th>
            <th>DIRETÓRIO</th>
            <th>DATA DE ENVIO</th>
            <th>DELETAR</th>
        </thead>

        <?php if($num_fotos < 0) { echo "<td colspan='5'>Nenhuma foto cadastrada</td>"; ?>
        
        <tbody>
        <?php } else{ while ($fotos = $sql_fotos->fetch_assoc()) {   ?>

            <tr>
                <td><?php echo $fotos["id"] ?></td>
                <td><img src="<?php echo $fotos["diretorio"]?>" height="50"></td>
                <td><a href="<?php echo $fotos["diretorio"]?>"><?php echo $fotos["nome"] ?></a></td>
                <td><?php echo $fotos["diretorio"] ?></td>
                <td><?php echo $fotos["date_upload"] ?></td>
                <td><a  href="index.php?deletar=<?php echo $fotos["id"] ?>">EXCLUIR</a></td>
               
        </tr>
        <?php }} ?>
        </tbody>
    </table>


</body>
