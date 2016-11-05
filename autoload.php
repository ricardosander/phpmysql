<?php
require_once("conecta.php");
function autoload($class) {
    require_once("class/{$class}.php");
}
spl_autoload_register("autoload");