<?php
include("banco-produto.php");
$produtos = listaProdutos($conexao);

include("cabecalho.php");

if (isset($_GET['removido']) && $_GET['removido'] == true) {
?>
    <p class="text-success"></p>
<?php
}
?>
<table class="table table-bordered table-striped">
    <tr>
        <td>Produto</td>
        <td>Preço</td>
        <td>Descrição</td>
        <td>Categoria</td>
        <td></td>
        <td></td>
    </tr>
<?php
foreach ($produtos as $produto) {
    ?>
    <tr>
        <td><?= $produto['nome']  ?></td>
        <td><?= $produto['preco']  ?></td>
        <td><?= substr($produto['descricao'], 0, 40);  ?></td>
        <td><?= $produto['categoria']  ?></td>
        <td>
            <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a>
        </td>
        <td>
            <form action="remove-produto.php" method="post" >
                <input type="hidden" name="id" value="<?=$produto['id']?>" />
                <button class="btn btn-danger" >remover</button>
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php
include("rodape.php");