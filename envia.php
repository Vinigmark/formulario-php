<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecebeDados</title>
</head>
<body>
    <?php
    $conexao = mysqli_connect("localhost","root","","teste");
    //checar conexao
    if(!$conexao){
        echo "NÃO CONECTADO";
    }
    echo "CONECTADO AO BANCO, ";

    //recuperar e verificar já existe
    $cpf = $_POST['cpf'];
    $cpf = mysqli_real_escape_string($conexao, $cpf);
    $sql = "SELECT cpf FROM teste.dados WHERE cpf='$cpf'";
    $retorno = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($retorno)>0){
        echo "CPF JÁ CADASTRADO!<br>";
        echo"<a href = 'index.html'>VOLTAR</a>";
    }else{
        $cpf = $_POST['cpf'];
        $idade = $_POST['idade'];
        $nome = $_POST['nome'];

        $sql = "INSERT INTO teste.dados(cpf,idade,nome) VALUES('$cpf','$idade','$nome')";
        $resultado = mysqli_query($conexao, $sql);
        echo "USUARIO CADASTRADO COM SUCESSO!<br>";
        echo"<a href = 'index.html'>VOLTAR</a>";
    }
    ?>
</body>
</html>
