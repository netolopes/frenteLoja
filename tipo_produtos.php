<?php
require_once 'config.php';	
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro Tipo Produtos</title>
    </head>
 
    <body>
      <div id="corpo" align="center"  style="background:#CCC"  > 
        <h2></h2>
 
<!-- CADASTRO  -->
	<form action="tipo_produtos_add.php" method="post">
	<table width="80%" style="border:1px solid #CCC;width:80%" border="0">
		<tr>
			<td><b>Cadastrar Tipo Produto</b></td>
			
		</tr>
		
		<tr>
			<td>
				<input type="text"  name="descricao" id="descricao"><input type="submit" value="Cadastrar">
			</td>
		</tr>
		<tr>
			<td><a href="index.php">Voltar</a></td>
			
		</tr>
	</table>
    </form>
		
		
	<?php
	

		$sql = "SELECT id,descricao FROM tipo_produtos ORDER BY id desc";
		$stmt_list = $conexao->prepare($sql);
		$stmt_list->execute();
		?>
		<h2>Listagem</h2>
		 <table width="80%"   border="0">
		  <tr   style="background:#FFFFFF">
					<th>ID</th>
					<th>Tipo Produto</th>
			</tr>		
		 <?php
		while ($arr_list = $stmt_list->fetch(PDO::FETCH_ASSOC)): ?>
                <tr style="background:#FFFFFF">
					<td><?php echo $arr_list['id'] ?></td>
                    <td><?php echo $arr_list['descricao'] ?></td>
					
				</tr>	
		<?php endwhile; ?>
		</table>	
		
		
		
 </div>
    </body>
</html>