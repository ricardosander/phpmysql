<?php
require_once("autoload.php");
require_once("logica-usuario.php");

verificaUsuario();

$categoriaDao = new CategoriaDao($conexao);

$categorias = $categoriaDao->listaCategorias();
$categoria = new Categoria();
$categoria->setId(1);
$produto = new Produto("", "", "", $categoria, false);
$usado = false;
require_once("cabecalho.php"); ?>
    <h1>Formulário de Produto</h1>
    <form action="adiciona-produto.php" method="post">
        <?php require_once("produto-formulario-base.php"); ?>
            <tr>
                <td>
                    <input class="btn btn-primary" type="submit" value="Incluir">
                </td>
            </tr>
        </table>
    </form>
<?php require_once("rodape.php");