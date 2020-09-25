<?php
require_once 'config.php';	
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro Produtos</title>
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
	<form action="tipo_produtos_add.php" method="post">
	<table width="80%" style="border:1px solid #CCC;width:80%" border="0">
		<tr>
			<td><b>Cadastrar Produto</b></td>
			
		</tr>
		
		<tr>
		<td>Descricao</td>
			<td>
				<input type="text"  name="descricao" id="descricao">
			</td>
		</tr>
		<tr>
		<td>Valor</td>
			<td>
				<input type="text" maxlength="6" class="money" name="valor" id="valor">
			</td>
		</tr>
		<tr>
		<td>Tipo Produto</td>
			<td>
				<?php
				$sql = "SELECT id,descricao FROM tipo_produtos ORDER BY id desc";
				$stmt_listy = $conexao->prepare($sql);
				$stmt_listy->execute();
				?>
						<select name="produto" id="produto">
						  <?php while ($prod = $stmt_listy->fetch(PDO::FETCH_ASSOC)): ?>
						<option value="<?php echo $prod['id'] ?>"><?php echo $prod['descricao']  ?></option>
						  <?php endwhile; ?>
						</select>
						
						
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


		$sql = "SELECT id,descricao,valor,tipo_produto_id FROM produtos ORDER BY id desc";
		$stmt_list = $conexao->prepare($sql);
		$stmt_list->execute();
		?>
		<h2>Listagem</h2>
		 <table width="80%"   border="0">
		  <tr   style="background:#FFFFFF">
					<th>ID</th>
					<th>Produto</th>
					<th>Valor</th>
					<th>Tipo Produto</th>
			</tr>		
		 <?php
		while ($arr_list = $stmt_list->fetch(PDO::FETCH_ASSOC)): ?>
                <tr style="background:#FFFFFF">
					<td><?php echo $arr_list['id'] ?></td>
                    <td><?php echo $arr_list['descricao'] ?></td>
					<td  style="text-align:right"><?php echo $arr_list['valor'] ?></td>
					<td style="text-align:center"><?php
					
				$sql = "SELECT id,descricao FROM tipo_produtos ORDER BY id desc";
				$stmt_listh = $conexao->prepare($sql);
				$stmt_listh->execute();
				while ($prodh = $stmt_listh->fetch(PDO::FETCH_ASSOC)):
					if( $prodh['id'] == $arr_list['tipo_produto_id'] ){
						echo  $prodh['descricao'];
					}
					 endwhile;
					 ?>
					</td>
				</tr>	
		<?php endwhile; ?>
		</table>	
		
		
		
 </div>
    </body>
</html>