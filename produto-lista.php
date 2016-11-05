<?php
require_once("autoload.php");

$produtoDao = new ProdutoDao($conexao);
$produtos = $produtoDao->listaProdutos();

require_once("cabecalho.php");

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
        <td>Preço com descontro</td>
        <td>Descrição</td>
        <td>Categoria</td>
        <td></td>
        <td></td>
    </tr>
<?php
foreach ($produtos as $produto) {
    ?>
    <tr>
        <td><?= $produto->getNome() ?></td>
        <td><?= $produto->getPreco()  ?></td>
        <td><?= $produto->precoComDesconto() ?></td>
        <td><?= substr($produto->getDescricao(), 0, 40);  ?></td>
        <td><?= $produto->getCategoria()->getNome()  ?></td>
        <td>
            <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar</a>
        </td>
        <td>
            <form action="remove-produto.php" method="post" >
                <input type="hidden" name="id" value="<?=$produto->getId()?>" />
                <button class="btn btn-danger" >remover</button>
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php
require_once("rodape.php");