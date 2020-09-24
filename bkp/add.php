<?php
require_once 'config.php';
 
// pega os dados do formuário
$produto_id = isset($_POST['produto_id']) ? $_POST['produto_id'] : null;
$tipo_produto_id = isset($_POST['tipo_produto_id']) ? $_POST['tipo_produto_id'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$qtde = isset($_POST['qtde']) ? $_POST['qtde'] : null;
$total_impostos = isset($_POST['total_impostos']) ? $_POST['total_impostos'] : null;
$total_venda = isset($_POST['total_venda']) ? $_POST['total_venda'] : null;
 
 /*
// validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($email) || empty($gender) || empty($birthdate))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 */
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
//$isoDate = dateConvert($birthdate);
 
// insere no banco
$sql = "INSERT INTO users(name, email) VALUES(:name, :email)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
 
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>