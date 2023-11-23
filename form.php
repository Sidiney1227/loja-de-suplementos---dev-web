<?php
require 'config.php'; // Arquivo de conexão

// Variaveis defindas somente porque no banco de dados foi definido que essas colunas são not null
$telefone = 000000;
$cidade = "Manaus";
$cep = 00000;

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $password = $_POST['senha'];

    if (empty($nome) || empty($usuario) || empty($email) || empty($genero) || empty($nascimento) || empty($endereco) || empty($password)) {
        echo "Todos os campos são obrigatórios e não podem ser vazios.";

    } else {
        // Inserindo dados na tabela
        $sql = "INSERT INTO cliente (nome, usuario, email, sexo, data_de_nascimento, endereco, password, telefone, cidade, cep) VALUES (?, ?,?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar a consulta
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // Vincular os parâmetros à consulta
            $stmt->bind_param("ssssssssss", $nome, $usuario, $email, $genero, $nascimento, $endereco, $password, $telefone, $cidade, $cep);

            // Executar a consulta
            if ($stmt->execute()) {
                echo "Dados inseridos com sucesso.";
                header("Location: login.php"); // Direciona para a pagina de login.php
            } else {
                echo "Erro ao inserir dados: " . $stmt->error;
            }

            // Fechar a consulta
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $mysqli->error;
        }
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="box">
        <form action="form.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser">
                    <Label for="nome" class="labelInput">Nome completo</Label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser">
                    <label for="usuario" class="labelInput">Nome de Usuário</label>
               </div>
               <br>
               <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser">
                    <Label for="nome" class="labelInput">E-mail</Label>
                </div>
                <br>
                <p>Sexo</p>
                <div>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="Masculino">Masculino</label><br>
                    <input type="radio" id="feminino" name="genero" value="Feminino" required>
                    <label for="Feminino">Feminino</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="date" name="nascimento" id="nascimento" class="inputUser">
                    <br><Label for="data_de_nascimento" class="labelInput"><b>Data de Nascimento</b></Label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser">
                    <Label for="nome" class="labelInput">Endereço</Label>
                </div>
               <br>
               <div class="inputBox">
                   <input type="password" name="senha" id="senha" class="inputUser">
                    <label for="senha" class="labelInput">Senha</label>
              </div>
              <br>
              <div>
                    <input type="submit" name="submit" id="submit">
              </div>
            </fieldset>
        </form>
    </div>
    
</body>
</html>