<?php
include("banco-produto.php");
$produtos = listaProdutos($conexao);

include("cabecalho.php");

if (isset($_GET['removido']) && $_GET['removido'] == true) {
?>
    <p class="text-success">Produto removido com sucesso.</p>
<?php
}
?>
<table class="table table-bordered table-striped">
    <tr>
        <td>Produto</td>
        <td>Remover</td>
        <td>Opções</td>
    </tr>
<?php
foreach ($produtos as $produto) {
    ?>
    <tr>
        <td><?= $produto['nome']  ?></td>
        <td><?= $produto['preco']  ?></td>
        <td><a class="btn btn-danger" href="remove-produto.php?id=<?=$produto['id']?>">remover</a></td>
    </tr>
    <?php
}
?>
</table>
<?php
include("rodape.php");