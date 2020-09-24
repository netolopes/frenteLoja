<?php
$host = 'localhost';
$db   = 'bd_crud_pdo';
$user = 'root';
$pass = '';
$port = "3308";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
     $conexao = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*
try {
    $conexao = new PDO("mysql:host=localhost;dbname=bd_crud_pdo", "root", "","3308");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:".$erro->getMessage();
}
  */
// habilita todas as exibições de erros
//ini_set('display_errors', true);
//error_reporting(E_ALL);
 
?>