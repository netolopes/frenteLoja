<?php
require 'config.php';
 
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 

$sql = "SELECT name, email FROM users WHERE id = ".$id;
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
    <body>

        <h2>Editar</h2>
         
        <form action="edit.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
 
            <br><br>

 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
    <p><a href="index.php">Voltar</a></p>
	
	