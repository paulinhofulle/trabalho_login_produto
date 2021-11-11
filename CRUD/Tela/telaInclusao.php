<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inclusão</title>

</head>
<body>
    
    <div></div>

    <div>

        <form action="index.php?acao=1" method="POST">

            <?php 
             echo "<input type=\"text\" name=\"nome\" id=\"nome\" placeholder=\"Nome\">";
             echo '<br>';
             echo "<input type=\"text\" name=\"marca\" id=\"marca\" placeholder=\"Marca\">";
             echo '<br>';
             echo "<input type=\"number\" name=\"valor\" id=\"valor\" placeholder=\"Valor\">";
             echo '<br>';
             echo "<input type=\"number\" name=\"quantidade\" id=\"quantidade\" placeholder=\"Quantidade\">";
             echo '<br>';
            ?>

            <button type="submit" >Incluir</button>
            <a href="index.php">Cancelar</a>

        </form>

    </div>

</body>
</html>
