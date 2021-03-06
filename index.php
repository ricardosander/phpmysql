<?php
require_once("logica-usuario.php");
require_once("cabecalho.php");
?>
<h1>Bem-vindo!</h1>
<?php
if (usuarioEstaLogado()) {
    ?>
    <p class="text-success">Você está logado como <?=usuarioLogado()?></p>
    <a class="btn btn-danger" href="logout.php">Deslogar</a>
    <?php
} else {
?>

    <form method="post" action="login.php">

    <table class="table">
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" class="form-control"></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="senha" class="form-control"></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary">Enviar</button></td>
        </tr>
    </table>
</form>
<?php
}
require_once("rodape.php");