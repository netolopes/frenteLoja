<?php
require_once 'config.php';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;

if($descricao != ""){

$sql = "INSERT INTO tipo_produtos(descricao) VALUES(:descricao)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':descricao', $descricao);


 
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
<p><a href="tipo_produtos.php">Voltar</a></p>