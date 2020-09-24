<?php
 
require_once 'config.php';
 
// resgata os valores do formulário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

$id = isset($_POST['id']) ? $_POST['id'] : null;
 
// validação (bem simples, mais uma vez)
/*
if (empty($name) || empty($email) || empty($gender) || empty($birthdate))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 */

 

$sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}