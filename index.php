<?php
require_once 'config.php';
 

$sql_count = "SELECT COUNT(*) AS total FROM aux ORDER BY id ASC";
$stmt_count = $conexao->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();


$sql = "SELECT id, descricao,valor FROM produtos ORDER BY descricao asc";
$stmt_prod = $conexao->prepare($sql);
$stmt_prod->execute();

$sqlAux = "SELECT produto_id, tipo_produto_id,valor,qtde,ipi,icms,pis,cofins FROM aux ORDER BY id asc"; 
$stmt_aux = $conexao->prepare($sqlAux);
$stmt_aux->execute();

 
function totalImpostos($ipi,$icms,$pis,$cofins){
	$impostos = array_sum(array($ipi,$icms,$pis,$cofins));
	return $impostos;
}

function totalProdutoComImpostos($ipi,$icms,$pis,$cofins,$valor){
	$prod_impostos = array_sum(array($ipi,$icms,$pis,$cofins,$valor));
	return $prod_impostos;
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro Vendas</title>
    </head>
 
    <body>
     
        <h2></h2>
 
<!-- CADASTRO  -->
	<form action="add.php" method="post">
	<table>
		<tr>
			<td>Produto</td>
			<td>Qtde</td>
		</tr>
		
		<tr>
			<td>
			 <select name="produto" id="produto">
						  <?php while ($produtos = $stmt_prod->fetch(PDO::FETCH_ASSOC)): ?>
						<option value="<?php echo $produtos['id'] ?>"><?php echo $produtos['descricao'] . "- R$" . $produtos['valor'] ?></option>
						  <?php endwhile; ?>
						</select>
			</td>
		
		<td>
			<input type="number" size="3" name="qtde" id="qtde"><input type="submit" value="Cadastrar">
		</td>
		</tr>
	</table>
    </form>
		
 
    </body>
</html>
<!-- FIM CADASTRO  -->
 

        <p>Total Registros: <?php echo $total ?></p>
 
        <?php if ($total > 0): ?>
 
        <table width="50%" border="1">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Produto</th>
                    <th>Tipo</th>
					<th>R$(Valor s/Imposto)</th>
					<th>Qtde</th>
					<th>Ipi</th>
					<th>Icms</th>
					<th>Pis</th>
					<th>Cofins</th>
					<th>Total Impostos</th>
					<th>R$(Valor c/Imposto)</th>
                </tr>
				
            </thead>
            <tbody>
                <?php 
				$num = 1;
				while ($arr_aux = $stmt_aux->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $num++ ?></td>
                    <td>
					<?php
					$sqlx = "SELECT id, descricao,valor FROM produtos ORDER BY id ASC";
					$stmt_prodx = $conexao->prepare($sqlx);
					$stmt_prodx->execute();
					while ($arrx = $stmt_prodx->fetch(PDO::FETCH_ASSOC)): ?>
						
							<?php 
							if($arrx['id'] == $arr_aux['produto_id']):
							echo $arrx['descricao'] ?>
							<?php endif; ?>
							
					<?php endwhile; ?>
					</td>
                    <td style="text-align:center"><?php echo $arr_aux['tipo_produto_id'] ?></td>
					<td style="text-align:right"><?php echo $arr_aux['valor'] ?></td>
					<td style="text-align:right"><?php echo $arr_aux['qtde'] ?></td>
					<td style="text-align:right"><?php echo $arr_aux['ipi'] ?></td>
					<td style="text-align:right"><?php echo $arr_aux['icms'] ?></td>
					<td style="text-align:right"><?php echo $arr_aux['pis'] ?></td>
					<td style="text-align:right"><?php echo $arr_aux['cofins'] ?></td>
					<td style="text-align:right"><?php echo totalImpostos($arr_aux['ipi'],$arr_aux['icms'],$arr_aux['pis'],$arr_aux['cofins']) * $arr_aux['qtde'] ?></td>
					<td style="text-align:right"><?php echo totalProdutoComImpostos($arr_aux['ipi'],$arr_aux['icms'],$arr_aux['pis'],$arr_aux['cofins'],$arr_aux['valor']) * $arr_aux['qtde'] ?></td>
                </tr>
				
				<?php
				$tot_impostos = totalImpostos($arr_aux['ipi'],$arr_aux['icms'],$arr_aux['pis'],$arr_aux['cofins']);
				$arr_tot_impostos[] = $tot_impostos;
				$tot_valor = totalProdutoComImpostos($arr_aux['ipi'],$arr_aux['icms'],$arr_aux['pis'],$arr_aux['cofins'],$arr_aux['valor']);
				$arr_tot_valor[] = $tot_valor;
				?>
				
                <?php endwhile; ?>

            </tbody>
        </table>
		
			<table width="50%" border="1"> 
					<tr style="text-align:right">
						<td><b>Tota Impostos: </b></td>
						<td><b>Total Venda: </b></td>
					</tr>
				  	<tr style="text-align:right">
						<td> <?php  echo  isset($arr_tot_impostos)? array_sum($arr_tot_impostos) : ""; ?></td>
						<td> <?php  echo  isset($arr_tot_valor)? number_format(array_sum($arr_tot_valor), 2) : ""; ?></td>
					</tr>
           
			 </table>
        <?php else: ?>
 
        <p>Nenhum registro encontrado</p>
 
        <?php endif; ?>
    </body>
	
	<!-- finalizar venda  -->
	<form action="add_venda.php" method="post">
	<table>
		<td>
			<input type="submit" value="Concluir Venda">
		</td>
		</tr>
	</table>
    </form>
		
 
    </body>
</html>
<!-- venda  -->
</html>
