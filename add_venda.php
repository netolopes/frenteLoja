<?php
require_once 'config.php';
$sql_count = "SELECT COUNT(id) total FROM aux";
$stmt_count = $conexao->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();


if ($total > 0){
	
	$sql_del = "DELETE FROM aux ";
	$stmt_del = $conexao->prepare($sql_del);
	$stmt_del->execute();





		$sqlx = "SELECT produto_id, tipo_produto_id,valor,qtde,ipi,icms,pis,cofins FROM aux ";
		$stmt_prodx = $conexao->prepare($sqlx);
		$stmt_prodx->execute();
		while ($arrx = $stmt_prodx->fetch(PDO::FETCH_ASSOC)){
			
			
				$sql = "INSERT INTO vendas(produto_id, tipo_produto_id,valor,qtde,ipi,icms,pis,cofins) VALUES(:produto_id, :tipo_produto_id, :valor, :qtde, :ipi, :icms, :pis, :cofins)";
				$stmt = $conexao->prepare($sql);
				$stmt->bindParam(':produto_id', $arrx['produto_id']);
				$stmt->bindParam(':tipo_produto_id', $arrx['tipo_produto_id']);
				$stmt->bindParam(':valor', $arrx['valor']);
				$stmt->bindParam(':qtde', $arrx['qtde']);
				$stmt->bindParam(':ipi', $arrx['ipi']);
				$stmt->bindParam(':icms', $arrx['icms']);
				$stmt->bindParam(':pis', $arrx['pis']);
				$stmt->bindParam(':cofins', $arrx['cofins']);
				
		} 



 
if ($stmt_prodx->execute())
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