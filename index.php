<?php
include_once "Model.php";
$model = new Model();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Faculdade Impacta Luiz Otávio</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Mercadinho da Esquina</h1>
<form method="POST" action="" enctype="multipart/form-data">
    <?php
    $insert = $model->inserir();
    ?>
    <label for="nomeProduto">Nome Produto</label>
    <input type="text" id="nomeProduto" name="nomeProd" required>
    <label for="nomeProduto">Quantidade Produto</label>
    <input type="number" id="quantidadeProduto" name="quantidadeProd" required>
    <label for="categoriaProduto">Categoria do Produto</label>
    <select id="categoriaProd" name="categoriaProd" required>
      <option name="verdura">Verdura</option>
      <option name="fruta">Fruta </option>
      <option name="legume">Legume</option>
      <option name="frios">Frios</option>  
     </select>
     <label for="image">Imagem</label>
     <input type="file" name="imagem" required>
    <input type="submit" id="adicionarProduto" name="adicionarProduto" value="Cadastrar Produto">
</form>

<table>
  <tr>
    <th>Nome</th>
    <th>Quantidade</th>
    <th>Categoria</th>

  </tr>
  <tr>
    <form method="POST" action="porCategoria.php">

      <select name="categoriaProd">
        <option name="categoriaProd" value="Fruta">Fruta</option>
        <option name="categoriaProd" value="Verdura">Verdura</option>
        <option name="categoriaProd" value="Legume">Legumes</option>
        <option name="categoriaProd" value="Frios">Frios</option>
      </select>

      <input type="submit" name="listarPorCategoria" value="PROCURAR">
      </form>
   </tr>
<?php 
       $listarProduto = $model->listar();
       
       if(!empty($listarProduto)){
        foreach($listarProduto as $linha){ 
?>

  <tr>
    <td><?php echo $linha['nomeProd']; ?></td>
    <td><?php echo $linha['quantidadeProd']; ?></td>
    <td><?php echo $linha['categoriaProd']; ?></td>
    <td>
      <form method="GET" action="produto.php">
      <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
      <input type="submit" value="Ver Produto">
        </form>
    </td>
    <td>
      <form method="POST" action="">
        <?php

          $excluirProduto = $model->excluirProduto();

        ?>
      <input type="hidden" name="produtoExcluir" value="<?php echo $linha['id']; ?>">
      <input type="submit" value="Excluir Produto">
        </form>
    </td>
   </tr>
<?php
    }
}
?> 

</table>

</body>
</html>



