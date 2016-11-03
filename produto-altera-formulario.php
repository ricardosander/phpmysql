<?php
include("banco-categorias.php");
include("banco-produto.php");

$id = $_GET['id'];

$categorias = listaCategorias($conexao);
$produto = buscaProduto($conexao, $id);
$usado = $produto['usado'] ? "checked=\"checked\"" : "";


include("cabecalho.php"); ?>
	<h1>Alteração de Produto</h1>
	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<table class="table">
			<tr>
				<td>Nome:</td>
				<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
			</tr>
			<tr>
				<td>Preco:</td>
				<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td>
					<textarea name="descricao" class="form-control"><?=$produto['descricao']?></textarea>
				</td>
			</tr>
			<tr>
				<td>Categoria:</td>
				<td>
					<select name="categoria_id" class="form-control">
						<?php foreach ($categorias as $categoria) {
							$selected = $categoria['id'] == $produto['categoria_id'] ? "selected=\"selected\"" : "";
							?>
							<option <?=$selected?> value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
						<?php  } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Alterar">
				</td>
			</tr>
		</table>
	</form>
<?php include("rodape.php");