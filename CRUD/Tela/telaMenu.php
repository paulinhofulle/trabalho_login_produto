<?php
require_once('./Validacao/Bd.php');
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Estoque</title>

</head>

<body>

    <a href="index.php?acao=1&codigo=0">Incluir</a>
    <a href="index.php?acao=5&codigo=0">Logout</a>

    <?php 
    $sSql = "
            SELECT * FROM produto
            ";
     $aRegistros = execute($sSql);
     foreach($aRegistros as $indice => $aLinha) {
         $aRegistros[$indice]['acoes'] = 1;
     }
     echo '<table class="table">';
     echo '<thead>';
     echo '<tr>';
     foreach(buscaPrimeiraPosicaoArray($aRegistros) as $sColuna => $xValor) {
         switch ($sColuna) {
             case 'codigo':
                 echo "<th scope=\"col\">Código</th>";           
                 break;
             
             default:
                 $sColuna = ucfirst($sColuna);
                 echo "<th scope=\"col\">{$sColuna}</th>";
                 break;
         }   
     }
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
     foreach($aRegistros as $aLinha) {
         echo '<tr>';
         foreach($aLinha as $sColuna => $xValor) {
             switch ($sColuna) {
                 case 'codigo':
                     echo "<th scope=\"row\">{$xValor}</th>";
                     break;
                 
                 case 'acoes':
                     echo "<td><a href=\"?codigo={$aLinha['codigo']}&acao=2\" class=\"btn btn-primary\">Alterar</a> <a href=\"?codigo={$aLinha['codigo']}&acao=3\" class=\"btn btn-danger\">Deletar</a></td>";
                     break;
         
                 default:
                 echo "<td>{$xValor}</td>";
                     break;
             }
         }
         echo '</tr>';
     }
     echo '</tbody>';
     echo '</table>';
    ?>
    
</body>

</html>
