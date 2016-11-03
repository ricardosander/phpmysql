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
        <td>Preço</td>
        <td>Descrição</td>
        <td>Categoria</td>
        <td>Opções</td>
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