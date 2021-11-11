<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    
    <form action="?acao=4" method="POST">    
        <?php
        if (isset($_SESSION) && isset($_SESSION['erroLogin']) && $_SESSION['erroLogin']) {
            echo "
            <div>
                Erro Login!
            </div> 
                ";
        }
        unset($_SESSION['erroLogin']);
        ?>
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <br>
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <br>
        <button id="botao" class="btn btn-success" type="submit" >Login</button>
    </form>

</body>
</html>
