<?php
require_once 'config.php';

$ipi = isset($_POST['ipi']) ? $_POST['ipi'] : null;
$icms = isset($_POST['icms']) ? $_POST['icms'] : null;
$pis = isset($_POST['pis']) ? $_POST['pis'] : null;
$cofins = isset($_POST['cofins']) ? $_POST['cofins'] : null;  
$tipo_produto_id = isset($_POST['tipo_produto_id']) ? $_POST['tipo_produto_id'] : null; 


if($ipi != ""  &&  $icms != "" &&  $pis != "" &&  $cofins != "" &&  $tipo_produto_id != ""){

$sql = "INSERT INTO impostos(ipi,icms,pis,cofins,tipo_produto_id) VALUES(:ipi,:icms,:pis,:cofins,:tipo_produto_id)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':ipi', $ipi);
$stmt->bindParam(':icms', $icms);
$stmt->bindParam(':pis', $pis);
$stmt->bindParam(':cofins', $cofins);
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
<p><a href="impostos.php">Voltar</a></p>