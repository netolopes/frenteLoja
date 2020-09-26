<?php
require_once 'config.php';

$produto = isset($_POST['produto']) ? $_POST['produto'] : null;
$qtde = isset($_POST['qtde']) ? $_POST['qtde'] : null;

if($qtde != "" && $produto != ""){
 
//get  tipo_produto_id
$sql = "SELECT tipo_produto_id,valor FROM produtos where id = ".$produto;
$stmt = $conexao->prepare($sql);
$stmt->execute();
$arr = $stmt->fetch(PDO::FETCH_ASSOC);
$tipo_produto_id = $arr['tipo_produto_id'];
$valor = $arr['valor'];

//get impostos
$sql = "SELECT ipi,icms,pis,cofins FROM impostos where tipo_produto_id = ".$tipo_produto_id;
$stmt = $conexao->prepare($sql);
$stmt->execute();
$arr = $stmt->fetch(PDO::FETCH_ASSOC);
$ipi = $arr['ipi'];
$icms = $arr['icms'];
$pis = $arr['pis'];
$cofins = $arr['cofins'];



$sql = "INSERT INTO aux(produto_id, tipo_produto_id,valor,qtde,ipi,icms,pis,cofins) VALUES(:produto_id, :tipo_produto_id, :valor, :qtde, :ipi, :icms, :pis, :cofins)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':produto_id', $produto);
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

?>
<p><a href="index.php">Voltar</a></p>