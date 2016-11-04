<?php
include("logica-usuario.php");
logout();
header("Location: index.php?deslogado=1");