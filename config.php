<?php
error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);

$dsn = 'pgsql:host=localhost; port=5432;
        dbname=postgres; user=postgres; password=240180';
$dbh = null;

try {
  $conexao = new PDO($dsn);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}








?>