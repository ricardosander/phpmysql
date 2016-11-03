<?php
include("banco-produto.php");
$nome = $_GET['nome'];
$preco = $_GET['preco'];

$resultadoInsercao = insereProduto($conexao, $nome, $preco);

include("cabecalho.php");
if ($resultadoInsercao) {
    ?>
    <p class="text-success">Produto <?= $nome ?>, <?= $preco ?> adicionado com sucesso!</p>
    <?php
} else {
    $mensagem = mysqli_error($conexao);
    ?>
    <p class="text-danger">Produto <?= $nome ?> não foi adicionado! <?= $mensagem ?></p>
<?php
}
include("rodape.php");
mysqli_close($conexao);
