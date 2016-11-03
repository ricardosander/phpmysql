<?php
include("banco-produto.php");
$produtos = listaProdutos($conexao);

include("cabecalho.php");
?>
<table class="table table-bordered table-striped">
<?php
foreach ($produtos as $produto) {
    ?>
    <tr>
        <td><?= $produto['nome']  ?></td>
        <td><?= $produto['preco']  ?></td>
    </tr>
    <?php
}
?>
</table>
<?php
include("rodape.php");