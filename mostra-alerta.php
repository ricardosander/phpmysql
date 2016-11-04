<?php
function mostraAlerta($tipo) {

    if (isset($_SESSION[$tipo])) {
        echo "<p class='text-{$tipo}'>{$_SESSION[$tipo]}</p>";
        unset($_SESSION[$tipo]);
    }
}