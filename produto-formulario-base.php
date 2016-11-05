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
        <td>Tipo:</td>
        <td>
            <select name="tipo" class="form-control">
                <?php
                $tipos = array("Produto", "Livro Fisico", "Ebook");
                foreach ($tipos as $tipo) {

                    $valor = str_replace(" ", "", $tipo);
                    $selected = $produto->getTipo() == $valor ? "selected=\"selected\"" : "";

                    if ($tipo == "Livro Fisico") {
                        ?>
                        <optgroup label="Livros">
                        <?php
                    }
                    ?>
                    <option <?=$selected?> value="<?=$valor?>"><?=$tipo?></option>
                    <?php $selected = "";
                    if ($tipo == "Ebook") {
                        ?>
                        </optgroup>
                        <?php
                    }
                    ?>
                <?php  } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>ISBN (Se for um livro)</td>
        <td>
            <input class="form-control" type="text" name="isbn" value="<?php echo  $produto->temIsbn() ? $produto->getIsbn() : ""; ?>">
        </td>
    </tr>
    <tr>
        <td>Water Mark (Se for um Ebook)</td>
        <td>
            <input class="form-control" type="text" name="waterMark" value="<?php echo  $produto->temWaterMark() ? $produto->getWaterMark() : ""; ?>">
        </td>
    </tr>
    <tr>
        <td>Taxa Impressão (Se for um Livro Físico)</td>
        <td>
            <input class="form-control" type="text" name="taxaImpressao" value="<?php echo  $produto->temTaxaImpressao() ? $produto->getTaxaImpressao() : ""; ?>">
        </td>
    </tr>