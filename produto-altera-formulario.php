<?php
require_once("autoload.php");

$id = $_GET['id'];

$categoriaDao = new CategoriaDao($conexao);
$produtoDao = new ProdutoDao($conexao);

$categorias = $categoriaDao->listaCategorias();
$produto = $produtoDao->buscaProduto($id);
$usado = $produto->getUsado() ? "checked=\"checked\"" : "";

require_once("cabecalho.php"); ?>
	<h1>Alteração de Produto</h1>
	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto->getId()?>">
		<?php require_once("produto-formulario-base.php"); ?>
            <tr>
                <td>
                    <input class="btn btn-primary" type="submit" value="Alterar">
                </td>
            </tr>
        </table>
	</form>
<?php require_once("rodape.php");