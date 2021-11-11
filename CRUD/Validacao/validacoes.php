<?php
use FFI\Exception;
require_once('./Validacao/Bd.php');

function inicio() {
    if (isset($_SESSION['logado']) && $_SESSION['logado'] && !empty($_SESSION['usuario'])) {
        validaAcoes();
        require_once('./Tela/telaMenu.php');
    }
    else {
        validaLogin();
        require_once('./Tela/telaLogin.php');
    }
}

function validaAcoes() {
    if (isset($_POST) && count($_POST)) {
        if (isset($_GET['acao'])) {
            switch ($_GET['acao']) {
                case 1:
                    require_once('./Validacao/Bd.php');
                    $sSql = "
                    INSERT INTO `produto` (`nome`, `valor`, `marca`, `quantidade`) VALUES (
                        \"{$_POST['nome'      ]}\",
                          {$_POST['valor'     ]},
                        \"{$_POST['marca'     ]}\",
                          {$_POST['quantidade']})";
                    execute($sSql);
                    header("Location: index.php");
                    break;
                case 2:
                    require_once('./Validacao/Bd.php');
                    $sSql = "
                        UPDATE produto SET 
                        nome       = \"{$_POST['nome'      ]}\",
                        marca      = \"{$_POST['marca'     ]}\",
                        valor      = \"{$_POST['valor'     ]}\",
                        quantidade = \"{$_POST['quantidade']}\"
                        WHERE codigo = {$_POST['codigo']}";
                    execute($sSql);
                    header("Location: index.php");
                    break;
            }
        } 
    }
    else{
        if (isset($_GET['acao']) && isset($_GET['codigo'])) {
            switch ($_GET['acao']) {
                case 1:
                    require_once('./Tela/telaInclusao.php');
                    break;
                case 2:
                    $_SESSION['codigoRegistro'] = $_GET['codigo'];
                    require_once('./Tela/telaAlteracao.php');
                    break;
                case 3:
                    $sSql = "delete from produto where codigo = {$_GET['codigo']} ";
                    execute($sSql);
                    header("Location: index.php");
                    break;
                case 5:
                    unset($_SESSION['usuario']);
                    unset($_SESSION['logado']);
                    header("Location: index.php");
                    break;
            }
        }
    }
}

function validaLogin() {
    if (isset($_POST) && count($_POST) && isset($_GET) && count($_GET)) {
        if (isset($_GET['acao']) && isset($_POST['usuario']) && isset($_POST['senha'])) {
            switch ($_GET['acao']) {
                case 4:
                    if (isset($_POST) && isset($_POST['usuario']) && isset($_POST['senha'])) {
                        require_once('./Validacao/validacoes.php');
                        $sSql = "
                        SELECT 1 FROM usuarios where nome = \"{$_POST['usuario']}\" and password = md5('{$_POST['senha']}')
                        ";
                        if (is_array(execute($sSql))) {
                            $_SESSION['usuario'] = $_POST['usuario'];
                            $_SESSION['logado'] = true;
                        }else {
                            $_SESSION['erroLogin'] = true;
                        };
                       header("Location: index.php");
                        die();
                    }
                    break;
            }
        }
    }
}
