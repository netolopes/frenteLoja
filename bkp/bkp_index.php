<?php
require_once 'config.php';
 
// http://blog.ultimatephp.com.br/sistema-de-cadastro-php-mysql-pdo/
$sql_count = "SELECT COUNT(*) AS total FROM users ORDER BY name ASC";
 
// SQL para selecionar os registros
$sql = "SELECT id, name, email, gender, birthdate FROM users ORDER BY name ASC";
 
// conta o toal de registros
$stmt_count = $conexao->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
 
// seleciona os registros
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
     
         
  
        <h2>Listagem</h2>
 
<!-- CADASTRO  -->

<form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email">
 
            <br><br>
 
 
            <input type="submit" value="Cadastrar">
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

