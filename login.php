<?php
session_start();

require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["senha"];

    if ($mysqli) {
        $query = "SELECT * FROM cliente WHERE usuario = '$username' AND password = '$password'";
        $result = mysqli_query($mysqli, $query);

        if ($result !== false) {
            
            if (mysqli_num_rows($result) == 1) {
            
                $_SESSION['user_session'] = $username;
                $_SESSION['pwd_session'] = $password;
                header("Location: index.php");
                exit();
            } else {
                
                echo "Usuário ou senha inválidos.";
            }
        } else {
            echo "Erro ao consultar o banco de dados: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/login.css">
<head>
    <title>Login</title>
</head>

<body>
    <div class="login">
        <form id="login" method="post" action="">
            <h1>Login</h1>
            <label for="Username">Usuário</label><br>
            <input type="text" name="user" id="user" placeholder="Digite seu nome" required><br>
            <label for="password">Senha</label><br>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required><br>
            <input type='submit'>
        </form> 
    </div>
</body>
</html>