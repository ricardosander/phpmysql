<?php
include("logica-usuario.php");
include("banco-produto.php");

verificaUsuario();

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
$usado = isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false";

$resultadoInsercao = insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado);

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
