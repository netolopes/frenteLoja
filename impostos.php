<?php
require_once 'config.php';

$sql = "SELECT id, descricao FROM tipo_produtos ORDER BY descricao asc";
$stmt_imp = $conexao->prepare($sql);
$stmt_imp->execute();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro Tipo Impostos</title>
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
		<script>
		$(document).ready(function(){
			$('.money').mask("#,##0.00", {reverse: true});
		});
		</script>
		
	
    </head>
 
    <body>
      <div id="corpo" align="center"  style="background:#CCC"  > 
        <h2></h2>
 
<!-- CADASTRO  -->
	<form action="impostos_add.php" method="post">
	<table width="80%" style="border:1px solid #CCC;width:80%" border="0">
		<tr>
		
			<td><b>Cadastrar Impostos</b></td>
		</tr>
		<tr>
			<td>Tipo produto</td>
			<td>
				 <select name="tipo_produto_id" id="tipo_produto_id">
						<option value="">Selecione</option>
						  <?php while ($arr_imp = $stmt_imp->fetch(PDO::FETCH_ASSOC)): ?>
						<option value="<?php echo $arr_imp['id'] ?>"><?php echo $arr_imp['descricao']  ?></option>
						  <?php endwhile; ?>
				</select>
			</td>
			
		</tr>
		<tr>
			<td>ipi</td>
			<td>
				<input type="text"  maxlength="4" class="money" name="ipi" id="ipi">
			</td>
			
		</tr>
		<tr>
			<td>icms</td>
			<td>
				<input type="text"  maxlength="4" class="money" name="icms" id="icms">
			</td>
			
		</tr>
		<tr>
			<td>pis</td>
			<td>
				<input type="text"  maxlength="4" class="money" name="pis" id="pis">
			</td>
			
		</tr>
		<tr>
			<td>cofins</td>
			<td>
				<input type="text"  maxlength="4" class="money" name="cofins" id="cofins">
			</td>
			
		</tr>
		
		
		<tr>
			<td>
				<input type="submit" value="Cadastrar">
			</td>
		</tr>
		<tr>
			<td><a href="index.php">Voltar</a></td>
			
		</tr>
	</table>
    </form>
		
		<?php
		$sql = "SELECT ipi,icms,pis,cofins,tipo_produto_id FROM impostos ORDER BY id desc";
		$stmt_list = $conexao->prepare($sql);
		$stmt_list->execute();
		?>
		<h2>Listagem: Imposto do Tipo de produto</h2>
		 <table width="80%"   border="0">
		  <tr   style="background:#FFFFFF">
					<th>Tipo Produto</th>
					<th>Ipi</th>
					<th>Icms</th>
					<th>Pis</th>
					<th>Cofins</th>
					
			</tr>		
		 <?php
		while ($arr_list = $stmt_list->fetch(PDO::FETCH_ASSOC)): ?>
                <tr style="background:#FFFFFF">
				<td>
					<?php
						$sqlx = "SELECT id, descricao FROM tipo_produtos ORDER BY id ASC";
					$stmt_prodx = $conexao->prepare($sqlx);
					$stmt_prodx->execute();
					while ($arrx = $stmt_prodx->fetch(PDO::FETCH_ASSOC)): ?>
						
							<?php 
							if($arrx['id'] == $arr_list['tipo_produto_id']):
							echo $arrx['descricao'] ?>
							<?php endif; ?>
							
					<?php endwhile; ?>
					
					</td>
                    <td style="text-align:right"><?php echo $arr_list['ipi'] ?></td>
					<td style="text-align:right"><?php echo $arr_list['icms'] ?></td>
					<td style="text-align:right"><?php echo $arr_list['pis'] ?></td>
					<td style="text-align:right"><?php echo $arr_list['cofins'] ?></td>
					
				</tr>	
		<?php endwhile; ?>
		</table>		
		
 </div>
    </body>
</html>