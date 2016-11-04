<?php
include("logica-usuario.php");
include("cabecalho.php");
?>
<h1>Bem-vindo!</h1>

<?php
if (isset($_GET['logado']) && $_GET['logado']) { ?>
    <p class="alert-success">Logado com sucesso!</p>
    <?php
} else if (isset($_GET['logado']) && !$_GET['logado']) {?>
    <p class="alert-danger">Usuário ou senha inválida!</p>
    <?php
}

if (isset($_GET['falhaDeSeguranca']) && $_GET['falhaDeSeguranca']) { ?>
    <p class="alert-danger">Você deve estar logado para realizar esta ação!</p>
    <?php
}

if (usuarioEstaLogado()) {
    ?>
    <p class="text-success">Você está logado como <?=usuarioLogado()?></p>
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
include("rodape.php");