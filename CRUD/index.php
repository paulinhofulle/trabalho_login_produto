<?php
require_once('./Validacao/validacoes.php');

if (!isset($_SESSION)) {
    session_start();
}
inicio();
?>