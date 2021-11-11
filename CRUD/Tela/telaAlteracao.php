<?php
require_once('./Validacao/Bd.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alteração</title>

    <style>

        

    </style>
</head>
<body>
    
    <div></div>

    <div>

        <form action="index.php?acao=2" method="POST">

            <?php
            $sSql = "SELECT * FROM PRODUTO WHERE CODIGO = {$_SESSION['codigoRegistro']}";
            $aLinha = buscaPrimeiraPosicaoArray(execute($sSql));
            echo "<input type=\"number\" name=\"codigo\" id=\"codigo\" value=\"{$aLinha['codigo']}\">";
            echo '<br>';
            echo "<input type=\"text\" name=\"nome\" id=\"nome\" value=\"{$aLinha['nome']}\">";
            echo '<br>';
            echo "<input type=\"text\" name=\"marca\" id=\"marca\" value=\"{$aLinha['marca']}\">";
            echo '<br>';
            echo "<input type=\"number\" name=\"valor\" id=\"valor\" value=\"{$aLinha['valor']}\">";
            echo '<br>';
            echo "<input type=\"number\" name=\"quantidade\" id=\"quantidade\" value=\"{$aLinha['quantidade']}\">";
            echo '<br>';
            unset($_SESSION['codigoRegistro']);
            ?>

            <button type="submit" >Alterar</button>
            <a  href="index.php">Cancelar</a>

        </form>

    </div>

</body>
</html>
