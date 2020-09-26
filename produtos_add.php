<?php
require_once 'config.php';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$tipo_produto_id = isset($_POST['tipo_produto_id']) ? $_POST['tipo_produto_id'] : null;


if($descricao != ""  && $valor != ""  &&  $tipo_produto_id  != ""){

$sql = "INSERT INTO produtos(descricao, valor, tipo_produto_id) VALUES(:descricao, :valor, :tipo_produto_id)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':tipo_produto_id', $tipo_produto_id);
 
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

}else{
	
	echo "<script>alert('Preencha os campos vazios!')</script>";
	
}

?>
<p><a href="produtos.php">Voltar</a></p>