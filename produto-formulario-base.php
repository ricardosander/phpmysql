<table class="table">
    <tr>
        <td>Nome:</td>
        <td><input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
    </tr>
    <tr>
        <td>Preco:</td>
        <td><input class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>"></td>
    </tr>
    <tr>
        <td>Descrição:</td>
        <td>
            <textarea name="descricao" class="form-control"><?=$produto->getDescricao()?></textarea>
        </td>
    </tr>
    <tr>
        <td>Categoria:</td>
        <td>
            <select name="categoria_id" class="form-control">
                <?php foreach ($categorias as $categoria) {
                    $selected = $produto->getCategoria() != null && $categoria->getId() == $produto->getCategoria()->getId() ? "selected=\"selected\"" : "";
                    ?>
                    <option <?=$selected?> value="<?=$categoria->getId()?>"><?=$categoria->getNome()?></option>
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