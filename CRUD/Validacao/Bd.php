<?php
use FFI\Exception;
require_once('./Validacao/validacoes.php');

const USER    = 'root';

function execute($sSql) {
    try {
        $oPrepare = conexao()->prepare($sSql);
        $oPrepare->execute();
        $aResultado = $oPrepare->fetchAll(PDO::FETCH_ASSOC);
        if ($aResultado == 0) {
            $aResultado = true;
        }
        return $aResultado;
    } catch (\Throwable $e) {
            echo 'ERRO!';
            throw new \Exception();
    }
}

function conexao() {
    $sBdName = 'crud';
    $sHost   = 'localhost';
    $sBd     = 'mysql';

    $oCon = new PDO("{$sBd}:host={$sHost};dbname={$sBdName}",USER,'');
    $oCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $oCon;
}

function buscaPrimeiraPosicaoArray($aArray) {
    foreach($aArray as $xValor) {   
        return $xValor;
    }
}