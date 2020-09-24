<?php
require_once 'config.php';
 

$sql_count = "SELECT COUNT(*) AS total FROM produtos ORDER BY descricao ASC";
$sql = "SELECT id, descricao,valor, imposto_id FROM produtos ORDER BY descricao ASC";
 

$stmt_count = $conexao->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
 

$stmt = $conexao->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>PHP</title>
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
			 <select name="descricao" id="descricao">
						  <?php while ($produtos = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
						<option value="<?php echo $produtos['id'] ?>"><?php echo $produtos['descricao'] ?></option>
						  <?php endwhile; ?>
						</select>
			</td>
		
		<td>
			<input type="text" size="3" name="qtde" id="qtde"><input type="submit" value="Cadastrar">
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    
                    <td >
                        <a href="edit_form.php?id=<?php echo $user['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                   
                        
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>
    </body>
</html>

