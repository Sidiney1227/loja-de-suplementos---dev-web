<?php
$host = "localhost";
$username = "root";
$password = "Proxy@17";
$database = "db_ikaris";

$mysqli = new mysqli($host, $username, $password, $database);

if($mysqli->error){
    die("Falha na conexão com o banco de dados!" .$mysqli->error);
}
/* 
else {
    echo "Conexão efetuada com sucesso";
}



//Tratamento de exceção
try{
			
    $conexao = mysqli_connect($host, $username, $password, $database);

    date_default_timezone_set("America/Manaus");

    require('index.html');

}catch (Exception $ex){
                
    echo "<script> alert ('SISTEMA TEMPORARIAMENTE INDISPONÍVEL!');</script>";

    exit();
            
}*/
?>

