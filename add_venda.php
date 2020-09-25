<?php
require_once 'config.php';

$produto_id = isset($_POST['produto']) ? $_POST['produto'] : null;
$tipo_produto_id = isset($_POST['tipo_produto_id']) ? $_POST['tipo_produto_id'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$qtde = isset($_POST['qtde']) ? $_POST['qtde'] : null;
$ipi = isset($_POST['ipi']) ? $_POST['ipi'] : null;
$icms = isset($_POST['icms']) ? $_POST['icms'] : null;
$pis = isset($_POST['pis']) ? $_POST['pis'] : null;
$cofins = isset($_POST['cofins']) ? $_POST['cofins'] : null;




/*
if($produto_id != ""){
 

$sql = "INSERT INTO aux(produto_id, tipo_produto_id,valor,qtde,ipi,icms,pis,cofins) VALUES(:produto_id, :tipo_produto_id, :valor, :qtde, :ipi, :icms, :pis, :cofins)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':produto_id', $produto_id);
$stmt->bindParam(':tipo_produto_id', $tipo_produto_id);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':qtde', $qtde);
$stmt->bindParam(':ipi', $ipi);
$stmt->bindParam(':icms', $icms);
$stmt->bindParam(':pis', $pis);
$stmt->bindParam(':cofins', $cofins);

 
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
*/
?>
<p><a href="index.php">Voltar</a></p>